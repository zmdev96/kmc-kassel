<!-- Start Navbar -->
<div class="container navbar-absolute">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img src="/assets/img/praxis_logo.jpg" alt="praxis logo"></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/"><?= $lang_tem_nav_home?></a></li>
          <li class=" hvr-u-f-c"><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>team"><?= $lang_tem_nav_team?></a></li>
          <li class="dropdown hvr-u-f-c">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $lang_tem_nav_services?> <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/1"><?= $lang_tem_nav_main_services?></a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/2">Der Knöchel-Arm-Index</a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/3">Individuelle Gesundheitsleistungen</a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/4">Beschneidung</a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/5">Schröpfen</a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/6">Diagnostik in der Praxis</a></li>
           </ul>
          </li>
          <li class=" hvr-u-f-c"><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>medicines"><?= $lang_tem_nav_medicines?></a></li>
          <li class=" hvr-u-f-c"><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>hzv"><?= $lang_tem_nav_hzv?></a></li>
          <li class=" hvr-u-f-c"><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>blog"><?= $lang_tem_nav_blog?></a></li>
          <li class=" hvr-u-f-c"><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>news"><?= $lang_tem_nav_news?></a></li>
          <li class=" hvr-u-f-c"><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>archive"><?= $lang_tem_nav_archive?></a></li>
          <li class="dropdown hvr-u-f-c">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $lang_tem_nav_contact_info?> <span class="caret"></span></a>
           <ul class="dropdown-menu">
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>imprint"><?= $lang_tem_nav_imprint?></a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>privacy"><?= $lang_tem_nav_privacy?></a></li>
             <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>contact"><?= $lang_tem_nav_contact?></a></li>
           </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <img class="responsive" src="/assets/img/lang-icons/<?php echo $_SESSION['lang']; ?>-icon.png" alt="">
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/language/index/de"><img class="responsive" src="/assets/img/lang-icons/de-icon.png" alt="German">German</a></li>
              <li><a href="/language/index/en"><img class="responsive" src="/assets/img/lang-icons/en-icon.png" alt="Anglish">English</a></li>
              <li><a href="#"><img class="responsive" src="/assets/img/lang-icons/ar-icon.png" alt="Arabic">Arabic</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
   </nav>
</div>
<!-- End Navbar -->
