<!-- DataTales Example -->
<div class="email card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= $lang_hzv_title?></h6>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <div class="row">
            <div class="col-md-4">
              <div class="email-list">
                <?php if(false !== $emails): foreach ($emails as $email): ?>
                  <a  class="getMail"href="#" id="<?= $email->EmailId?>">
                    <div class="email-box <?php if($email->Status == 0){echo 'unsen';}?>">
                      <h4><?= $email->Name?></h4>
                      <p><?= $email->Subject?></p>
                      <span class="date"><?= $email->Senddate?></span>
                      <span class="status"><?php if($email->Status == 0){echo 'Ungelesen';}else{echo 'gelesen';}?></span>
                    </div>
                  </a>
               <?php endforeach; endif; ?>
              </div>
            </div>
            <div class="col-md-8">
              <div class="email-wrraper">
                <div class="email-details">
                  <h2 id="subject"></h2>
                  <hr>
                  <h6>Betrref: <span id="subject"></span></h6>
                  <h6>Von: <a id="sendemail" href="mailto:zeyad.moslem1@gmail.com" target="_blank"></a> </h6>
                  <span>Datum: <span id="date"></span></span>
                  <p id="emailcontent">

                  </p>

                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
