
<!-- Start Blog Page -->
<div class="blog-show">
  <div class="container">
    <div class="wrapper">
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <div class="doctor-blog">
              <div class="image">
                <img src="/uploads/images/blog/<?= $blog->Image?>" alt="blog-show">
              </div>
              <div class="blog-content">
                <h3><?= $blog->Title?></h3>
                <p><?= $blog->Content?> </p>
                <div class="blog-foot">
                  <div class="left">
                    <span class="date"><i class="fa fa-clock-o fa-fw"></i> <?= $blog->Postdate?></span>
                    <span class="shows"><i class="fa fa-eye fa-fw"></i>  100</span>

                  </div>
                  <div class="right">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="latest-posts">
              <h4><?= $lang_lastpost?></h4>
              <?php if(false !== $listblogs): foreach ($listblogs as $blogss): ?>
                <div class="post">
                  <div class="media">
                    <div class="media-left">
                      <a href="/blog/show/id/<?= $blogss->BlogId?>">
                        <img class="media-object" src="/uploads/images/blog/<?= $blogss->Image?>" alt="blog-show">
                      </a>
                    </div>
                    <div class="media-body">
                      <span><?= substr($blogss->Content , 0, 100)?></span>
                      <span class="post-date"><i class="fa fa-clock-o fa-fw"></i> 22.10.2019</span>
                    </div>
                  </div>
                </div>
              <?php endforeach; endif; ?>

            </div>
          </div>

        </div>
      </div>
    </div>
</div>

<!-- End Blog Page -->
