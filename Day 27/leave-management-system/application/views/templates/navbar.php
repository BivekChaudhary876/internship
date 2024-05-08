
<!-- <?php 
  $logo = get_option( 'logo' );
  $header_bg = get_option( 'header_bg' );
?> -->
<header>
    <div class="px-3 text-bg-dark border-bottom">
      <!-- <div class="px-3 py-2  border-bottom" style="background:<?php  echo $header_bg; ?>"> -->
      <div class="container-fluid">
        <div class="row ">
          <div class="col-2 d-flex align-items-center my-2 my-lg-0 me-lg-auto">
            <a href="index.php"><img src="public/img/logo.png" alt="logo" height="50"></a>
            <!-- <a href="index.php"><img src="<?php echo $logo;?>" alt="logo" height="50"></a> -->
          </div>
          <div class="col-10">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
              </a>

              <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                   <div class=" my-2 nav-link d-flex">
                        <h6 class="my-2 text-white">Welcome, 
                            <?php 
                            echo $_SESSION['current_user']['username']; ?>
                        </h6>
                        <img src="public/img/user.png" alt="" width="32" height="32" class="rounded-circle me-2">
                      <ul class="dropdown-menu text-small shadow">
                        <li>
                          <a class="dropdown-item" href="index.php?c=dashboard&m=logout">Sign out</a>
                        </li>
                      </ul>
                    </div>
                </li>
                <li>
                  <div class="my-3">
                    <?php if ( isset( $_SESSION['current_user'])): ?>
                      <a class=" " href="dashboard/logout"><button class="btn btn-outline-danger"><?php echo icon("logout"); ?>Logout</button></a>
                    <?php endif ;?>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>