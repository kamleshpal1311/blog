<?php

	require_once( dirname(__FILE__) . '/wp-load.php' );
	
	if(isset($_REQUEST['allow']) && $_REQUEST['allow'] == "d56b699830e77ba53855679cb1d252da"){
		if(empty($_REQUEST['vEmail']) || empty($_REQUEST['vPassword'])){
			echo "Some Parameters missing !!";
		}
		else{

			$creds = array();
			$creds['user_login'] = $_REQUEST['vEmail'];
			$creds['user_password'] = $_REQUEST['vPassword'];
			$creds['remember'] = true;
			$user = wp_signon( $creds, false );
			if ( is_wp_error($user) ){
				echo "Invalid Email or password";
			}
			else{
				echo "Successfully Login";
			}
		}
	}
	else{
		echo "Access token missing !!";
	}

?>