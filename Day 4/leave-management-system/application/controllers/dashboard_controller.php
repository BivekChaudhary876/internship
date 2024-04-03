
<?php

    class Dashboard_Controller extends Base_Controller{

        public function index(){

            if(! isset( $_SESSION[ 'username' ] ) ){
                header("Location: index.php?c=dashboard");
                exit;
            }
            $this->load_view() ;
        }
        
        
    }