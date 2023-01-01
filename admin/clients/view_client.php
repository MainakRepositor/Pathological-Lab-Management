<?php
require_once('./../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT *,CONCAT(firstname,' ',middlename,' ', lastname) as fullname FROM `client_list` where id = '{$_GET['id']}'");
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
    #client-img{
        height:200px;
        width:200px;
        object-fit: scale-down;
        object-position:center center;
    }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-auto">
            <img src="<?= validate_image(isset($avatar) ? $avatar : "") ?>" alt="Client Image" class="img-circle border bg-gradient-dark" id="client-img">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <dl>
                <dt class="text-muted">Name</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($fullname) ? $fullname : 'N/A' ?></dd>
                <dt class="text-muted">Gender</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($gender) ? $gender : 'N/A' ?></dd>
                <dt class="text-muted">Birthday</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($dob) ? $dob : 'N/A' ?></dd>
                <dt class="text-muted">Contact #</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($contact ) ? $contact  : 'N/A' ?></dd>
                <dt class="text-muted">Email</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($email) ? $email : 'N/A' ?></dd>
                <dt class="text-muted">Address</dt>
                <dd class='pl-4 fs-4 fw-bold'><?= isset($address) ? $address : 'N/A' ?></dd>
            </dl>
        </div>
    </div>
    <div class="text-right">
        <button class="btn btn-flat btn-dark btn-sm" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
    </div>
</div>
