<div class="">
  <div class="login">
    <div class="container-login text-center">
      <div class="wrap-login">
        <h2 >KASSELER MEDICAL CENTER</h2>
        <form class="login-form" method="post">
          <span class="login-form-title">Anmeldung</span>
          <div class="login-error">
            <?php $messages = $this->messenger->getMessages(); if(!empty($messages)): foreach ($messages as $message):
               if ($message[2] == 'alert') {?>
                <p class="<?= $message[1] ?>"><?= $message[0] ?></p>
            <?php } endforeach;endif; ?>
          </div>
          <input class="form-control" type="text" name="username" placeholder="Benutzername" autocomplete="off" required/>
          <input class="form-control" type="password" name="password" placeholder="Passwort" autocomplete="new-password" required />
          <input class="btn btn-default" name="submit" type="submit" value="Anmeldung" />
        </form>
      </div>
    </div>
  </div>
</div>
