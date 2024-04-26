<?php if( is_admin() ) { ?>
<div class="my-3 text-start">
    <button id="createUserBtn" class="btn btn-outline-success">Create New User</button>

    <div class="my-3">
      <table class="table table-striped table-light">
        <thead>
          <tr class="table-success text-start">
            <th scope="col">S.No</th>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Department</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $users as $key => $user ): ?>
            <tr class="text-start">
              <td><?php echo ( indexing() + $key + 1 ) ?></td>
              <td><?php echo $user[ 'username' ]; ?></td>
              <td><?php echo $user[ 'email'] ; ?></td>
              <td><?php echo $user[ 'department' ]; ?></td>
              <td class="text-start">
                <button type="button" class="btn btn-outline-info editUser" data-id="<?= $user[ 'id' ]?>">Edit</button>
                <button type="button" class="btn btn-outline-danger deleteUser" data-id="<?= $user[ 'id' ] ?>">Delete</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <?php
      pagination([
        "controller" => 'user/list',
        "total" => $total
      ]);
    ?>
</div>

<!-- Modal for Create User Form -->
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
      </div>
      <div class="modal-body">
        <?php } ?>
          <!-- Form for creating a new user -->
          <form method="POST" action="user/save">
            <?php if ( is_admin() ): ?>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
            <?php else: ?>
                  <div class="form-group mt-3 w-25">
                    <label for="username">Username</label>
                      <input type="text" value="<?php current_user() ?>" class="form-control" id="username" name="username" placeholder="Enter Username">
            <?php endif; ?>
                  </div>
            <?php if ( is_admin() ): ?>
                    <div class="form-group">
                      <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" >
            <?php else: ?>
                  <div class="form-group w-25">
                    <label for="email">Email</label>
                        <input type="email" value="<?= $_SESSION[ 'current_user' ][ 'email' ] ?>"class="form-control" id="email" name="email" placeholder="Enter email" >
            <?php endif; ?>
                  </div>
            <?php if ( is_admin() ): ?>
                  <div class="form-group">
                      <label class="form-control-label">Department</label>
                      <select name="department" class="form-control">
                        <option value="HR">HR</option>
                        <option value="Development">Development</option>
                        <option value="UI/UX">UI/UX</option>
                        <option value="Finance">Finance</option>
                        <option value="Customer Support">Customer Support</option>
                      </select>
            <?php else: ?>
                  <div class="form-group w-25">
                    <label class="form-control-label">Department</label>
                      <input type="text" value="<?= $_SESSION[ 'current_user' ][ 'department' ] ?>" class="form-control" id="department" name="department" placeholder="Enter Department">
            <?php endif; ?>
                  </div>
            <?php if ( is_admin() ): ?>
                  <div class="form-group">
                    <label for="password" class="form-control-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" >
                      <?php endif; ?>
                  </div>
                  
            <?php if( is_admin() ){ ?>
                  <div class="modal-footer justify-content-center">
                    <input type="submit" class="btn btn-success createUser" value="Create"></input>
                  </div>
            <?php } ?>
        </form>
      </div>
    </div>
  </div>
</div>





