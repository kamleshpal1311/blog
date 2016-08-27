<?php

	require_once( dirname(__FILE__) . '/wp-load.php' );
	
	if(isset($_REQUEST['allow']) && $_REQUEST['allow'] == "4236a440a662cc8253d7536e5aa17942"){
		wp_logout();
		echo "Successfully Logout";
	}
	else{
		echo "Access token missing !!";
	}

?>