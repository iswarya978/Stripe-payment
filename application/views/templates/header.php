<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php print $title; ?></title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,,300italic,400italic,italic" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="<?php print HTTP_CSS_PATH; ?>style.css" rel="stylesheet">

</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top header-bg-dark" style="background: ##FFFFFF!;">
  <div class="container">
    <a class="navbar-brand font-weight-bold" href=""><h1>Socxo</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php print site_url();?>" id="payBtn" class="btn btn-primary py-2">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('stripe/userprofile'); ?>">User Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('stripe/usertransaction'); ?>">Transaction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('StripePayment/login') ?>">Sign out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>