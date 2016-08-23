<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ask Others - Login</title>
<link rel="stylesheet" type="text/css" href="<?php echo URL . 'css/googlefont.css' ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo URL . 'css/animate.css' ?>">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo URL. 'bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>" rel="stylesheet">
     
    <!-- MetisMenu CSS -->
    <link href="<?php echo URL. 'bower_components/metisMenu/dist/metisMenu.min.css'; ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL. 'css/sb-admin-2.css'; ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo URL. 'bower_components/font-awesome/css/font-awesome.min.css'; ?>" rel="stylesheet" type="text/css">

        <!-- jQuery -->
    <script src="<?php echo URL. 'bower_components/jquery/dist/jquery.min.js'; ?>"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>var url = "<?php echo URL; ?>"</script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lütfen Giriş Yapınız</h3>
                    </div>
                    <div class="panel-body">
                      <?php /*  <form class="form-signin" action="<?php echo URL . 'register/kayit'; ?>" method="POST" >  */?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Re-Password" name="Repassword" type="password" required>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sartlarChcBox"><a href="<?php echo URL . "home/sartlar"; ?>" target="_blank">Kullanım şartları</a>nı okudum ve kabul ediyorum
                                    </label>
                                    </div>
                                </div>
                                <a class="btn btn-lg btn-success btn-block" type="button" id="registerBtnid">Register</a>
                            </fieldset>
                       <?php /* </form> */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL. 'bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL. 'bower_components/metisMenu/dist/metisMenu.min.js'; ?>"></script>
    <!-- Noty -->
    <script src="<?php echo URL . 'bower_components/noty/packaged/jquery.noty.packaged.min.js' ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo URL. 'js/sb-admin-2.js'; ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo URL. 'js/application.js'; ?>"></script>

    <script type="text/javascript">
      $('form').on('submit',function(){
        if($('[name="Repassword"]').val() != $('[name="password"]').val()){
        alert('Girdiğiniz şifreler eşleşmiyor.');
        return false;
        }
      return true;
      });
    </script>

</body>

</html>
