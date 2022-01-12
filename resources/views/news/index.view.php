
<!-- Start Privacy policy Page -->
<div class="privacy-policy">
  <!--start breadcrumb-->
  <div class="breadcrumb">
      <div class="row">
        <div class="col-xs-12">
          <div class="breadcrumb breadcrumb_bg">
            <div class="container">
                <div class="breadcrumb_iner">
                  <div class="breadcrumb_iner_item">
                    <h2><?=$lang_breadcrumb_title?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

  <div class="container news-details">
    <div class="wrapper">
      <div class="content">
        <div class="row">
        <?php if(false !== $news): foreach ($news as $new): ?>
            <div class="privacy-content col-xs-12 col-md-6 " data-aos="fade-up" data-aos-duration="1500">
                <h2 class="page-title"><?php if(strlen($new->Title) > 30){ echo substr($new->Title, 0, 30). '....';}else{ echo $new->Title;}?></h2>
                <p><?= $new->Short_desc?></p>
                <a href="/<?php if(isset($_SESSION['lang_changed'])){echo $_SESSION['lang'] . '/';}?>news/details/id/<?=$new->NewsId?>" class="btn btn-info"><?=$lang_home_sec_new_btn?></a>
                <hr>
            </div>

        <?php endforeach; endif; ?>
       </div>
      </div>
    </div>
  </div>
</div>

<!-- End Privacy policy Page -->
