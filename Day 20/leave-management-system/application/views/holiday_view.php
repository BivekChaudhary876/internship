<?php $role = $_SESSION[ 'current_user' ][ 'role' ]; ?>

<!-- Holiday Form  -->
<div class="modal fade" id="createHolidayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Holiday</h5>
      </div>
      
      <div class="modal-body">
        <!-- Form for adding a new holiday -->
        <form method="POST" action="holiday/save">
            <input type="hidden" id="id" name="id">
          <div class="form-group">
            <label for="year">Year</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Enter year" required>
          </div>
          <div class="form-group">
            <label for="month">Month</label>
            <select class="form-control" id="month" name="month" required>
              <option value="">Select Month</option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
          <div class="form-group">
            <label for="days">Days</label>
            <input type="text" class="form-control" id="day" name="day" placeholder="Enter days (comma-separated)" required>
          </div>
          <div class="form-group">
            <label for="events">Events</label>
            <textarea class="form-control" id="event" name="event" rows="3" placeholder="Enter holiday events" required></textarea>
          </div>
          <div class="modal-footer justify-content-center">
            <input type="submit" class="btn btn-success">Create</input>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php if ( $role == 'admin'): ?>
<!-- Display the table of holiday list -->
<div class="my-3 text-start">
    <button id="createHolidayBtn" class="btn btn-outline-success">Add new Holiday</button>
</div>
<?php endif; ?>

<div class="my-3">
    <table class="table table-striped table-light">
    <thead>
        <tr class="table-success text-start">
            <th scope="col">S.No</th>
            <th scope="col">Year</th>
            <th scope="col">Month</th>
            <th scope="col">Day</th>
            <th scope="col">Event</th>
            <?php if ( $role == 'admin' ): ?>
            <th scope="col">Actions</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $holidays as $key => $holiday ): ?>
        <tr class="text-start">
            <td><?= ( indexing() + $key+1 ) ?></td>
            <td><?= $holiday[ 'year' ] ?></td>
            <td><?= $holiday[ 'month' ] ?></td>
            <td><?= $holiday[ 'day' ] ?></td>
            <td><?= $holiday[ 'event' ] ?></td>
            <?php if ( $role == 'admin' ) : ?>
            <td class="text-start">
              <button type="button" class="btn btn-outline-info editHoliday" data-id="<?= $holiday[ 'id' ] ?>">Edit</button>
              <button type="button" class="btn btn-outline-danger deleteHoliday" data-id="<?= $holiday[ 'id' ] ?>">Delete</button>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<?php
pagination([
  'controller'=>'holiday',
  'total' => $total
]);