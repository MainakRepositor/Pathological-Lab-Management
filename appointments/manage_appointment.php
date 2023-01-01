<?php
require_once('./../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `appointment_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    $test_ids = [];
    if(isset($id)){
        $atl = $conn->query("SELECT * FROM `appointment_test_list` where appointment_id = '{$id}' ");
        $res = $atl->fetch_all(MYSQLI_ASSOC);
        $test_ids = array_column($res,'test_id');
    }
}
?>
<style>
	img#cimg{
		height: 17vh;
		width: 25vw;
		object-fit: scale-down;
	}
</style>
<div class="container-fluid">
    <form action="" id="appointment-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="schedule" class="control-label">Schedule</label>
                <input type="datetime-local" name="schedule" id="schedule" class="form-control form-control-border" placeholder="Enter appointment Schedule" value ="<?php echo isset($schedule) ? date("Y-m-d\TH:i",strtotime($schedule)) : '' ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="test_ids" class="control-label">Test</label>
                <select name="test_ids[]" id="test_ids" class="form-control form-control-border select2" placeholder="Enter appointment Name" multiple required>
                    <?php 
                    $tests = $conn->query("SELECT * FROM `test_list` where delete_flag = 0 and status = 1 order by `name` asc");
                    while($row= $tests->fetch_assoc()):
                    ?>
                    <option value="<?= $row['id'] ?>" <?= isset($test_ids) && in_array($row['id'],$test_ids) ? 'selected' : "" ?>><?= $row['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="prescription" class="control-label">Prescription <small><em>(If Any)</em></small></label>
                <input type="file" name="prescription" accept="application/msword, .doc, .docx, .txt, application/pdf" id="prescription" class="form-control form-control-border" >
            </div>
        </div>
    </form>
</div>
<script>
  
    $(function(){
        $('#uni_modal').on('shown.bs.modal',function(){
            $('#test_ids').select2({
                dropdownParent: $('#uni_modal'),
                width:'100%',
                placeholder:'Please Select Test(s) Here',
            })
        })
        $('#uni_modal #appointment-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_appointment",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href = './?page=appointments/view_appointment&id='+resp.aid;
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({scrollTop:0},'fast')
                    end_loader();
                }
            })
        })
    })
</script>