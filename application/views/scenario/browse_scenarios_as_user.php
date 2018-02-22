<h2 class="custom_header">Scenarios</h2>

<?php
  if ( count($scenarios) > 0 || count($all_scenarios) > 0 ) {
    echo '<table class="table-striped table-bordered table-hover user_table centered">
          <thead>
          <tr>
            <th class="table_header">Name</th>
            <th class="table_header">Description</th>
            <th class="table_header">NPCs</th>
            <th class="table_header">Action</th>
          </tr>
          </thead>
          <tbody>';

         if ( count($scenarios) > 0 ) {
          foreach ($all_scenarios as $scen) {
            foreach ($scenarios as $new_scn) {
              if ($scen['scenario_id'] == $new_scn['scenario_id']) {
                $key = array_search($scen, $all_scenarios);
                array_splice($all_scenarios, $key, 1);
              }
            }
          }
        }
    foreach ($scenarios as $row ) {
      echo '<tr class="user_cell">';
      echo '<td class="user_cell">'.$row['scenario_name'].'</td>';
      echo '<td class="user_cell"><div class="background_cell">'.$row['description'].'</div></td>';
      echo '<td class="user_cell">'.$row['npcs'].'</td>';
      echo '<td class="user_cell">
        <a href="'.site_url('Scenario/confirm_delete_scenario/').$row['scenario_id'].'">
        <button class="btn btn-danger"">Remove</button>
        <a href="'.site_url('Scenario/edit_combat_scenario/').$row['scenario_id'].'">
        <button class="btn btn-success edit"">Edit</button>
        <a href="'.site_url('Scenario/combat_scenario/').$row['scenario_id'].'">
        <button class="btn btn-primary edit"">Combat helper</button></td>';
      echo '</tr>';
    }
    foreach ($all_scenarios as $row) {
      echo '<tr class="user_cell">';
      echo '<td class="user_cell">'.$row['scenario_name'].'</td>';
      echo '<td class="user_cell"><div class="background_cell">'.$row['description'].'</div></td>';
      echo '<td class="user_cell"></td>';
      echo '<td class="user_cell">
        <a href="'.site_url('Scenario/confirm_delete_scenario/').$row['scenario_id'].'"
        <button class="btn btn-danger"">Remove</button>
        <a href="'.site_url('Scenario/edit_combat_scenario/').$row['scenario_id'].'">
        <button class="btn btn-success edit"">Edit</button>
        <a href="'.site_url('Scenario/combat_scenario/').$row['scenario_id'].'">
        <button disabled class="btn btn-primary edit"">Combat helper</button></td>;
        </td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  }
  else
    echo "You haven't created any scenarios yet!";
?>
