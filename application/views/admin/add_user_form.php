<h2 class="custom_header">Add new user</h2>
<div class="container">
<form action="<?php echo site_url('users/add_user_to_db'); ?>" method="POST">
    <div class="form-group">
      <label for="username">Username</label>
      <input required class="form-control" type="text" name="username" id="username" placeholder="New users username">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input required class="form-control" type="email" name="email" id="email" placeholder="Enter email address">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input data-bind="textInput: passwordOne" required class="form-control" type="password" name="password" id="password" placeholder="Type password">
    </div>
    <div class="form-group">
      <label for="password">Re-type password</label>
      <input data-bind="textInput: passwordTwo" required class="form-control" type="password" name="password_two" id="password_second" placeholder="Re-type password">
    </div>
    <button data-bind="enable: passwordOne() == passwordTwo() && passwordOne" class="btn btn-primary" type="submit">Add user</button>
</form>
<script type="text/javascript">
  function passwordViewModel() {
    this.passwordOne = ko.observable();
    this.passwordTwo = ko.observable();
  };
  ko.applyBindings(new passwordViewModel());
</script>
