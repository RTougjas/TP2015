<!DOCTYPE html>
<html lang="en">
  <head>
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
	  <nav class="navbar navbar-inverse">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="#">Fotoarhiiv</a>
	      </div>
	      <div>
	        <ul class="nav navbar-nav">
  			  <li>
  				  <form action="<?php echo site_url("/Search")?>" method="POST">
  					  <input type="text" name="search_key" class="form-control" id="text" placeholder="otsing">
  				  </form>
  			  </li>
	          <li><a href=<?php echo site_url("/gallery"); ?>>Galerii</a></li>
	          <li><a href=<?php echo site_url("/upload"); ?>>Lae pilt</a></li>
		  	</ul>
			<ul class="nav navbar-nav navbar-right">
              <?php
                  if($this->ion_auth->logged_in()){
                      echo "<li><a href=".site_url('/profile/'.urlencode($this->session->userdata('username'))).">"
                          .$this->session->userdata('username')
                          ."</a></li>";
                      echo "<li><a href=".site_url('auth/logout').">Logi välja</a></li>";
                      if($this->ion_auth->is_admin()){
                          echo "<li><a href=".site_url('auth/index').">Kasutajad</a></li>";
                      }
                  }else{
                      echo "<li><a href=".site_url('auth/login').">Logi sisse</a></li>";
                      echo "<li><a href=".site_url('auth/create_user').">Registreeru</a></li>";
                  }
              ?>
			  </ul>
	        </ul>
	      </div>
	    </div>
	  </nav>


