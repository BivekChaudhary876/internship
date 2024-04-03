<?php 
    require_once 'application/models/login_model.php';

    $model = new Login_Model();
    $users  = $model->get();

?>

<div class="content">
    <p>Leave Management System</p>
</div>

<div class="table-content">
    <table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>Password</th>
            <th colspan='3'>Operations</th>
        </tr>
        <?php foreach($users as $user):?>
        <tr>
            <td><?php  echo $user['id'] ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php  echo $user['password']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

