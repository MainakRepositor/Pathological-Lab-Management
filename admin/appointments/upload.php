<?php
require_once('./../../config.php');
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
<div class="container-fluid">
    <form action="" id="update-status-form">
        <input type="hidden" name="id" value="<?= isset($id) ? $id : '' ?>">
            <input type="hidden" name="status" value="6">
        <div class="form-group">
            <small class="mx-2">Test Report <small><em>(PDF only)</em></small></small>
            <input type="file" name="report" class=" form-control form-control-sm form-control-border" accepts="application/pdf" required></input>
        </div>
        <div class="form-group">
            <small class="mx-2">Remarks</small>
            <textarea name="remarks" id="remarks" rows="3" class="form-control form-control-sm rounded-0" required></textarea>
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
        $('#uni_modal #update-status-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=update_appointment_status",
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
                        location.reload();
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