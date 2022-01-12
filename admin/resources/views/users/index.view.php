<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_users_title?></h6>
    <a href="users/create"><button type="button" class="btn btn-primary float-right"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button></a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#ID</th>
            <th><?= $lang_labels_username?></th>
            <th><?= $lang_labels_firstname?></th>
            <th><?= $lang_labels_lastname?></th>
            <th><?= $lang_labels_email?></th>
            <th><?= $lang_labels_group?></th>
            <th><?= $lang_labels_subdate?></th>
            <th><?= $lang_labels_lastupdate?></th>
            <th><?= $lang_labels_lastlogin?></th>
            <th class="text-center"><?= $lang_labels_actions?></th>
          </tr>
        </thead>
        <tbody>
          <?php if(false !== $users): foreach ($users as $user): ?>
           <tr>
               <td><?= $user->UserId ?></td>
               <td><?= $user->Username ?></td>
               <td><?= $user->Firstname ?></td>
               <td><?= $user->Lastname ?></td>
               <td><?= $user->Email ?></td>
               <td><?= $user->GroupName ?></td>
               <td><?= $user->SubscriptionDate ?></td>
               <td><?= $user->LastUpdate ?></td>
               <td><?= $user->LastLogin ?></td>
               <td>
                   <?php if ($this->session->authuser->GroupName == 'Superweise'): ?>
                     <a href="users/edit/id/<?= $user->UserId ?>"  class="btn btn-success btn-fill"><i class="fa fa-edit fa-fw"></i></a>
                     <a href="users/show/id/<?= $user->UserId ?>"  class="btn btn-info btn-fill"><i class="fa fa-eye fa-fw"></i></a>
                     <a href="users/delete/id/<?= $user->UserId ?>"class="btn btn-danger btn-fill"><i class="fa fa-trash fa-fw"></i></a>
                   <?php endif; ?>
               </td>
           </tr>
         <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
