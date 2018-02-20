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
    echo '<tr class="user_cell">';
    echo '<td class="user_cell">'.$row['username'].'</td>';
    echo '<td class="user_cell">'.$row['email'].'</td>';
    echo '<td class="user_cell">'.$row['password'].'</td>';
    echo '<td class="user_cell">0</td>';
    echo '<td class="user_cell">
      <button class="btn btn-danger"">Remove</button></td>';
    echo '</tr>';
  }?>
  </tbody>
</table>
