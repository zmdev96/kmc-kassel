<!-- Start Online Medical Page -->
<div class="online-medical">
  <!-- breadcrumb start-->
  <div class="breadcrumb">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumb breadcrumb_bg">
          <div class="container">
              <div class="breadcrumb_iner">
                <div class="breadcrumb_iner_item">
                  <h2><?= $lang_breadcrumb_title?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end breadcrumb-->

  <div class="container">
    <div class="wrapper">
      <div class="content">
        <div class="online-medical-section section_padding">
           <!-- start form section -->
            <div class=" form-section">
              <div class="row">
                <div class="col-xs-12">
                  <h2 class="online-medical-title text-center"><?= $lang_header_title?></h2>
                </div>
              </div>
              <div class="f-sec">
                <div class="login-error">
                  <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message):
                     if ($message[2] == 'alert') {?>
                      <p class="alert alert-<?= $message[1] ?>"><?= $message[0] ?></p>
                  <?php } endforeach;endif; ?>
                </div>
                <div class="row ">

                  <div class="col-md-4 hidden-xs hidden-sm ">
                      <img src="/assets/img/top_service.png" alt="medicine" />
                  </div>

                  <div  class="col-xs-12 col-md-8">
                    <form action="/medicines/mail" class="form-online-medical" method="post">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="firstname-feld form-group">
                            <input class="form-control firstname" name="fname" id="fname" type="text" placeholder='<?= $lang_form_firstname?>' />
                            <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="lastname-feld form-group">
                          <input class="form-control lastname" name="lname" id="lname" type="text" placeholder='<?= $lang_form_lastname?>' />
                          <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="email-feld form-group">
                            <input class="form-control email" name="email" id="useremail" type="email" placeholder='<?= $lang_form_email?>' />
                            <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="birth-date-feld form-group">
                            <input class="form-control birth-date" name="birth" id="birth-of-date" type="date" placeholder='Birth of date' />
                            <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                          <div class="insurance-feld form-group">
                            <input class="form-control insurance" name="insurance" id="insurancenum" type="text" placeholder='<?= $lang_form_insurance?>' />
                            <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="medicamentname-feld form-group">
                            <input class="form-control medicamentname" name="medicamentname" id="mname"  type="text" placeholder='<?= $lang_form_med_name?>' />
                            <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-xs-6">
                          <div class="pzn-feld form-group">
                            <input class="form-control pzn" name="pzn" id="pzn-barcode" type="text" placeholder='<?= $lang_form_pnz?>' />
                              <div class="error">
                                <i class='fa fa-exclamation-circle '></i>
                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                <p class="error-msg"></p>
                              </div>
                          </div>
                        </div>

                        <div class="col-xs-3">
                          <div class="dosage-feld form-group">
                            <input class="form-control dosage" name="dosage" id="dosageml" type="text" placeholder='<?= $lang_form_dosage?>' />
                              <div class="error">
                                <i class='fa fa-exclamation-circle '></i>
                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                <p class="error-msg"></p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-3">
                       <button type="button" class="btn add form-control"> <i class="fa fa-plus"></i> <span><?= $lang_form_add_btn?></span> </button>
                      </div>




                      </div>

                      <div class="row">
                        <div class="col-xs-12">
                          <div class="medicine-list-div form-group">
                            <div class="medicine-list">
                              <h5 class="text-center"><?= $lang_form_med_list?></h5>
                             </div>
                            <div class="error">
                              <i class='fa fa-exclamation-circle '></i>
                              <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                              <p class="error-msg"></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="client_csrf" value="<?= CSRF_TOKEN?>">

                      <div class="button">
                        <button type="submit" name="submit" class="btn send"><?= $lang_form_sub_btn?></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
           <!-- start form section -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Online Medical Page -->
<script type="text/javascript">
// JS Validate
var Required  = '<?=$lang_js_req?>' ;
var Alpha     = '<?=$lang_js_alpha?>' ;
var AlphaNum  = '<?=$lang_js_alphanum?>' ;
var Between   = '<?=$lang_js_between?>' ;
var Betweenm  = '<?=$lang_js_between_m?>' ;
var Betweenpzn  = '<?=$lang_js_between_pnz?>' ;
var Betweendos  = '<?=$lang_js_between_dos?>' ;
var Email     = '<?=$lang_js_email?>' ;
var Int11     = '<?=$lang_js_num11?>' ;
var Num      = '<?=$lang_js_num?>' ;

</script>
