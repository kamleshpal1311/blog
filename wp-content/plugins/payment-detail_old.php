<?php

if(is_admin())
{
    new Paulund_Wp_List_Table();
}
class Paulund_Wp_List_Table{
    
    public function __construct()
    {
        add_action( 'admin_menu', array($this, 'add_menu_example_list_table_page' ));
    }
    
    public function add_menu_example_list_table_page()
    {
        add_menu_page( 'Payment info', 'Payment info', 'manage_options', 'payment-list-table.php', array($this, 'list_table_page') );
    }
    
    public function list_table_page()
    {
        $exampleListTable = new Example_List_Table();
        $exampleListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                <h2>Payment Details Page</h2>
                <?php $exampleListTable->display(); ?>
            </div>
        <?php
    }
}
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Example_List_Table extends WP_List_Table
{
    
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();
        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );
        $perPage = 5;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);
        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );
        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->items = $data;
    }
    
    public function get_columns()
    {
        $columns = array(
            'id'          => 'ID',
            'title'       => 'Title',
            'description' => 'Description',
            'year'        => 'Year',
            'director'    => 'Director',
            'rating'      => 'Rating'
        );
        return $columns;
    }
    
    public function get_hidden_columns()
    {
        return array();
    }
    
    public function get_sortable_columns()
    {
        return array('title' => array('title', false));
    }
    
    private function table_data()
    {
        $data = array();
        $data[] = array(
                    'id'          => 1,
                    'title'       => 'The Shawshank Redemption',
                    'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                    'year'        => '1994',
                    'director'    => 'Frank Darabont',
                    'rating'      => '9.3'
                    );
        $data[] = array(
                    'id'          => 2,
                    'title'       => 'The Godfather',
                    'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                    'year'        => '1972',
                    'director'    => 'Francis Ford Coppola',
                    'rating'      => '9.2'
                    );
        $data[] = array(
                    'id'          => 3,
                    'title'       => 'The Godfather: Part II',
                    'description' => 'The early life and career of Vito Corleone in 1920s New York is portrayed while his son, Michael, expands and tightens his grip on his crime syndicate stretching from Lake Tahoe, Nevada to pre-revolution 1958 Cuba.',
                    'year'        => '1974',
                    'director'    => 'Francis Ford Coppola',
                    'rating'      => '9.0'
                    );
        $data[] = array(
                    'id'          => 4,
                    'title'       => 'Pulp Fiction',
                    'description' => 'The lives of two mob hit men, a boxer, a gangster\'s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
                    'year'        => '1994',
                    'director'    => 'Quentin Tarantino',
                    'rating'      => '9.0'
                    );
        
        return $data;
    }
   
    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {
            case 'id':
            case 'title':
            case 'description':
            case 'year':
            case 'director':
            case 'rating':
                return $item[ $column_name ];
            default:
                return print_r( $item, true ) ;
        }
    }
    
    private function sort_data( $a, $b )
    {
        $orderby = 'title';
        $order = 'asc';
        if(!empty($_GET['orderby']))
        {
            $orderby = $_GET['orderby'];
        }
        if(!empty($_GET['order']))
        {
            $order = $_GET['order'];
        }
        $result = strcmp( $a[$orderby], $b[$orderby] );
        if($order === 'asc')
        {
            return $result;
        }
        return -$result;
    }
}
?>



