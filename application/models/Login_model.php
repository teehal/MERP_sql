<?php
class Login_model extends CI_Model {

  public function process_log_in($input_data) {
    $sql = "SELECT username, user_id, is_admin, password FROM user WHERE username=?";
    $query = $this->db->query($sql, $input_data['username']);

    if ( count($query->result_array()) == 0)
      return false;

    $result = $query->row();

    if ( password_verify($input_data['password'], $result->password) &&
      $result->username == $input_data['username']) {
      $_SESSION['logged_in'] = true;
      $_SESSION['user'] = $input_data['username'];
      $_SESSION['user_id'] = $result->user_id;
      $_SESSION['is_admin'] = $result->is_admin;
      $_SESSION['user_url'] = $_SESSION['is_admin'] == 1 ? 'admin' : 'user';
      return true;
    }
    else
      return false;
  }
}
