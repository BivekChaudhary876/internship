<div class="card-details">
      <h5 class="card-title">Leave Type Details</h5>
      <div class="row">
        <?php foreach ( $details as $key => $detail  ) : ?>
            <h6 class="info">Name:  <p> <?php echo $detail[ 'name' ]?></p> </h6>
        <?php endforeach;?>
    </div>
</div>
