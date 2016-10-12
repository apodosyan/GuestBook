<!DOCTYPE html>
<html>
<head>
    <title>Admin Section</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('admin-1000')?>">GuestBook Admin section</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?php if($this->session->userdata('admin_logged')):?>
                <ul class="nav navbar-nav">
                    <li><a href="<?=site_url('admin-1000/index'); ?>">Administrators</a></li>
                    <li><a href="<?=site_url('admin-1000/show_messages'); ?>">Messages</a></li>
                    <li><a href="<?=site_url('admin_login/logout'); ?>">Logout</a></li>
                </ul>

            <?php endif?>
        </div><!--/.nav-collapse -->
    </div>
</nav>



<div class="container page-content-container">

