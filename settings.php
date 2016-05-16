<?php
require 'core/init.php'; 
include_once 'navbar.php';
$general->logged_out_protect();

if (isset($_GET['success']) && empty($_GET['success']) === false) {
 	$status = 'Your details have successfully been updated!';
 } else {

 	// if (empty($_POST) === false) {
 		
 	// 	if (isset($_POST['first_name']) && !empty($_POST['first_name'])) {
 	// 		if(!ctype_alpha($_POST['first_name'])) {
 	// 			$errors[] = 'Please enter your first name only with characters';
 	// 		}
 	// 	}

 	// 	if (isset($_POST['last_name']) && !empty($_POST['last_name'])) {
 	// 		if(ctype_alpha($_POST['last_name'])) {
 	// 			$errors[] = 'Please enter your last name only with characters';
 	// 		}
 	// 	}

 	// 	if (isset($_POST['display_name']) && empty($_POST['display_name'])) {
 	// 			$errors[] = 'Please enter your display name';
 	// 	}

 	// 	if (isset($_POST['gender']) && !empty($_POST['gender'])) {
 	// 		$allowed_gender = array('Unndisclosed', 'Male', 'Female');

 	// 		if (in_array($_POST['gender'], $allowed_gender) === false) {
 	// 			$errors[] = 'Please choose a valid gender';
 	// 		}
 	// 	}

 	// 	// Check if user has uploaded a file
 	// 	if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])) {
 			
 	// 		$name 			= $_FILES['myfile']['name'];	// get the file name
 	// 		$tmp_name		= $_FILES['myfile']['tmp_name'];
 	// 		$allowed_text	= array('jpg', 'jpeg', 'png', 'gif');
 	// 		$a 				= explode('.', $name);
 	// 		$file_ext		= strtolower(end($a)); unset($a);		// getting the allowed extensions
 	// 		$file_size		= $_FILES['myfile']['size'];
 	// 		$path			= "images/avatars/";			// the folder to store

 	// 		if (in_array($file_ext, $allowed_text) == false) {
 	// 			$errors[] = 'Image type is not allowed';
 	// 		}

 	// 		if ($file_size > 2097152) {
 	// 			$errors[] = 'File size must be smaller than 2 MB';
 	// 		}
	 // 		} else {
	 // 			$newpath	  = $user['avatar'];			// if user did not provide any file -> use the default
	 // 		}

	 // 		if (empty($errors) === true) {

	 // 			if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])) {

	 // 				// $newpath = $general->file_newpath($path, $name);
	 // 				$newpath = $path;
		// 			move_uploaded_file($tmp_name, $newpath);

	 // 			} else {

	 //                $newpath = 'images/avatars/default_avatar.png';
  //        }

  //        	$first_name 	= htmlentities(trim($_POST['first_name']));
		// 	$last_name 		= htmlentities(trim($_POST['last_name']));	
		// 	$gender 			= htmlentities(trim($_POST['gender']));
		// 	$bio 				= htmlentities(trim($_POST['bio']));
		// 	$display_name	= htmlentities(trim($_POST['display_name']));
		// 	$avatar 			= htmlentities(trim($newpath));
			
		// 	$users->update_user($user_id, $first_name, $last_name, $bio, $display_name, $avatar);
		// 	header('Location: settings.php?success');
		// 	exit();
 	// 	}
 	// }
 	// } else {
 	// 	echo '<h1> Something bad happended $_POST is empty </h1>';
 	// }

 }?>

 <div class="container" style=" margin-top: 25px; width:85%;">       
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><strong>Edit your public profile</strong></h3>
	  </div>
	  <div class="panel-body">
		  <div class="bs-callout bs-callout-warning">
		    <h4><strong>Note: Information you post here will be publicly viewable by others</strong></h4>
		    <p>Do not disclose any sentitive information such as your identification numbers, your credit card, etc.</p>
		  </div>

		    <form class="form" role="form" method="post" action="settings.php">
		    <div class="row">
		    	<div class="col-md-6">
		    		<div class="form-group">
		   			<dl class="edit-profile-avatar">
		   				<dt>
		   					<label>Profile picture</label>
		   				</dt>
		   				<?php if (!empty($user['avatar'])) {
		   					$image = $user['avatar'];
		   				 ?>
		   				<dd class="avatar-upload-container">
		   					<img src="<?php echo $image; ?>">
		   					<div class="fileupload fileinput-exists" data-provides="fileinput" id="avatarFileInput">
								
							  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: 100px;" id="avatarPreview"></div>
							  <div>
							    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
							    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							  </div>
							</div>
		   				</dd>
		   				<?php } ?>
		   			</dl>
		   			<dl class="form-group">
		   				<dt>
		   					<label>Firstname</label>
		   					<input type="text" name="first_name" id="firtName" class="form-control" value="<?php if (isset($_POST['first_name']) ){echo htmlentities(strip_tags($_POST['first_name']));} else { echo $user['first_name']; }?>">
		   				</dt>
		   			</dl>
		   			<dl class="form-group">
		   				<dt>
		   					<label>Lastname</label>
		   					<input type="text" name="last_name" id="lastName" class="form-control" value="<?php if (isset($_POST['last_name']) ){echo htmlentities(strip_tags($_POST['last_name']));} else { echo $user['last_name']; }?>">
		   				</dt>
		   			</dl>
		   			<dl class="form-group">
		   				<dt>
		   					<label>Display name</label>
		   					<input type="text" class="form-control" id="display_name" name="display_name" value="<?php if (isset($_POST['display_name']) ){echo htmlentities(strip_tags($_POST['display_name']));} else { echo $user['display_name']; }?>" placeholder="Display name"/>
		   				</dt>
		   			</dl>
		   		</div>
		    	</div>

				<div class="col-md-6">
		    		<div class="form-group">
		   			
		   			<dl class="form-group">
		   				<dt>
		   					<label>About me</label>
		   				</dt>
		   				<dd>
		   					<textarea type="text" class="form-control" rows="10" id="bio" name="bio" placeholder="About me"><?php if (isset($_POST['bio']) ){echo htmlentities(strip_tags($_POST['bio']));} else { echo $user['bio']; }?></textarea>
		   				</dd>
		   			</dl>

		   			<dl class="form-group">
			   			<dt>
			   				<label>Gender</label>
			   			</dt>
			   			<dd>
			   				<?php
	                   	 	$gender 	= $users->fetch_info('gender', 'username', $user['username']);
	                    		$options 	= array("Unndisclosed", "Male", "Female");
	                        echo "<select name=\"gender\" class=\"selectpicker\">";
	                        foreach($options as $option){
	                           	if($gender == $option){
	                           		$sel = 'selected="selected"';
	                           	}else{
	                           		$sel='';
	                           	}
	                            echo '<option '. $sel .'>' . $option . '</option>';
	                        }

	                        echo "</select>";
	                    ?>
			   			</dd>
                    </dl>
   				</div>
		    	</div>
		    </div>
		   		
		   		<!-- <div class="form-group"> -->
		   			<button type="button" class="btn btn-success" name="submit" id="submitBtn">Update your profile</button>
		   		<!-- </div> -->
		    </form>
	  </div>
	</div>
 </div>

 <?php 
 include_once 'footer.php'; ?>
 <script type="text/javascript">
	$('.selectpicker').selectpicker();

	$('#submitBtn').click(function(e) {
		e.preventDefault();

		var first_name = $('#firtName').val();
		var last_name = $('#lastName').val();
		var display_name = $('#display_name').val();
		var bio = $('#bio').val();
		var gender = $('.selectpicker').val();

		// var avatar = $('input[name="myfile"]').val();
		var avatar = $('#avatarPreview img').attr('src');
		var username = '<?php echo $users->fetch_info("username", "user_id", $user_id); ?>';
		var type = 'updateuserprofile';

		$.ajax({
			type : 'POST',
			url : 'processor/fetch.php',
			data : {
				type : type,
				username : username,
				first_name : first_name,
				last_name : last_name,
				display_name : display_name,
				bio : bio,
				gender : gender,
				avatar : avatar
			},
			success : function(data) {
				if (data == 1) {
				alert('Your profile has been updated successfully!');
				window.location = window.location.pathname + '?username=' + username;
				}
			}
		});
	});
</script>