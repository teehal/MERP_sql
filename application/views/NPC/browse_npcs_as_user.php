<h2 class="custom_header">NPCs</h2>

<table class="table-striped table-bordered table-hover user_table centered">
  <thead>
  <tr>
    <th class="table_header">Name</th>
    <th class="table_header">Class</th>
    <th class="table_header">Race</th>
    <th class="table_header">Level</th>
    <th class="table_header">Background</th>
    <th class="table_header">Combat scenario</th>
    <th class="table_header">Action</th>
  </tr>
  </thead>
  <tbody>
<?php
  if ( count($npcs) > 0 ) {
  foreach ($npcs as $row ) {
    echo '<tr class="user_cell">';
    echo '<td class="user_cell">'.$row['name'].'</td>';
    echo '<td class="user_cell">'.$row['class'].'</td>';
    echo '<td class="user_cell">'.$row['race'].'</td>';
    echo '<td class="user_cell">'.$row['level'].'</td>';
    echo '<td class="user_cell"><div class="background_cell">'.$row['background'].'</div></td>';
    echo '<td class="user_cell">'.$row['scenario_name'].'</td>';
    echo '<td class="user_cell">
      <a href="'.site_url('NPC/confirm_delete_npc/').$row['npc_id'].'"
      <button class="btn btn-danger"">Remove</button>
      <a href="'.site_url('NPC/edit_npc/').$row['npc_id'].'"
      <button class="btn btn-primary edit"">Edit</button></td>';
    echo '</tr>';
  }
}
  else
    echo "You haven't created any NPCs yet!";
  ?>
  </tbody>
</table>
