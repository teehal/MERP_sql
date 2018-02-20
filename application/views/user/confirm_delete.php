<h2 class="custom_header">Delete selected user</h2>

<div class="custom_header">
<p> Are you sure you want to delete user <i><?php echo $chosen_user->username?></i>? This will also remove all the NPCs created this
  user. <p>
<a href="<?php echo site_url('users/delete_user/').$chosen_npc->npc_id?>"<button class="btn btn-danger">Yes</button></a>
<a href="<?php echo site_url('users/list_users')?>"<button class="btn btn-primary">Cancel</button></a>
</div>
