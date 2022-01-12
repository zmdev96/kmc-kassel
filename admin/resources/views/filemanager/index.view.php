<!-- DataTales Example -->
<div class="file-manager card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_filemanager_title?></h6>
  </div>
  <div class="card-body">
    <div class="blog-files">
      <h4 class="sec-title"><?= $lang_labels_users_tilte?></h4>
      <div class="row">
        <?php if(false !== $usersfiles): foreach ($usersfiles as $user): if($user->Image != ''): ?>
          <div class="col-md-2">
            <div class="box">
              <div class="box-content">
                <img src="/uploads/images/users/<?= $user->Image ?>" alt="">
              </div>
            </div>
          </div>
        <?php endif; endforeach; endif; ?>
      </div>
      <hr>
    </div>
    <div class="blog-files">
      <h4 class="sec-title"><?= $lang_labels_blog_tilte?></h4>
      <div class="row">
        <?php for ($i=0; $i < count($blogfiles) ; $i++): if ($blogfiles[$i] != '.' && $blogfiles[$i] != '..'): ?>
          <div class="col-md-2">
            <div class="box">
              <div class="box-content">
                <img src="/uploads/images/blog/<?= $blogfiles[$i] ?>" alt="">
              </div>
            </div>
          </div>
        <?php  endif;  endfor;?>
      </div>
      <hr>
    </div>
    <div class="blog-files">
      <h4 class="sec-title"><?= $lang_labels_page_tilte?></h4>
      <div class="row">
        <?php for ($i=0; $i < count($pagefiles) ; $i++): if ($pagefiles[$i] != '.' && $pagefiles[$i] != '..'): ?>
          <div class="col-md-2">
            <div class="box">
              <div class="box-content">
                <img src="/uploads/images/pages/<?= $pagefiles[$i] ?>" alt="">
              </div>
            </div>
          </div>
        <?php  endif;  endfor;?>
      </div>
      <hr>
    </div>

  </div>
</div>
