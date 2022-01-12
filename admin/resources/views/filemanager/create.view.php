<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_filemanager_create_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="form-content">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="image-field form-group col-md-6">
                <label for="inputImage"><?= $lang_labels_image?></label>
                <input type="file" name="image" class="form-control" id="inputImage">
              </div>
            </div>
            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <input type="hidden"  name="userid" value="">
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-upload"></i><?= $lang_labels_upload_btn?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
