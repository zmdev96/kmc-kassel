<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>



      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="<?= $lang_tem_nav_search ?>" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>


        <!-- Nav Item - Messages -->
        <li class="nav-item emails dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <!-- Counter - Messages -->
            <span id="badge-unsen" class="badge badge-danger badge-counter"></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              <?= $lang_tem_nav_notify_cen?>
            </h6>
            <div id="notify-list-ajax">

            </div>

            <a class="dropdown-item text-center small text-gray-500" href="/app-admin/email"><?= $lang_tem_nav_notify_more?></a>
          </div>
        </li>
        <!-- Nav Item - Messages -->
        <li class="nav-item medicines dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-medkit fa-fw"></i>
            <!-- Counter - Messages -->
            <span id="badge-unsen" class="badge badge-danger badge-counter"></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              <?= $lang_tem_nav_notify_cen?>
            </h6>
            <div id="notify-list-ajax">

            </div>

            <a class="dropdown-item text-center small text-gray-500" href="/app-admin/medicines"><?= $lang_tem_nav_notify_more?></a>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php  echo $this->session->authuser->Firstname .' '. $this->session->authuser->Lastname;?></span>
            <img class="img-profile rounded-circle" src="/uploads/images/users/<?=$this->session->authuser->profile->Image?>" width="60" height="60">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item usertype" href="">
              <?= $this->session->authuser->GroupName?>
            </a>
            <a class="dropdown-item" href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>profile">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              <?= $lang_tem_nav_profile ?>
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/auth/logout" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              <?= $lang_tem_nav_logout ?>
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid" style="position:relative">
