<div class="maps">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2492.714679545298!2d9.491095416128635!3d51.33476757960707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bb38c626b3c651%3A0xb3fcfe1f8412d0eb!2sPraxis%20Dr.%20Yaseen%20Mohammad!5e0!3m2!1sde!2sde!4v1577800195536!5m2!1sde!2sde" width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen="">

        </iframe>




      </div>
    </div>
  </div>
</div>
<div class="footer">
  <div class="container">
    <hr>
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <div class="item">
          <h3>Kasseler Medical Center</h3>
          <ul>
            <li><i class="fa fa-map-marker fa-fw"></i>Holländische Str. 143, 34127 Kassel</li>
            <li><i class="fa fa-phone fa-fw"></i>0561 87 9090</li>
            <li><i class="fa fa-fax fa-fw"></i>0561 87 90920</li>
            <li><i class="fa fa-envelope-o fa-fw"></i>info@praxis-mohammad-kassel.de</li>
          </ul>
        </div>
      </div>
      <div class="col-xs-12 col-md-4">
        <div class="item">
          <h3>Website Map</h3>
          <div class="list-content">
            <div class="col-xs-6">
              <ul>
                <li><a href="/"><?= $lang_tem_nav_home?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>team"><?= $lang_tem_nav_team?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>services/page/id/1"><?= $lang_tem_nav_services?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>medicines"><?= $lang_tem_nav_medicines?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>hzv"><?= $lang_tem_nav_hzv?></a></li>

              </ul>
            </div>
            <div class="col-xs-6">
              <ul>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>blog"><?= $lang_tem_nav_blog?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>news"><?= $lang_tem_nav_news?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>imprint"><?= $lang_tem_nav_imprint?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>privacy"><?= $lang_tem_nav_privacy?></a></li>
                <li><a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>contact"><?= $lang_tem_nav_contact?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-4">
        <div class="item">
          <h3>Newsletter</h3>
          <div class="social">
            <a href="https://facebook.com/kasselermedicalcenter" target="_blank"><span><i class="fa fa-facebook"></i></span></a>
            <span><i class="fa fa-youtube"></i></span>
          </div>
          <form class="">
             <div class="form-group">
               <input type="text" class="form-control" placeholder="<?= $lang_tem_footer_email?>">
             </div>
             <button type="submit" class="btn btn-default hvr-shutter-out-vertical"><?= $lang_tem_footer_button?></button>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="copy-right">
  <div class="container">
    <div class="col-xs-12 text-center">
      <h4><?= $lang_tem_footer_copyright?></h4>
    </div>
  </div>
</div>
