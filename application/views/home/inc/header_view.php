<!doctype html>
<html lang="en">
<head>
    <title>jrDash</title>
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css" />

    <script type="text/javascript" src="<?=base_url()?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/bootstrap.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('home')?>">jrDash</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
