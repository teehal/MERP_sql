<?php
class Users_model extends CI_Model {

  public function insert_user_to_db($insert_data) {
    $this->db->db_debug = false;
    $sql = "INSERT INTO user(username, email, password) VALUES (?, ?, ?)";
    $result = $this->db->query($sql, $insert_data);
    return $result;
  }

  public function users() {
    $sql = "SELECT * FROM user";
    return $this->db->query($sql);
  }
}
