<!-- DataTales Example -->
<div class=" users users-show card shadow mb-4">
  <div class="card-body">
    <div class="wrapper">
      <div class="header">
        <div class="text-center">
          <div class="content">
            <img src="/uploads/images/users/<?= $userprofile->Image?>" alt="">
            <h4><?= $user->Firstname?> <?= $user->Lastname?></h4>
            <p><?= $usersgroups->GroupName?></p>
          </div>
        </div>
      </div>
      <div class="body-content">
        <fieldset>
        <legend><?=$lang_labels_legend?>:</legend>
        <div class="row">
          <div class="col-md-7 left">

            <div class="row">
              <div class="col-md-8">
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_username?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $user->Username?></span>
                    </div>
                  </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_email?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $user->Email?></span>
                    </div>
                  </div>
                </div>
                 <div class="single-info">
                   <div class="row">
                     <div class="col-md-5">
                       <label for=""><?=$lang_labels_firstname?>: </label>
                     </div>
                     <div class="col-md-7">
                       <span><?= $user->Firstname?></span>
                     </div>
                   </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_lastname?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $user->Lastname?></span>
                    </div>
                  </div>
               </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_specialty?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $userprofile->Specialty?></span>
                    </div>
                  </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_group?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $usersgroups->GroupName?></span>
                    </div>
                  </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_city?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $userprofile->City?></span>
                    </div>
                  </div>
                </div>
                 <div class="single-info">
                   <div class="row">
                     <div class="col-md-5">
                       <label for=""><?=$lang_labels_address?>: </label>
                     </div>
                     <div class="col-md-7">
                       <span><?= $userprofile->Address?></span>
                     </div>
                   </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_phone?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $userprofile->Phone?></span>
                    </div>
                  </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_dob?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span><?= $userprofile->Dob?></span>
                    </div>
                  </div>
                </div>
                <div class="single-info">
                  <div class="row">
                    <div class="col-md-5">
                      <label for=""><?=$lang_labels_userstatus?>: </label>
                    </div>
                    <div class="col-md-7">
                      <span>
                        <?php if ($user->Status == 1) {echo $lang_labels_enabled;
                        }elseif ($user->Status == 2) {echo $lang_labels_disabled;}?>
                      </span>
                    </div>
                  </div>
                </div>
                 <div class="single-info">
                   <div class="row">
                     <div class="col-md-5">
                       <label for=""><?=$lang_labels_subdate?>: </label>
                     </div>
                     <div class="col-md-7">
                       <span><?= $user->SubscriptionDate?></span>
                     </div>
                   </div>
                 </div>
                 <div class="single-info">
                   <div class="row">
                     <div class="col-md-5">
                       <label for=""><?=$lang_labels_lastupdate?>: </label>
                     </div>
                     <div class="col-md-7">
                       <span><?= $user->LastUpdate?></span>
                     </div>
                   </div>
                 </div>
                 <div class="single-info">
                   <div class="row">
                     <div class="col-md-5">
                       <label for=""><?=$lang_labels_lastlogin?>: </label>
                     </div>
                     <div class="col-md-7">
                       <span><?= $user->LastLogin?></span>
                     </div>
                   </div>
                 </div>
              </div>

            </div>
          </div>
          <div class="col-md-5 right">
            <label for=""><?= $lang_labels_about?>:</label>
            <p><?= $userprofile->About?></p>
          </div>
        </div>
        </fieldset>
      </div>
    </div>
  </div>
</div>
