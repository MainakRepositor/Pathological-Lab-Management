<?php 
$user = $conn->query("SELECT * FROM client_list where id ='".$_settings->userdata('id')."'");
foreach($user->fetch_array() as $k =>$v){
	$$k = $v;
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-body">
		<div class="container-fluid">
			<div id="msg"></div>
			<form action="" id="manage-user">	
				<input type="hidden" name="id" value="<?php echo $_settings->userdata('id') ?>">
				<div class="row">
                  <div class="form-group col-md-4">
                      <input type="text" name="firstname" id="firstname" placeholder="John" autofocus required class="form-control form-control-sm form-control-border" value="<?= isset($firstname) ? $firstname :"" ?>">
                      <small class="mx-2">Firstname</small>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="middlename" id="middlename" placeholder="(optional)" class="form-control form-control-sm form-control-border" value="<?= isset($middlename) ? $middlename :"" ?>">
                      <small class="mx-2">Middlename</small>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="lastname" id="lastname" placeholder="Smith" required class="form-control form-control-sm form-control-border" value="<?= isset($lastname) ? $lastname :"" ?>">
                      <small class="mx-2">Lastname</small>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-4">
                      <select name="gender" id="gender" class="form-control form-control-sm form-control-border" required>
                          <option <?= isset($gender) && $gender =='Male' ? 'selected' : "" ?>>Male</option>
                          <option <?= isset($gender) && $gender =='Female' ? 'selected' : "" ?>>Female</option>
                      </select>
                      <small class="mx-2">Gender</small>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="date" name="dob" id="dob" placeholder="(optional)" required class="form-control form-control-sm form-control-border"  value="<?= isset($dob) ? $dob :"" ?>">
                      <small class="mx-2">Birthday</small>
                  </div>
                  <div class="form-group col-md-4">
                      <input type="text" name="contact" id="contact" placeholder="09xxxxxxxxxx" required class="form-control form-control-sm form-control-border" value="<?= isset($contact) ? $contact :"" ?>">
                      <small class="mx-2">Contact #</small>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-12">
                      <small class="mx-2">Address</small>
                      <textarea name="address" id="address" rows="3" class="form-control form-control-sm rounded-0"><?= isset($address) ? $address :"" ?></textarea>
                  </div>
              </div>
              <div class="row">
                    <div class="form-group col-md-10">
                      <input type="email" name="email" id="email" placeholder="jsmith@sample.com" required class="form-control form-control-sm form-control-border" value="<?= isset($email) ? $email :"" ?>">
                      <small class="mx-2">Email</small>
                  </div>
              </div>
              <div class="row">
                    <div class="form-group col-md-10">
                      <input type="password" name="password" id="password" class="form-control form-control-sm form-control-border">
                      <small class="mx-2">Password</small>
                  </div>
              </div>
              <div class="row">
                    <div class="form-group col-md-10">
                      <input type="password" name="cpass" id="cpass" class="form-control form-control-sm form-control-border">
                      <small class="mx-2">Confirm Password</small>
                  </div>
              </div>
			  <small class="text-muted">Leave the Password fields blank if you don't want to update your password.</small>
				<div class="form-group">
					<label for="" class="control-label">Avatar</label>
					<div class="custom-file">
		              <input type="file" class="custom-file-input rounded-circle" id="customFile" name="img" onchange="displayImg(this,$(this))">
		              <label class="custom-file-label" for="customFile">Choose file</label>
		            </div>
				</div>
				<div class="form-group d-flex justify-content-center">
					<img src="<?php echo validate_image(isset($avatar) ? $avatar :'') ?>" alt="" id="cimg" class="img-fluid img-thumbnail">
				</div>
			</form>
		</div>
	</div>
	<div class="card-footer">
			<div class="col-md-12">
				<div class="row">
					<button class="btn btn-sm btn-primary" form="manage-user">Update</button>
				</div>
			</div>
		</div>
</div>
<style>
	img#cimg{
		height: 15vh;
		width: 15vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}
</style>
<script>
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-user').submit(function(e){
		e.preventDefault();
		var _this = $(this)
		$('.pop-msg').remove()
		var el = $('<div>')
			el.addClass("pop-msg alert")
			el.hide()
		if($('#password').val() != $('#cpass').val()){
			el.addClass('alert-danger')
			el.text("Password does not match")
			$('#password').focus()
			$('#password, #cpass').addClass('is-invalid');
			$('#manage-user').append(el)
			el.show('slow')
			return false;
		}
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=save_client',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp ==1){
					location.reload()
				}else if(resp == 3){
					$('#msg').html('<div class="alert alert-danger">Email already exists</div>')
				}else{
					$('#msg').html('<div class="alert alert-danger">An error occurred.</div>')
				}
				end_loader()
			}
		})
	})

</script>