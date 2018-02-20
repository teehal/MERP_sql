<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#"> <?php echo $_SESSION['user']; ?> </a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('NPC/browse_npcs');?>">Own NPCs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('NPC/npc_editor');?>">Editor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('NPC/combat_helper');?>">Combat helper</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('NPC/create_new_npc');?>">Create new NPC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Other</a>
      </li>
    </ul>
  </div>
</nav>
