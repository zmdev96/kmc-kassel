<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_usersprivileges_title?></h6>
    <a href="usersprivileges/create"><button type="button" class="btn btn-primary float-right"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button></a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#ID</th>
            <th><?= $lang_labels_privilegestitle?></th>
            <th><?= $lang_labels_privilege?></th>
            <th class="text-center"><?= $lang_labels_actions?></th>
          </tr>
        </thead>
        <tbody>
          <?php if(false !== $privileges): foreach ($privileges as $privilege): ?>
           <tr>
               <td><?= $privilege->PrivilegeId ?></td>
               <td><?= $privilege->PrivilegeTitle ?></td>
               <td><?= $privilege->Privilege ?></td>
               <td class="text-center">
                   <a href="usersprivileges/edit/id/<?= $privilege->PrivilegeId ?>"  class="btn btn-success btn-fill"><i class="fa fa-edit fa-fw"></i></a>
                   <a href="usersprivileges/delete/id/<?= $privilege->PrivilegeId ?>"class="btn btn-danger btn-fill"><i class="fa fa-trash fa-fw"></i></a>
               </td>
           </tr>
         <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
