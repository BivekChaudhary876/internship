<?php 

class User_Controller extends Base_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if ( $this->is_authenticated() ) {
            $user_model = new User_Model(); // Create an instance of the User_Model
            $users = $user_model->get();
            // Create a view bag and add our users to it.
            $this->load_view( ['users' => $users ], 'user');
        } else {
            header("Location: index.php?c=user&m=login");
            exit;
        }
    }

    public function login(){
        if( isset( $_POST['username'] ) && isset( $_POST['password'] ) ){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $where = [ 
                'username' => $username, 
                'password' => $password
            ];

            $user = $this->model->get( $where );
            if(empty($user)){
                header( "Location: index.php?c=login&error=1" );
                exit;
            } else {
                header( "Location: index.php?c=user&m=login" );
                exit;
            }
        }   
    }

    // public function profile(){
    //     if ( $this->is_authenticated() ) {
    //         $user = $this->get( $_SESSION['username'] );
    //         $this->load_view( 'user_profile', ['user' => $user] );
    //     } else {
    //         header( "Location: index.php?c=login" );
    //         exit;
    //     }
    // }

    public function create(){
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $user_model = new User_Model();
            $columns =['username', 'email', 'password'];
            $inserted = $user_model->insert( [ 'username' => $username, 'email' => $email, 'password' => $password ], $columns );
            if( $inserted ){
                 header("Location: index.php?c=user");
            exit;
            }
        } else {
            $this->load_view([], 'create_user_form');
        }
    }

    public function is_authenticated(){
        return isset( $_SESSION['username'] );
    }
}
?>