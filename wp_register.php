<?php

	require_once( dirname(__FILE__) . '/wp-load.php' );
	
	if(isset($_REQUEST['allow']) && $_REQUEST['allow'] == "9de4a97425678c5b1288aa70c1669a64"){
		if(empty($_REQUEST['vUserName']) || empty($_REQUEST['vEmail']) || empty($_REQUEST['vPassword'])){
			echo "Some Parameters missing !!";
		}
		else if(email_exists($_REQUEST['vEmail'])){
			echo "Email already exist !!";
		}
		else{
			$userdata = array(
			    'user_login'  =>  @$_REQUEST['vEmail'],
			    'user_email'  =>  @$_REQUEST['vEmail'],
			    'user_pass'   =>  @$_REQUEST['vPassword']
			);

			$user_id = wp_insert_user( $userdata ) ;

			if ( ! is_wp_error( $user_id ) ) {
			    echo "User created : ". $user_id;
			    update_user_meta($user_id,'first_name',@$_REQUEST['vUserName']);

			    $creds = array();
				$creds['user_login'] = $_REQUEST['vEmail'];
				$creds['user_password'] = $_REQUEST['vPassword'];
				$creds['remember'] = true;
				$user = wp_signon( $creds, false );
			}
		}
	}
	else{
		echo "Access token missing !!";
	}

?>