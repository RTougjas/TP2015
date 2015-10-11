<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Team cancer's site</title>
        <?php $this->load->helper('url'); ?>
        <link rel="stylesheet" href="<?php echo base_url("application/libraries/bootstrap/css/bootstrap.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("application/css/style.css"); ?>">

        <script type="text/javascript" src="<?php echo base_url("application/libraries/jquery/jquery-2.1.3.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("application/libraries/bootstrap/js/bootstrap.js"); ?>"></script>
    </head>
    <body>
        <div class="container">
        <h1>Team cancer's site</h1>
        </div>
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="nav">
                    <li><a href=<?php echo base_url("news"); ?>>News</a></li>
                    <li><a href=<?php echo base_url("about"); ?>>About</a></li>
					<li><a href=<?php echo base_url("games"); ?>>Games</a></li>
                    <?php
                        if($this->session->has_userdata('username')){
                            echo "<li><a href=".base_url('profile/'.$this->session->userdata('username')).">"
                                .$this->session->userdata('username')
                                ."</a></li>";
                            echo "<li><a href=".base_url('logout').">Log out</a></li>";
                        }else{
                            echo "<li><a href=\"login\">Login</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
