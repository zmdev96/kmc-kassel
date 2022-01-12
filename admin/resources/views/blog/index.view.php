<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_blog_title?></h6>
    <a href="blog/create"><button type="button" class="btn btn-primary float-right"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button></a>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#ID</th>
            <th><?= $lang_labels_title?></th>
            <th><?= $lang_labels_postdate?></th>
            <th><?= $lang_labels_acceptdate?></th>
            <th><?= $lang_labels_lastupdate?></th>
            <th><?= $lang_labels_views?></th>
            <th><?= $lang_labels_status?></th>
            <th><?= $lang_labels_publisher?></th>
            <th class="text-center"><?= $lang_labels_actions?></th>
          </tr>
        </thead>
        <tbody>
          <?php if(false !== $blogs): foreach ($blogs as $blog): ?>
           <tr>
               <td><?= $blog->BlogId ?></td>
               <td><?= substr($blog->Title, 0, 30) . '...' ?></td>
               <td><?= $blog->Postdate ?></td>
               <td><?= $blog->Acceptdate ?></td>
               <td><?= $blog->Lastupdate ?></td>
               <td><?= $blog->View ?></td>
               <td><?php if ($blog->Status == 0) {echo $lang_labels_pending; }elseif ($blog->Status == 1) {echo $lang_labels_activated;} ?></td>
               <td><?= $blog->Firstname ?> <?= $blog->Lastname ?></td>
               <td>
                   <a href="blog/edit/id/<?= $blog->BlogId ?>"  class="btn btn-success btn-fill"><i class="fa fa-edit fa-fw"></i></a>
                   <a href="blog/show/id/<?= $blog->BlogId ?>"  class="btn btn-info btn-fill"><i class="fa fa-eye fa-fw"></i></a>
                   <?php if($this->session->authuser->GroupName == 'Superweise'){?>
                   <a href="blog/delete/id/<?= $blog->BlogId ?>"class="btn btn-danger btn-fill"><i class="fa fa-trash fa-fw"></i></a>
                   <?php } ?>
               </td>
           </tr>
         <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
