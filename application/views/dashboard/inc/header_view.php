<!doctype html>
<html lang="en">
<head>
    <title>jrDash</title>
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css" />

    <script type="text/javascript" src="<?=base_url()?>public/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/dashboard/result.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/dashboard/event.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/dashboard/template.js"></script>
    <script type="text/javascript" src="<?=base_url()?>public/js/dashboard.js"></script>
    <script type="text/javascript">
        $(function() {
            var dashboard = new Dashboard();
        });
    </script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
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
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">User</a></li>
            <li><a href="<?=site_url('dashboard/logout')?>">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
<div id="error" class="alert alert-danger hidee"></div>
<div id="success" class="alert alert-success hidee"></div>
