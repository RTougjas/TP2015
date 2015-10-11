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
                    <li><a href=<?php echo base_url("index.php/gallery"); ?>>Gallery</a></li>
                    <li><a href=<?php echo base_url("index.php/upload"); ?>>Upload</a></li>
                    <?php
                        if($this->session->has_userdata('username')){
                            echo "<li><a href=".base_url('index.php/profile/'.$this->session->userdata('username')).">"
                                .$this->session->userdata('username')
                                ."</a></li>";
                            echo "<li><a href=".base_url('index.php/logout').">Log out</a></li>";
                        }else{
                            echo "<li><a href=".base_url('index.php/Login').">Login</a></li>";
                            echo "<li><a href=".base_url('index.php/registration').">Registration</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
