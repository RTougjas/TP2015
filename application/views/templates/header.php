<!DOCTYPE html> 
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Archive</title>
        <?php $this->load->helper('url'); ?>
    </head>
    <body>
        <div class="container">
        <h1>Archive</h1>
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
