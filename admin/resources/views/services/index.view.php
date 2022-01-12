<!-- DataTales Example -->
<div class="blog card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_services_title?></h6>
  </div>
  <div class="card-body">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#ID</th>
              <th><?= $lang_labels_title?></th>
              <th><?= $lang_labels_lastupdate?></th>
              <th class="text-center"><?= $lang_labels_actions?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(false !== $services): foreach ($services as $service): ?>
             <tr>
                 <td><?= $service->PageId ?></td>
                 <td><?= $service->Pagetitle ?></td>
                 <td><?= $service->Lastupdate ?></td>
                 <td class="text-center">
                     <a href="services/edit/id/<?= $service->PageId ?>"  class="btn btn-success btn-fill"><i class="fa fa-edit fa-fw"></i></a>
                     <a href="services/delete/id/<?= $service->PageId ?>"class="btn btn-danger btn-fill"><i class="fa fa-trash fa-fw"></i></a>
                 </td>
             </tr>
           <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
