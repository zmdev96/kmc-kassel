<!doctype html>
<html <?php AppLcoalDirection()?>>
  <head>
    <!--Meta Tags-->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content="Kassler Praxis"/>
    <link href="/assets/img/logo3.png" rel="shortct icon" type="image/x-icon" />
    <title><?=  @$this->_data['title'];?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald&display=swap">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php if (CONTROLLER !== 'home'):?>
      <style>
      .navbar-absolute{
        position: unset !important;
      }
      </style>
    <?php endif;?>
