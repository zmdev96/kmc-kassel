<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_news_title?></h6>
    <a href="news/create"><button type="button" class="btn btn-primary float-right"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button></a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#ID</th>
            <th><?= $lang_labels_title?></th>
            <th><?= $lang_labels_postdate?></th>
            <th><?= $lang_labels_lastupdate?></th>
            <th class="text-center"><?= $lang_labels_actions?></th>
          </tr>
        </thead>
        <tbody>
          <?php if(false !== $news): foreach ($news as $new): ?>
           <tr>
               <td><?= $new->NewsId ?></td>
               <td><?= $new->Title ?></td>
               <td><?= $new->Postdate ?></td>
               <td><?= $new->Lastupdate ?></td>
               <td class="text-center">
                   <a href="news/edit/id/<?= $new->NewsId ?>"  class="btn btn-success btn-fill"><i class="fa fa-edit fa-fw"></i></a>
                   <a href="news/delete/id/<?= $new->NewsId ?>"class="btn btn-danger btn-fill"><i class="fa fa-trash fa-fw"></i></a>
               </td>
           </tr>
         <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
