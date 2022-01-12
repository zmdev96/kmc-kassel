<!-- DataTales Example -->
<div class="users card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_settings_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-8 left">
        <div class="form-content">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class=" username-field form-group col-md-6">
                <label for="inputUsername"><?= $lang_labels_username?></label>
                <input type="text" name="username" class="form-control" id="inputUsername" value="<?= $this->showValue('username', $user) ?>">
                <div class="errors">
                  <p class="success"><i class="fa fa-fw fa-check-circle"></i></p>
                  <p class="wrong"><span>Already exists</span><i class="fa fa-fw fa-exclamation-circle"></i></p>
                </div>
              </div>
              <div class=" email-field form-group col-md-6">
                <label for="inputEmail4"><?= $lang_labels_email?></label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $this->showValue('email', $user) ?>">
                <div class="errors">
                  <p class="success"><i class="fa fa-fw fa-check-circle"></i></p>
                  <p class="wrong"><span>Already exists</span><i class="fa fa-fw fa-exclamation-circle"></i></p>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputFirst_Name"><?= $lang_labels_firstname?></label>
                <input type="text" name="firstname" class="form-control" id="inputFirst_Name" value="<?= $this->showValue('firstname', $user) ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputLanst_name"><?= $lang_labels_lastname?></label>
                <input type="text" name="lastname" class="form-control" id="inputLanst_name" value="<?= $this->showValue('lastname', $user) ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputPassword"><?= $lang_labels_password?></label>
                <input type="password" name="password" class="form-control" placeholder="<?=$lang_labels_pass_pleace?>" id="inputPassword" value="<?= $this->showValue('password')?>" autocomplete>
              </div>
              <div class="form-group col-md-4">
                <label for="inputRE_Password"><?= $lang_labels_repassword?></label>
                <input type="password" name="repassword" class="form-control" placeholder="<?=$lang_labels_pass_pleace?>" id="inputRE_Password" value="<?= $this->showValue('repassword')?>" autocomplete>
              </div>
              <div class="form-group col-md-4">
                <label for="inputImage"><?= $lang_labels_image?></label>
                <input type="file" name="image" accept="image/*" class="form-control" id="inputImage" value="<?= $this->showValue('image') ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputPhone"><?= $lang_labels_phone?></label>
                <input type="text" name="phone" class="form-control" id="inputPhone" value="<?= $this->showValue('phone', $userprofile)?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputCity"><?= $lang_labels_city?></label>
                <input type="text" name="city" class="form-control"  id="inputCity" value="<?= $this->showValue('city' , $userprofile)?>" >
              </div>
              <div class="form-group col-md-4">
                <label for="inputAddress"><?= $lang_labels_address?></label>
                <input type="text" name="address" class="form-control"  id="inputAddress" value="<?= $this->showValue('address' , $userprofile)?>" >
              </div>
            </div>
            <div class="form-row">
              <h5 style="color:#e74a3b; font-size:16px;"><i class="fa fa-fw fa-exclamation-circle"></i><?= $lang_labels_loginagain?></h5>
            </div>

            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <input type="hidden" name="userid" value="<?= $user->UserId?>">

            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_update_btn?></button>
          </form>
        </div>
      </div>
      <div class="col-md-4 right">
        <div class="content text-center profile-info">
          <img class="img-responsive" src="/uploads/images/users/<?= $this->session->authuser->profile->Image?>" alt="">
          <h5><?= $user->Firstname?> <?= $user->Lastname?></h5>
          <h6>@ <?= $user->Username?></h6>
          <h6><?= $this->session->authuser->GroupName?></h6>


        </div>
      </div>
    </div>
  </div>
</div>
