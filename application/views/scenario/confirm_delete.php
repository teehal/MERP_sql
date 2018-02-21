<h2 class="custom_header">Delete selected scenario</h2>

<div class="custom_header">
<p> Are you sure you want to delete scenario <i><?php echo $scenario->scenario_name?></i>? <p>
<a href="<?php echo site_url('Scenario/delete_scenario/').$scenario->scenario_id?>"<button class="btn btn-danger">Yes</button></a>
<a href="<?php echo site_url('Scenario/scenarios')?>"<button class="btn btn-primary">Cancel</button></a>
</div>
