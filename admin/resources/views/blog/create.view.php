<!-- DataTales Example -->
<div class="blog card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_blog_create_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-content">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class=" username-field form-group col-md-6">
                <label for="inputTitle"><?= $lang_labels_title?></label>
                <input type="text" name="title" class="form-control" id="inputTitle" value="<?= $this->showValue('title')?>">
              </div>
              <div class=" email-field form-group col-md-6">
                <label for="inputImage"><?= $lang_labels_image?></label>
                <input type="file" name="image" class="form-control" id="inputImage" value="<?= $this->showValue('image')?>">
              </div>
            </div>

            <div class="form-group">
              <textarea name="content" class="form-control" id="blogEditor" rows="20"><?= $this->showValue('content')?></textarea>
            </div>
            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <input type="hidden" name="userid" value="">

            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button>
          </form>
        </div>
      </div>
      <div class="col-md-4 notes">
        <h4><i class="fa fa-exclamation-circle"></i> <?= $lang_labels_notes?></h4>
        <span><?= $lang_labels_notes_one?></span>
        <span><?= $lang_labels_notes_tow?></span>
        <span><?= $lang_labels_notes_three?></span>
      </div>
    </div>
  </div>
</div>
