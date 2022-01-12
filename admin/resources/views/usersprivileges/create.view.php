<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_usersprivileges_create_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-content">
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPrivilegetitle"><?= $lang_labels_privilegestitle?></label>
                <input type="text" name="privilegetitle" class="form-control" id="inputPrivilegetitle" value="<?= $this->showValue('privilegetitle')?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputGroupsname"><?= $lang_labels_privilege?></label>
                <input type="text" name="privilege" class="form-control" id="inputGroupsname" value="<?= $this->showValue('privilege')?>">
              </div>
            </div>
            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
