<h2 class="custom_header">Users</h2>

<table class="table-striped table-bordered table-hover user_table">
  <thead>
  <tr>
    <th class="table_header">Name</th>
    <th class="table_header">Email</th>
    <th class="table_header">Password hash</th>
    <th class="table_header">Last seen</th>
    <th class="table_header">Action</th>
  </tr>
  </thead>
  <tbody>
<?php
  foreach ($users as $row ) {
    $action_row = $row['user_id'] == $_SESSION['user_id'] ?
      '<button disabled class="btn btn-danger"">Remove</button>' :
      '<a href='.site_url('users/confirm_delete/').$row['user_id'].'>
      <button class="btn btn-danger"">Remove</button></a>';
    echo '<tr class="user_cell">';
    echo '<td class="user_cell">'.$row['username'].'</td>';
    echo '<td class="user_cell">'.$row['email'].'</td>';
    echo '<td class="user_cell">'.$row['password'].'</td>';
    echo '<td class="user_cell">0</td>';
    echo '<td class="user_cell">'.$action_row.'</td>';
    echo '</tr>';
  }?>
  </tbody>
</table>
