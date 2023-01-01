<?php
require_once('./../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `test_list` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <div class="row">
            <dl>
                <dt class="text-muted">Test Name</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($name) ? $name : 'N/A' ?></dd>
                <dt class="text-muted">Cost</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($cost) ? number_format($cost,2) : '0.00' ?></dd>
                <dt class="text-muted">Status</dt>
                <dd class='pl-4 fs-4 fw-bold'>
                    <?php 
                        if(isset($status)){
                            switch($status){
                                case '1':
                                    echo '<span class="px-4 badge badge-primary rounded-pill">Active</span>' ;
                                    break;
                                case '0':
                                    echo '<span class="px-4 badge badge-danger rounded-pill">Inactive</span>' ;
                                    break;
                            }
                        }
                    
                    ?>
                </dd>
            </dl>
    </div>
    <div class="row">
        <div class="col-md-12">
            <small class="text-muted">Description</small>
            <div><?= isset($description) ? ($description) : "N/A" ?></div>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-dark btn-sm btn-flat" type="button" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
    </div>
</div>
