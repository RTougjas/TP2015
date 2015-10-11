<div class="container">
    <div class="form-signin">
        <h2 class="form-signin-header">Registration Form</h2>
        <?php
            $this->load->library('session');
            echo "<div class='error_msg'>";
                echo validation_errors();
            echo "</div>";
            echo form_open('user_authentication/new_user_registration');
        ?>
        <label class="sr-only" for="username"></label>
        <input class="form-control" type="text" id="username" name="username" placeholder="Username" />
        <?php
            if ($this->session->flashdata('message_display')) {
                echo "<div class='error_msg'>";
                    echo $this->session->flashdata('message_display');
                echo "</div>";
            }
        ?>
        <label class="sr-only" for="password"></label>
        <input class="form-control" type="password" id="password" name="password" placeholder="Password" />
        
        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Register" name="submit">Register</button>
        <?php echo form_close(); ?>
    </div>
</div>
