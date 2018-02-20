<h2 class="custom_header">Delete selected NPC</h2>

<div class="custom_header">
<p> Are you sure you want to delete NPC <i><?php echo $chosen_npc->name?></i>? <p>
<a href="<?php echo site_url('NPC/delete_npc/').$chosen_npc->npc_id?>"<button class="btn btn-danger">Yes</button></a>
<a href="<?php echo site_url('NPC/browse_npcs')?>"<button class="btn btn-primary">Cancel</button></a>
</div>
