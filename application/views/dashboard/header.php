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
      <!-- Icon -->
      <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/dist/img/bananalogo.jpeg">
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
      <!-- Bootstrap4 Duallistbox -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

      <!-- Theme style -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
      <!-- DataTables -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <!-- summernote -->
      <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/summernote/summernote-bs4.min.css">
</head>