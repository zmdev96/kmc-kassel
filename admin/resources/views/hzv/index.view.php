<!-- DataTales Example -->
<div class="blog card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_hzv_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <div class="form-content">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="Textarea1"><?= $lang_labels_pagecontent?></label>
              <textarea name="pagecontent" class="form-control" id="pagesEditor" rows="15">
              <?= $this->showValue('pagecontent', $pagecontent) ?></textarea>
            </div>

            <input type="hidden" name="client_csrf" value="<?= CSRF_TOKEN?>">
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-check"></i><?= $lang_labels_update_btn?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
