<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Vanad Albumid</title>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
        </script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/selectAlbum.js"></script>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/ajax.js"></script>
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
      <a class="navbar-brand" href="<?php echo site_url();?>">Vanad albumid</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url("/gallery");?>"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"> Albumid</span></a></li>
		<li><a href="<?php echo site_url("/gallery/AllPhotos");?>"><span class="glyphicon glyphicon-picture" aria-hidden="true"> Pildid</span></a></li>
		<li><a href="<?php echo site_url("/upload");?>"><span class="glyphicon glyphicon-upload" aria-hidden="true"> Upload</span></a></li>
      </ul>
      <form class="navbar-form navbar-left" action="<?php echo site_url("Search/DoSearch")?>" method="POST">
        <div class="form-group">
          <input type="text" name="search_key" class="form-control" id="text" placeholder="otsing" autocomplete="off">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php
            if($this->ion_auth->logged_in()){?>
                <li class="dropdown">
                    <a href="<?php echo site_url('/profile/'.rawurlencode($this->session->userdata('username'))); ?>" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $this->session->userdata('username'); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('/profile/'.rawurlencode($this->session->userdata('username'))); ?>">Profiil</a></li>
                        <li><a href="<?php echo site_url('/auth/change_password'); ?>">Vaheta parooli</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('auth/logout'); ?>">Logi välja</a>
                </li>
        <?php
                if($this->ion_auth->is_admin()){
                    echo "<li><a href=".site_url('auth/index').">Kasutajad</a></li>";
                }
            }else{
                echo "<li><a href=".site_url('auth/login').">Logi sisse</a></li>";
                echo "<li><a href=".site_url('auth/create_user').">Registreeru</a></li>";
            }
        ?>
      </ul>
    </div>
  </div>
</nav>
	  

