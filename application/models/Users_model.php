<?php
class Users_model extends CI_Model {

  public function delete_user($user_id) {
    $sql_first = "DELETE FROM npc WHERE owner_id=?";
    $sql_second = "DELETE FROM user WHERE user_id=?";
    $this->db->query($sql_first, $user_id);
    $this->db->query($sql_second, $user_id);
  }

  public function insert_user_to_db($insert_data) {
    $this->db->db_debug = false;
    $sql = "INSERT INTO user(username, email, password) VALUES (?, ?, ?)";
    $result = $this->db->query($sql, $insert_data);
    return $result;
  }

  public function single_user($user_id) {
    $sql = "SELECT username, user_id FROM user WHERE user_id=?";
    return $this->db->query($sql, $user_id);
  }

  public function users() {
    $sql = "SELECT * FROM user";
    return $this->db->query($sql);
  }
}
