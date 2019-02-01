<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Book_Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
	<script src="main.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<div class=" navbar-left">
			<ul class="nav navbar-nav navbar-left">
		<li class=""><a href="<?php echo site_url('Admin_Controller/display_All_Books');?>">Admin Dashboard</a></li>
			</ul>
		</div>
	</div>
	  <?php echo form_open('/Admin_Controller/searchBook'); ?>
	  <div class="navbar-form navbar-left">
		  <div class="form-group">
			  <input type="text" class="form-control" placeholder="Search" name="search_name">
		  </div>
		  <button type="submit" class="btn btn-default">Search</button>
	  </div>
	  <?php echo form_close(); ?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


      <ul class="nav navbar-nav navbar-right">

		  <li class=""><a href="<?php echo site_url('Admin_Controller/addBookData');?>">Add Book </a></li>
		  <li class=""><a href="<?php echo site_url('Admin_Controller/addCategory');?>">Add Category </a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("/Admin_Controller/logout") ?>">Logout</a></li>

          </ul>
        </li>

      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
