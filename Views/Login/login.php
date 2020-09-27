<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Open Graph Meta-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="name-color" content="#0A20AC">
        <link rel="icon" type="image/png" href="<?= base_url(); ?>Assets/images/logo.png">
        <title><?= $data['page_tag'] ?></title>
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>Assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>Assets/css/style.css">

    </head>
    <body>
        <!-- Navbar-->

    <?php getModal('modalInfo',$data);?>

        <br>
        <div class="container">
            <div class="d-flex justify-content-center" id="title-login">
                <h1 class="text-primary">INICIAR SESIÓN</h1>
            </div>
            
            <form id="formLogin" name="formLogin" id="formLogin">

                <div class="form-group">
                    <label for="usuario">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
        </div>

<script src="<?= base_url(); ?>Assets/js/<?= $data['page_functions_js'] ?>"></script>
<?php footerAdmin($data);?>