<h1> Login for MERP </h1>
<div class="container">
  <form action="<?php echo site_url('login/log_in'); ?>" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input class="form-control" type="text" name="username" id="username" placeholder="Enter your username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input class="form-control" type="password" name="password" id="password" placeholder="Enter your password">
    </div>
    <button class="btn btn-primary" type="submit">Log in</button>
  </form>
</div>
