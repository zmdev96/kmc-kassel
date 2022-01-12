<!-- DataTales Example -->
<div class="users card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_news_edit_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <div class="form-content">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class=" username-field form-group col-md-5">
                <label for="inputTitle"><?= $lang_labels_title?></label>
                <input type="text" name="title" class="form-control" id="inputTitle" value="<?= $this->showValue('title', $news)?>">
              </div>
            </div>
            <div class="form-row">
              <div class=" username-field form-group col-md-12">
                <label for="inputTitle"><?= $lang_labels_short_desc?></label>
                <input type="text" name="short_desc" class="form-control" id="inputTitle" value="<?= $this->showValue('short_desc', $news)?>">
              </div>
            </div>
            <div class="form-group">
              <label for="Textarea1"><?= $lang_labels_content?></label>
              <textarea name="content" class="form-control" id="newsEditor" rows="15">
              <?= $this->showValue('content', $news)?></textarea>
            </div>
            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <input type="hidden"  name="userid" value="">
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_update_btn?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
