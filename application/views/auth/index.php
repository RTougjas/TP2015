<div class="container">
<h1><?php echo lang('index_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<p><?php echo anchor('auth/create_user', lang('index_create_user_link'))?></p>
<div class="table-responsive">
<table class="table table-hover">
	<tr>
        <th><?php echo lang('index_username_th');?></th>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
            <td>
				<a href="<?php echo site_url("auth/edit_user/".$user->id) ;?>"><span class="glyphicon glyphicon-user" aria-hidden="true">
				        <?php echo htmlspecialchars($user->username, ENT_QUOTES,'UTF-8');?></span></a>
			</td>
            <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
		</tr>
	<?php endforeach;?>
</table>
</div>
</div>