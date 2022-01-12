
<!-- Start Contact Page -->
<div class="contact">
  <!--start breadcrumb-->
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
        <div class="contact-section section_padding">

           <!-- start form section -->
            <div class=" form-section">
              <div class="row">
                <div class="col-xs-12 col-md-6 left">
                  <div class="contact-from">
                    <div class="contact-title">
                      <h3><?= $lang_form_title?></h3>
                    </div>
                    <div class="login-error">
                      <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message):
                         if ($message[2] == 'alert') {?>
                          <p class="alert alert-<?= $message[1] ?>"><?= $message[0] ?></p>
                      <?php } endforeach;endif; ?>
                    </div>
                    <form  action="https://www.munir-lebensmittel.de/mail/sendemail.php" method="POST" class="contact" >
                          <div class="username-feld form-group">
                            <input type="text" name="name" class="form-control username"  placeholder="<?= $lang_form_name?>" />
                            <div class="error">
                               <i class='fa fa-exclamation-circle '></i>
                               <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                               <p class="error-msg"></p>
                             </div>
                          </div>
                          <div class="email-feld form-group">
                              <input type="email" name="email" class="form-control email" placeholder="<?= $lang_form_email?>" />
                              <div class="error">
                                 <i class='fa fa-exclamation-circle '></i>
                                 <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                 <p class="error-msg"></p>
                               </div>
                          </div>
                          <div class="subject-feld form-group">
                              <input type="text" name="subject"  class="form-control subject" placeholder="<?= $lang_form_subject?>" />
                              <div class="error">
                                 <i class='fa fa-exclamation-circle '></i>
                                 <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                 <p class="error-msg"></p>
                               </div>
                          </div>

                        <div class="message-feld form-group">
                            <textarea class="form-control message" name="message" placeholder="<?= $lang_form_message?>" ></textarea>
                            <div class="error">
                               <i class='fa fa-exclamation-circle '></i>
                               <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                               <p class="error-msg"></p>
                             </div>
                        </div>
                      <input type="hidden" name="client_csrf" value="<?= CSRF_TOKEN?>">

                      <div class="button">
                         <button type="submit" name="submit" class="btn"><?= $lang_form_submit?></button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-xs-12 col-md-6 right">
                  <div class="information">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="info">
                                <i class="fa fa-home"></i>
                                <h5>Kasseler Medical Center</h5>
                                <span>Holländische Str. 143, 34127 Kassel</span>
                                <span>info@praxis-mohammad-kassel.de</span>

                            </div>
                        </div>

                        <div class="col-sm-12 tow">
                            <div class="info">
                                <i class="fa fa-clock-o"></i>
                                <span>Mo.: 08:00 – 14:30 Uhr</span>
                                <span>Di.: 08:00 – 12:00 & 14:00 - 19:00 Uhr</span>
                                <span>Mi.: 08:00 – 14:30 Uhr</span>
                                <span>Do.: 08:00 – 12:00 & 14:00 - 18:00 Uhr</span>
                                <span>Fr.: 08:00 – 14:00 Uhr</span>
                                <span>Sa.: Nach Termin Vereinbarung</span>

                            </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!-- end form section -->
      </div>
    </div>
  </div>
</div>
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
