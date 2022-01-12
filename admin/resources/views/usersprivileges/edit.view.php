<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_usersprivileges_edit_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-content">
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPrivilege"><?= $lang_labels_privilegestitle?></label>
                <input type="text" name="privilegetitle" class="form-control" id="inputPrivilege" value="<?= $privilege->PrivilegeTitle?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputGroupname"><?= $lang_labels_privilege?></label>
                <input type="text" name="privilege" class="form-control" id="inputGroupname" value="<?= $privilege->Privilege?>">
              </div>
            </div>
            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-check"></i><?= $lang_labels_update_btn?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
