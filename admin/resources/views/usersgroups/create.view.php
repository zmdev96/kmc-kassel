<!-- DataTales Example -->
<div class="usersgroups card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_usersgroups_create_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-content">
          <form method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputGroupsname"><?= $lang_labels_groupname?></label>
                <input type="text" name="groupname" class="form-control" id="inputGroupsname" value="<?= $this->showValue('groupname')?>">
              </div>
            </div>
            <div class="form-row">
              <div class="privileges-card">
                <h5><?= $lang_labels_privileges_text?></h5>
                 <?php if(false !== $privileges): foreach ($privileges as $privilege): ?>
                   <div class="privilege">
                        <input id ="<?= $privilege->PrivilegeId?>" type="checkbox" name="privileges[]" value="<?= $privilege->PrivilegeId?>">
                        <label for="<?= $privilege->PrivilegeId?>"><?= $privilege->PrivilegeTitle?></label>
                    </div>
                <?php endforeach; endif; ?>
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
