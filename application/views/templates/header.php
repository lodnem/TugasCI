<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Web Framework</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
        <!-- Style tambahan
        Note: Jika menginginkan style CSS tambahan, gunakan file custom.css sehingga file CSS asli milik Bootstrap tetap orisinil. Tujuannya, agar nantinya jika ada update baru dari Bootstrap dan ingin kita implementasikan, maka custom style kita tidak tertimpa.
        -->
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/theme.min.css"> -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

        <script src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      background-color: #555;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-uno box-shadowf">
            <a class="navbar-brand" href="#">Web Framework</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainnavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>web">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="web">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>list_blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>category">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url() ?>datatables">Datatables</a>
                    </li>
                    
                    <?php if(!$this->session->userdata('logged_in')) : ?>
              <div class="btn-group" role="group" aria-label="Data baru">
                <?php echo anchor('user/register', 'Sign Up', array('class' => 'btn btn-outline-light')); ?>
                <?php echo anchor('user/login', 'Sign In', array('class' => 'btn btn-outline-light')); ?>
              </div>
            <?php endif; ?>

            <?php if($this->session->userdata('logged_in')) : ?>
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
              <li class="nav-item">
                <a class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
                  <font color="white">Logout</font>
                </a>
              </li>
            <?php endif; ?>

                </ul>
                
            </div>
        </nav>

        <?php if($this->session->flashdata('user_registered')): ?>
          <?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('login_failed')): ?>
          <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('login_failed').'</div>'; ?>
        <?php endif; ?>

        <?php if($this->session->flashdata('user_loggedin')): ?>
          <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</div>'; ?>
        <?php endif; ?>

         <?php if($this->session->flashdata('user_loggedout')): ?>
          <?php echo '<div class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</div>'; ?>
        <?php endif; ?>

     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Pilihen logout cah kalau ingin keluar atau pindah akun </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url() ?>user/logout">Logout</a>
              </div>
            </div>
          </div>
        </div> 
        
        <!-- akhir Header -->