<h2 class="custom_header">New Scenario</h2>
<div class="container">
<form action="<?php echo site_url('Scenario/add_new_scenario_to_db'); ?>" method="POST">
    <div class="form-group">
      <label for="username">Scenario name</label>
      <input required class="form-control" type="text" name="scenario_name" id="name" placeholder="New scenario name">
    </div>
    <div class="form-group">
      <div class="input-group background">
        <div class="input-group-prepend">
          <span class="input-group-text">Description</span>
        </div>
        <textarea class="form-control scenario" name="description" value="Nothing here yet!"></textarea>
      </div>
    </div>
    <table class="table-striped table-bordered table-hover">
      <thead>
      <tr>
        <th class="table_header">Name</th>
        <th class="table_header">Class</th>
        <th class="table_header">Race</th>
        <th class="table_header">Level</th>
        <th class="table_header">Add to scenario</th>
      </tr>
      </thead>
      <tbody>
    <?php
      if ( count($npcs) > 0 ) {
      foreach ($npcs as $row ) {
        if ($row['scenario_id'] == null) {
          echo '<tr class="user_cell">';
          echo '<td class="user_cell">'.$row['name'].'</td>';
          echo '<td class="user_cell">'.$row['class'].'</td>';
          echo '<td class="user_cell">'.$row['race'].'</td>';
          echo '<td class="user_cell">'.$row['level'].'</td>';
          echo '<td class="user_cell">
            <input name="npc_id[]" value="'.$row['npc_id'].'"type="checkbox"></td>';
          echo '</tr>';
        }
      }
    }
      else
        echo "You haven't created any NPCs yet!";
      ?>
    </tbody>
  </table>
    <button class="btn btn-primary" type="submit">Add scenario</button>
</form>
