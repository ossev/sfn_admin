<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Open Graph Meta-->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="name-color" content="#0A20AC">
        <link rel="icon" type="image/svg" href="<?= base_url(); ?>Assets/images/logo.svg">
        <title><?= $data['page_tag'] ?></title>
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>Assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>Assets/css/style.css">
    </head>
    <body class="app sidebar-mini">
        <!-- Navbar-->
    <header>

<?php require_once("nav_admin.php"); ?>