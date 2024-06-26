<?php 

class Leave_Counter_Widget extends Base_Widget{

    protected $name = 'leave-counter';

    protected $title = 'Recent Leave Requests By Status';

    public function get(){

        $leave_m = load_model( 'leave' );

        if ( is_admin() ) {

            $total    = $leave_m->get_count();
            $pending  = $leave_m->get_count(['status' => 'pending']);
            $approved = $leave_m->get_count(['status' => 'approved']);
            $rejected = $leave_m->get_count(['status' => 'rejected']);

        } else {

            $current_user_id = $_SESSION['current_user']['id'];

            $total = $leave_m->get_count([
                'user_id' => $current_user_id
            ]);
            
            $pending = $leave_m->get_count([
                'status'  => 'pending', 
                'user_id' => $current_user_id 
            ]);

            $approved = $leave_m->get_count([
                'status'  => 'approved', 
                'user_id' => $current_user_id
            ]);

            $rejected = $leave_m->get_count([
                'status'  => 'rejected', 
                'user_id' => $current_user_id
            ]);
        }

        return [
            'total'    => $total,
            'pending'  => $pending,
            'approved' => $approved,
            'rejected' => $rejected
        ];
    }

    public function widget(){
        $total = $this->get();
        ?>
        <ul>
            <li><strong>Total Leave</strong> <span><?php echo $total[ 'total' ]; ?></span></li>
            <li><strong>Total Pending</strong> <span><?php echo $total[ 'pending' ]; ?></span></li>
            <li><strong>Total Approved</strong> <span><?php echo $total[ 'approved' ]; ?></span></li>
            <li><strong>Total Rejected</strong> <span><?php echo $total[ 'rejected' ]; ?></span></li>
        </ul>
        <?php
    }
}