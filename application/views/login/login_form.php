<div class="container">
    <?php
        $this->load->library('session');
        if ($this->session->flashdata('message_display')) {
            echo "<div class='message'>";
            echo $this->session->flashdata('message_display');
            echo "</div>";
        }
    ?>
    <div class="form-signin">
        <h2 class="form-signin-header">Please sign in</h2>
        <?php echo form_open('User_authentication/user_login_process');
            if ($this->session->flashdata('error_message')) {
                echo "<div class='error_msg'>";
                echo $this->session->flashdata('error_message');
                echo "</div>";
            }
            echo validation_errors();
        ?>
        
        <label class="sr-only" for="username"></label>
        <input class="form-control" type="text" id="username" name="username" placeholder="Username" />
        
        <label class="sr-only" for="password"></label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Password" />
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="submit">Sign in</button>
        
        <?php $this->load->helper('url'); ?>
        <a href="<?php echo base_url("registration"); ?>">Click here to signup</a>
        <?php echo form_close(); ?>
    </div>
</div>