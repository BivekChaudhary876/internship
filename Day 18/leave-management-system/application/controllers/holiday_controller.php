<?php

class Holiday_Controller extends Base_Controller{

    protected $post_methods = [ 'save' , 'delete' ];

    public function index(){ 
        $holidays = $this->model->get();
        $total_data = $this->model->get_count();

        $this->load_view( [ 
            'page_title' => 'Holiday',
            'holidays' => $holidays,
            'total_data' => $total_data
        ], 'holiday' ); 
    }

    public function save(){
        $data = [
            'year' => $_POST[ 'year' ],
            'month' => $_POST[ 'month' ],
            'day' => $_POST[ 'day' ],
            'event' => $_POST[ 'event' ]
        ];
        if( isset( $_POST[ 'id'] ) && $_POST[ 'id' ] > 0 ){
                $data[ 'id' ] = $_POST[ 'id' ];
        }
        $this->model->save( $data );
        redirect( 'holiday' );

    }
    public function delete() {
        try {
            $holidayId = $_POST[ 'id' ];
            $deleted = $this->model->delete( $holidayId );
            if ( $deleted ) {
                echo json_encode( [ 'success' => true ] );
            } else {
                echo json_encode( [ 'success' => false, 'message' => 'Failed to delete holiday' ] );
            }
        } catch (Exception $e) {
            echo json_encode( [ 'success' => false, 'message' => 'Error: ' . $e->getMessage() ] );
        }
    }
}