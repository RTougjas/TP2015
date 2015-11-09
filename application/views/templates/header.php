<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Fotoarhiiv</title>
        <?php $this->load->helper('url'); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    </head>
    <body>
        <div class="container">
        </div>
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav">
                    <li><a href=<?php echo site_url("/gallery"); ?>>Gallery</a></li>
                    <li><a href=<?php echo site_url("/upload"); ?>>Upload</a></li>
                    <?php
                        if($this->ion_auth->logged_in()){
                            echo "<li><a href=".site_url('/profile/'.urlencode($this->session->userdata('username'))).">"
                                .$this->session->userdata('username')
                                ."</a></li>";
                            echo "<li><a href=".site_url('auth/logout').">Log out</a></li>";
                            if($this->ion_auth->is_admin()){
                                echo "<li><a href=".site_url('auth/index').">Users</a></li>";
                            }
                        }else{
                            echo "<li><a href=".site_url('auth/login').">Login</a></li>";
                            echo "<li><a href=".site_url('auth/create_user').">Registration</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
        </div>
	    <div class="search">
	        <form action="<?php echo site_url("/Search")?>" method="POST">
	            <input type="text" name="search_key">
	            <input type="submit" value="Search">
	        </form>
	    </div>

