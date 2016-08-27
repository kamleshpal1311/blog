<?php
/*
Plugin Name: Payment Details
Plugin URI: http://openxcell.com/
Description: This plugin is used for show user payment's details.
*/

if(is_admin())
{
    new payment_details_list();
}
class payment_details_list{
    
    public function __construct()
    {
        add_action( 'admin_menu', array($this, 'payment_menu' ));
    }
    
    public function payment_menu()
    {
        add_menu_page( 'Payment info', 'Payment info', 'manage_options', 'payment-list-table.php', array($this, 'payment_list_page') );
    }
    
    public function payment_list_page()
    {
        $paymentListTable = new Payment_List_Table();
        $paymentListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Payment Details Page</h2>
                <?php $paymentListTable->display(); ?>
            </div>
        <?php
    }
}
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Payment_List_Table extends WP_List_Table
{
    
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );
        $perPage = 1;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);
        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );
        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
        $this->_column_headers = array($columns, $hidden);
        $this->items = $data;
    }
    
    public function get_columns()
    {
        $columns = array(
            'username'    => 'Username',
            'amount'       => 'Amount',
            'duration' => 'Duration',
            'subscribe_date' => 'Subscribe Date',
            'subscribe_plan'    => 'Subscribe Plan'
        );
        return $columns;
    }
    
    public function get_hidden_columns()
    {
        return array();
    }
    
    private function table_data()
    {

        global $wpdb;
        $select = "SELECT DISTINCT user_id FROM $wpdb->usermeta WHERE meta_key IN ('firstName','subscribeAmount','subscribeDuration','subscribeDate','subscribePlan')";
        $usermeta = $wpdb->get_results($select , ARRAY_A);
        foreach($usermeta as $usermeta_row){
            $all_meta_for_user = array_map( function( $a ){ 
                return $a[0]; 
            }, get_user_meta($usermeta_row['user_id']) );

            $data[] = array(
                    'username' => $all_meta_for_user['firstName'],
                    'amount'   => $all_meta_for_user['subscribeAmount'],
                    'duration' => $all_meta_for_user['subscribeDuration'],
                    'subscribe_date' => $all_meta_for_user['subscribeDate'],
                    'subscribe_plan' => $all_meta_for_user['subscribePlan']
                    );
        }
        return $data;
    }
   
    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {
            case 'username':
            case 'amount':
            case 'duration':
            case 'subscribe_date':
            case 'subscribe_plan':
                return $item[ $column_name ];
            default:
                return print_r( $item, true ) ;
        }
    }
}
?>



