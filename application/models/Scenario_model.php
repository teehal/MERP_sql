<?php
class Scenario_model extends CI_Model {

  public function insert_scenario_to_db($insert_data) {
    $sql = "INSERT INTO combat_scenario(scenario_name, description,
      owner_id) VALUES (?, ?, ?)";
    $this->db->query($sql, $insert_data);
  }

  public function delete_scenario() {

  }

  public function scenarios() {
    if ($_SESSION['is_admin'] == 1) {
      $sql = "SELECT * FROM combat_scenario";
      return $this->db->query($sql);
    }
    else {
    $sql = "SELECT * FROM combat_scenario WHERE owner_id=?";
    return $this->db->query($sql, $_SESSION['user_id']);
  }
  }
}