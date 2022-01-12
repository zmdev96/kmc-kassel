<!-- Start Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-text mx-3">Controll Panel </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php if($this->_controller == 'index'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/home">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item  <?php if($this->_controller == 'users' || $this->_controller == 'usersgroups' || $this->_controller == 'usersprivileges'){echo 'active';}?>">
    <a class="nav-link <?php if($this->_controller !== 'users' || $this->_controller !== 'usersgroups'|| $this->_controller !== 'usersprivileges'){echo 'collapsed';}?> " href="employees" data-toggle="collapse" data-target="#collapseTwo"
     aria-expanded="true" aria-controls="collapseTwo">
     <i class="fa fa-fw fa-users" aria-hidden="true"></i>
      <span><?= $lang_tem_side_users?></span>
    </a>
    <div id="collapseTwo" class="collapse <?php if($this->_controller == 'users' || $this->_controller == 'usersgroups' || $this->_controller == 'usersprivileges'){echo 'show';}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="/app-admin/users"><?= $lang_tem_side_users_manage?></a>
        <a class="collapse-item" href="/app-admin/usersgroups"><?= $lang_tem_side_users_groups?></a>
        <a class="collapse-item" href="/app-admin/usersprivileges"><?= $lang_tem_side_users_privil?></a>

      </div>
    </div>
  </li>

  <!-- Nav Item -->
  <!-- Nav Item - Doctors -->
  <li class="nav-item <?php if($this->_controller == 'blog'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/blog">
      <i class="fa-fw fa fa-book"></i>
      <span><?= $lang_tem_side_blog?></span></a>
  </li>
  <!-- Nav Item - News -->
  <li class="nav-item <?php if($this->_controller == 'news'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/news">
      <i class="fa fa-newspaper fa-fw"></i>
      <span><?= $lang_tem_side_news?></span></a>
  </li>
  <!-- Nav Item - Pages -->
  <li class="nav-item <?php if($this->_controller == 'hzv'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/hzv">
      <i class="fa fa-home fa-fw"></i>
      <span><?= $lang_tem_side_hzv?></span></a>
  </li>
  <!-- Nav Item - Pages -->
  <li class="nav-item <?php if($this->_controller == 'services'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/services">
      <i class="fa fa-home fa-fw"></i>
      <span><?= $lang_tem_side_services?></span></a>
  </li>
  <!-- Nav Item - Filemanager -->
  <li class="nav-item <?php if($this->_controller == 'filemanager'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/filemanager">
      <i class="fa-fw fa fa-folder"></i>
      <span><?= $lang_tem_side_filemanager?></span></a>
  </li>

  <!-- Nav Item - Profile -->
  <li class="nav-item <?php if($this->_controller == 'profile'){echo 'active';}?>">
    <a class="nav-link" href="/app-admin/profile">
      <i class="fas fa-user fa-fw"></i>
      <span><?= $lang_tem_side_profile?></span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
