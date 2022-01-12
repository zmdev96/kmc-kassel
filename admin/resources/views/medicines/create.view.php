<!-- DataTales Example -->
<div class="users card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_users_create_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <div class="form-content">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class=" username-field form-group col-md-3">
                <label for="inputUsername"><?= $lang_labels_username?></label>
                <input type="text" name="username" class="form-control" id="inputUsername" value="<?= $this->showValue('username')?>">
                <div class="errors">
                  <p class="success"><i class="fa fa-fw fa-check-circle"></i></p>
                  <p class="wrong"><span>Already exists</span><i class="fa fa-fw fa-exclamation-circle"></i></p>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label for="inputFirst_Name"><?= $lang_labels_firstname?></label>
                <input type="text" name="firstname" class="form-control" id="inputFirst_Name" value="<?= $this->showValue('firstname')?>">
              </div>
              <div class="form-group col-md-3">
                <label for="inputLanst_name"><?= $lang_labels_lastname?></label>
                <input type="text" name="lastname" class="form-control" id="inputLanst_name" value="<?= $this->showValue('lastname')?>">
              </div>
              <div class=" email-field form-group col-md-3">
                <label for="inputEmail4"><?= $lang_labels_email?></label>
                <input type="email" name="email" class="form-control" id="inputEmail4" value="<?= $this->showValue('email')?>">
                <div class="errors">
                  <p class="success"><i class="fa fa-fw fa-check-circle"></i></p>
                  <p class="wrong"><span>Already exists</span><i class="fa fa-fw fa-exclamation-circle"></i></p>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword"><?= $lang_labels_password?></label>
                <input type="password" name="password" class="form-control" id="inputPassword" value="<?= $this->showValue('password')?>" autocomplete>
              </div>
              <div class="form-group col-md-3">
                <label for="inputRE_Password"><?= $lang_labels_repassword?></label>
                <input type="password" name="repassword" class="form-control" id="inputRE_Password" value="<?= $this->showValue('repassword')?>" autocomplete>
              </div>
              <div class="form-group col-md-3">
                <label for="inputSpecialty"><?= $lang_labels_specialty?></label>
                <input type="text" name="specialty" class="form-control" id="inputSpecialty" value="<?= $this->showValue('specialty')?>">
              </div>
              <div class="form-group col-md-3">
                <label for="inputState"><?= $lang_labels_usergroup?></label>
                <select name="usergroup" id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <?php if(false !== $usersgroups): foreach ($usersgroups as $usersgroup): ?>
                      <option value="<?= $usersgroup->GroupId?>"><?= $usersgroup->GroupName?></option>
                 <?php endforeach; endif; ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPhone"><?= $lang_labels_phone?></label>
                <input type="text" name="phone" class="form-control" id="inputPhone" value="<?= $this->showValue('phone')?>">
              </div>
              <div class="form-group col-md-3">
                <label for="inputCity"><?= $lang_labels_city?></label>
                <input type="text" name="city" class="form-control" id="inputCity" value="<?= $this->showValue('city')?>">
              </div>
              <div class="form-group col-md-3">
                <label for="inputAddress"><?= $lang_labels_address?></label>
                <input type="text" name="address" class="form-control" id="inputAddress" value="<?= $this->showValue('adress')?>">
              </div>
              <div class="form-group col-md-3">
                <label for="inputDob"><?= $lang_labels_dob?></label>
                <input type="date" name="dob" class="form-control" id="inputDob" value="<?= $this->showValue('dob')?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputImage"><?= $lang_labels_image?></label>
                <input type="file" name="image" accept="image/*" class="form-control" id="inputImage" value="<?= $this->showValue('image') ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="Textarea1"><?= $lang_labels_about?></label>
              <textarea name="about" class="form-control" id="userEditor" rows="15">
              <?= $this->showValue('about')?></textarea>
            </div>
            <input type="hidden"  name="client_csrf" value="<?= CSRF_TOKEN?>">
            <input type="hidden"  name="userid" value="">
            <button type="submit" name="submit" class="btn btn-success"><i style="margin-right:5px;" class="fas fa-plus"></i><?= $lang_labels_create_btn?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
