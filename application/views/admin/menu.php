<h2> Administrator tools </h2>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('users/add_user_form') ?>">Add user</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('NPC/browse_npcs') ?>">Browse NPCs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('users/list_users') ?>">Browse users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('users/recent_activity') ?>">Recent activity</a>
      </li>
    </ul>
  </div>
</nav>
