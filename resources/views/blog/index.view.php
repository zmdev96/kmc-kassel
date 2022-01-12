
<!-- Start Blog Page -->
<div class="blog-p">
  <!--start breadcrumb-->
  <div class="breadcrumb">
      <div class="row">
        <div class="col-xs-12">
          <div class="breadcrumb breadcrumb_bg">
            <div class="container">
                <div class="breadcrumb_iner">
                  <div class="breadcrumb_iner_item">
                    <h2>Blog</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

  <div class="container">
    <div class="wrapper">
      <div class="content">
        <div class="blog-cards">
            <div class="row">
              <?php if(false !== $blogs): foreach ($blogs as $blog): ?>
                <div class="col-xs-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-duration="1500">
                  <div class="item">
                    <div class="item-content">
                      <div class="img-content">
                        <img src="/uploads/images/blog/<?= $blog->Image?>" alt="">
                      </div>
                      <div class="caption-content">
                        <h4><?=$blog->Title?></h4>
                        <div class="footer-info">
                          <div class="left">
                            <i class="fa fa-clock-o fa-fw"></i> <span> <?=$blog->Postdate?></span>
                            <i class="fa fa-eye fa-fw"></i> <span> 100</span>
                          </div>
                          <div class="right">
                            <a href="/blog/show/id/<?=$blog->BlogId?>"><?= $lang_readmore?><i class="fa fa-angle-double-right fa-fw"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; endif; ?>

            </div>
        </div>
    </div>
  </div>
</div>

<!-- End Blog Page -->
