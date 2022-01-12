<!-- DataTales Example -->
<div class=" medicines-show card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Medikamente Verwaltung</h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <h4><span>Bestellung nummer.:</span> <?= $order->MedicinesId?></h4>
        <h4><span>Name:</span> <?= $order->Cname?></h4>
        <h4><span>E-Mail:</span> <?= $order->Cemail?></h4>
        <h4><span>Geburtsdatum:</span> <?= $order->Cpod?></h4>
        <h4><span>Versicherung Nr.:</span> <?= $order->Cinsurance?></h4>
        <h4><span>Bestellung datum:</span> <?= $order->Orderdate?></h4>
        <h4><span>Status:</span> <?php if ($order->Status == 0){echo 'Nicht genehmigt';}else{echo 'Genehmigt';}?></h4>
        <h4><span>Medikamente:</span></h4>
        <?php
        $order->Cmedicines = explode('|', trim($order->Cmedicines, '|'));
        echo '<ol>';
        foreach ($order->Cmedicines as $on) {
          echo '<li>' . $on . '</li>';
        }
        echo '</ol>';
        if ($order->Status == 0){
        ?>
        <a href="/app-admin/medicines/approve/id/<?= $order->MedicinesId ?>"  class="btn btn-info btn-fill">Genehmigen</a>
        <?php }?>
      </div>
    </div>
  </div>
</div>
