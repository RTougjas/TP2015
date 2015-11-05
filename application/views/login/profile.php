<?php     
if(!$this->session->has_userdata('username')){
    $this->session->set_userdata('referred_from', current_url());
}
?>
<div class="container">
    <?php
        echo "<h3>Welcome to your profile</h3>";
        if($this->ion_auth->get_user_id() === $id){
            echo "<a href=".site_url('auth/edit_user/'.$id).">Edit your profile</a>";
        }
        echo "<ul>
        <li>ID: ".$id."</li>
        <li>Username: " . $username."</li>
        <li>First name: " . $first_name."</li>
        <li>Last name: " . $last_name."</li>
        <li>Uploads: ".$posts."</li>
        </ul>";
    ?>
</div>
