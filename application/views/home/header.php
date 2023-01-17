<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?= $sys->first_name;
                  echo ' ' . $sys->last_name; ?></title>
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
      <!-- Icon -->
      <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg">

</head>