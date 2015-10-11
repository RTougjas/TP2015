<?php     
if(!$this->session->has_userdata('username')){
    $this->session->set_userdata('referred_from', current_url());
}
?>
<div class="container">
        <?php
            echo "<h3>Welcome to your profile</h3> <ul><li>ID: ".$id.
                "</li><li>Username: " . $username."</li><li>Admin: ".$admin."<li>Posts: ".$posts."</li></ul>";
        ?>
    
</div>
