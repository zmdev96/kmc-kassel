<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_users_title?></h6>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>E-Mail</th>
            <th>Geburtsdatum</th>
            <th>Versicherung Nr.:</th>
            <th>Bestellung datum</th>
            <th>Status</th>
            <th class="text-center">Aktionen</th>
          </tr>
        </thead>
        <tbody>
          <?php if(false !== $medicines): foreach ($medicines as $med): ?>
           <tr>
               <td><?= $med->MedicinesId ?></td>
               <td><?= $med->Cname ?></td>
               <td><?= $med->Cemail ?></td>
               <td><?= $med->Cpod ?></td>
               <td><?= $med->Cinsurance ?></td>
               <td><?= $med->Orderdate ?></td>
               <td><?php if ($med->Status == 0){echo 'Nicht genehmigt';}else{echo 'Genehmigt';}?></td>

               <td>
                 <a href="medicines/show/id/<?= $med->MedicinesId ?>"  class="btn btn-info btn-fill"><i class="fa fa-eye fa-fw"></i></a>
               </td>
           </tr>
         <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
