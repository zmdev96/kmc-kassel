<!-- Start Team Page -->
<div class="team">
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
        <div class="about-us text-center">
          <div class="row">
            <div class="col-sm-12">
              <img src="/assets/img/team/clinic.jpg" alt="">
            </div>
            <div class="col-sm-12">
              <div class="about-content text-center">
                  <p><?= $lang_header_desc?></p>
                  <h4 class="dr-name"><?= $lang_header_doc_name?></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="our-history" id="test">
          <div class="row">
            <div class="col-xs-12">
              <div class="header-title text-center">
                <h2><?= $lang_header_history?></h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <div class="image">
                <img src="/assets/img/team/dr-yaseen.jpg" alt="">
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="our-history-content">
                <h3 class="dr-title">Yaseen Mohammad</h3>
                <h4>Lebenslauf:</h4>
                <p>1974&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Geburt in Kassan – Syrien</p>
                <p>1993&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Abitur in Derik – Syrien</p>
                <p>1993-2000&nbsp;&nbsp;&nbsp;&nbsp; Studium der Humanmedizin an</p>
                <p>der Duhok Universität Kurdistan-Irak</p>
                <p>2000 - 2001&nbsp;&nbsp; Assistenzarzt in Azadi Krankenhaus</p>

                <h4>In Deutschland:</h4>
                <ul>
                  <li>Assistenzarzt in der Innere Abteilung (Kardiologie, Diabetologie, Pulmologie, Onkologie) in P.H.K. in Sachsen-Anhalt.</li>
                  <li>Assistenzarzt in der Innere Medizin Abteilung in Ev. Vereins Krankenhaus in Hann. Münden.</li>
                  <li>Assistenzarzt in der Innere Abteilung in Marienkrankenhaus-Kassel.</li>
                  <li>Facharzt für Innere Medizin seit 2014</li>
                  <li>2014 – 2018 Ärztlicher Leiter der Allgemeinmedizin-Praxis “Wesertor” in Kassel</li>
                  <li>Ab dem 01.10.2018 Inhaber &amp; ärztlicher Leiter der Kasseler Medical Center in die Holländische Str. 143, 34127 Kassel</li>
                </ul>

                <h4>Qualifikationen:</h4>
                <ul>
                  <li>Facharzt für Innere Medizin</li>
                  <li>Zusatzqualifikationen unter anderem:</li>
                  <li>Psychosomatische Grundversorgung</li>
                  <li>Hautkrebsscreening</li>
                  <li>Fachkunde im Strahlenschutz</li>
                  <li>12 Monate Weiterbildungsbefugnis für Ärzte in Ausbildung zum Facharzt für Innere Medizin</li>
                </ul>

              </div>
            </div>
          </div>
        </div>

        <div class="doctors ">
          <div class="doctors-row">
            <div class="row">
              <?php if(false !== $teams): foreach ($teams as $team): ?>
                <div class="col-xs-12 col-md-6" >
                  <a href="team/doctor/id/<?=$team->UserId?>">
                    <div class="doctor">
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="image">
                            <img src="/uploads/images/users/<?= $team->Image?>" alt="dr-dirk">
                          </div>
                        </div>
                        <div class="col-xs-7">
                          <div class="doctor-data">
                            <h5><?=$team->Firstname?> <?= $team->Lastname?></h5>
                            <span><?=$team->Specialty?></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach; endif; ?>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
