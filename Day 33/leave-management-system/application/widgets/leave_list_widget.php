<?php 

class Leave_List_Widget extends Base_Widget{

    protected $name = 'leave-list';

    protected $icon = 'user';

    protected $arrow = 'chevron-right';

    protected $id = 'recent-leave-list';

    protected $title = 'Recent Leave Requests';

    public function widget(){

        $leave_m = load_model( 'leave' );
        $where = [];

        if ( !is_admin() ) {
            $where[ 'lr.user_id' ] = get_current_user_id();
        }

        $total_leave_requests = $leave_m->get( $where );
        ?>
        <div id="<?php echo $this->id; ?>" class="collapsible">
            <table>
                <tbody>
                    <?php 
                    foreach( $total_leave_requests as $key => $leave ) : ?>
                        <tr> 
                            <td><?php  echo ( indexing() + $key + 1 ) ; ?></td>
                            <td>
                                <a href="leave/details/<?php echo $leave[ 'id' ]; ?>">
                                    <?php echo ucfirst( $leave[ 'username' ]) ; ?>
                                </a>
                            </td>
                            <td class="status"><?php echo get_status_badge( $leave[ 'status' ] ) ; ?></td>
                            <td>
                                <a href='leave/details/<?php echo $leave[ 'id' ]; ?>'><?php echo icon( 'view' ) ; ?></a>
                            </td>
                        </tr>
                        <?php 
                    endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}