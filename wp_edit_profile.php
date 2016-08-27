<?php
	require_once( dirname(__FILE__) . '/wp-load.php' );
	
	if(isset($_REQUEST['allow']) && $_REQUEST['allow'] == "de95b43bceeb4b998aed4aed5cef1ae7"){
			
		if(isset($_REQUEST['vUserName']) && isset($_REQUEST['vPassword']) && isset($_REQUEST['vEmail'])){
			if(empty($_REQUEST['vUserName']) || empty($_REQUEST['vPassword']) || empty($_REQUEST['vEmail'])){
				echo "Some Parameters missing !!";
			}
			else if(!email_exists($_REQUEST['vEmail'])){
				echo "Email does not exist";
			}
			else{
				$user = get_user_by('email',$_REQUEST['vEmail']);
				$user_id = $user->ID;
				$user_email = $_REQUEST['vEmail'];
				update_user_meta($user_id , 'first_name' ,$_REQUEST['vUserName']);
			    wp_set_password($_REQUEST['vPassword'], $user_id );
			    echo 'Successfully updated your profile !!';
			    $creds = array();
				$creds['user_login'] = $user_email;
				$creds['user_password'] = $_REQUEST['vPassword'];
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
			}
		}
		elseif(isset($_REQUEST['vUserName']) && isset($_REQUEST['vEmail'])){
			if(empty($_REQUEST['vUserName']) || empty($_REQUEST['vEmail'])){
				echo "UserName or email is empty !!";
			}
			else if(!email_exists($_REQUEST['vEmail'])){
				echo "Email does not exist";
			}
			else{
				$user = get_user_by('email',$_REQUEST['vEmail']);
				$user_id = $user->ID;
			    update_user_meta($user_id , 'first_name' ,$_REQUEST['vUserName']);
			    echo 'Successfully updated your profile !!';
			}
		}
		elseif(isset($_REQUEST['vPassword']) && isset($_REQUEST['vEmail'])){
			if(empty($_REQUEST['vPassword']) || empty($_REQUEST['vEmail'])){
				echo "Emai or Password is empty !!";
			}
			else if(!email_exists($_REQUEST['vEmail'])){
				echo "Email does not exist";
			}
			else{
				$user = get_user_by('email',$_REQUEST['vEmail']);
				$user_id = $user->ID;
		    	wp_set_password($_REQUEST['vPassword'], $user_id );
		    	echo 'Successfully updated Your profile !!';
		    	$creds = array();
				$creds['user_login'] = $user_email;
				$creds['user_password'] = $_REQUEST['vPassword'];
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
		    }	
		}
		else{
			echo "Some Parameter missing !!";
		}
	}
	else{
		echo "Access token missing !!";
	}

?>