<?php 
abstract class Base_Controller{

    protected $model;

    protected $current_controller;
    
    public function __construct(){
        $child_class = static::class;
        $this->current_controller = explode( '_', strtolower( $child_class ) )[0];
        $this->load_model( $this->current_controller );
    }

    public function load_model( $model = '' ){
        $model_path = PATH . '/application/models/' . $model . '_model.php';
        if( file_exists( $model_path ) ){
            require_once $model_path;
            $model_class = ucfirst( $model ) . '_Model';
            $this->model = new $model_class();
        }

    }

    public function load_view( $data = [], $view = '' ){
        extract( $data );
        require PATH . '/application/views/templates/head.php';

        if( 'login' != $this->current_controller ){
            require_once PATH . '/application/views/templates/navbar.php';
            // if('dashboard' !=$this->current_controller){
            //     require_once PATH . '/application/views/templates/user_profile.php';
            // }else{
            //     require_once PATH . '/application/views/templates/admin_profile.php';
            // }
            require_once PATH . '/application/views/templates/sidebar.php';

        }

        $view = empty( $view ) ? $this->current_controller : $view;
        
        require PATH . '/application/views/' . $view . '_view.php';

        require PATH . '/application/views/templates/foot.php';
    }

}