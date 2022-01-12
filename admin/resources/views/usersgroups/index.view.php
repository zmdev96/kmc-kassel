<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_usersgroups_title?></h6>
    <a href="usersgroups/create"><button type="button" class="btn btn-primary float-right"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button></a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#ID</th>
            <th><?= $lang_labels_groupname?></th>
            <th class="text-center"><?= $lang_labels_actions?></th>
          </tr>
        </thead>
        <tbody>
          <?php if(false !== $groups): foreach ($groups as $group): ?>
           <tr>
               <td><?= $group->GroupId ?></td>
               <td><?= $group->GroupName ?></td>
               <td class="text-center">
                   <a href="usersgroups/edit/id/<?= $group->GroupId ?>"  class="btn btn-success btn-fill"><i class="fa fa-edit fa-fw"></i></a>
                   <a href="usersgroups/delete/id/<?= $group->GroupId ?>"class="btn btn-danger btn-fill"><i class="fa fa-trash fa-fw"></i></a>
               </td>
           </tr>
         <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
