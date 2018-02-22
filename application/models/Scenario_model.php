<?php
class Scenario_model extends CI_Model {

  public function all_scenarios() {
    if ($_SESSION['is_admin'] == 1) {
      $sql = "SELECT user.username, combat_scenario.scenario_id, scenario_name, description
        FROM combat_scenario INNER JOIN user ON combat_scenario.owner_id = user.user_id";
      return $this->db->query($sql);
    }
    else {
      $sql = "SELECT * FROM (SELECT user.username, user.user_id, combat_scenario.scenario_id, scenario_name, description
        FROM combat_scenario INNER JOIN user ON combat_scenario.owner_id = user.user_id) AS abc
        WHERE abc.user_id=?";
      return $this->db->query($sql, $_SESSION['user_id']);
    }
  }

  public function insert_scenario_to_db($insert_data) {
    $sql = "INSERT INTO combat_scenario(scenario_name, description,
      owner_id) VALUES (?, ?, ?)";
    $this->db->query($sql, $insert_data);
  }

  public function delete_scenario($id) {
    $sql = "DELETE FROM combat_scenario WHERE scenario_id=?";
    $this->db->query($sql, $id);
  }

  public function scenarios() {
    if ($_SESSION['is_admin'] == 1) {
      $sql = "SELECT scenario_name,user.username, description, combat_scenario.scenario_id,
        GROUP_CONCAT(name) AS npcs FROM combat_scenario INNER JOIN (npc,user) ON (npc.scenario_id =
        combat_scenario.scenario_id AND user.user_id = npc.owner_id) GROUP BY
        scenario_name,user.username, description, combat_scenario.scenario_id";
      return $this->db->query($sql);
    }
    else {
    $sql = "SELECT * FROM (SELECT scenario_name,npc.owner_id, description,
      combat_scenario.scenario_id, GROUP_CONCAT(name) AS npcs
      FROM combat_scenario INNER JOIN npc ON npc.scenario_id = combat_scenario.scenario_id
      GROUP BY scenario_name,npc.owner_id, description, combat_scenario.scenario_id) AS abc
      WHERE abc.owner_id=?";
    return $this->db->query($sql, $_SESSION['user_id']);
    }
  }

  public function single_scenario($id) {
    $sql = "SELECT * FROM combat_scenario WHERE scenario_id=?";
    return $this->db->query($sql, $id)->row();
  }

  public function update_scenario_in_db($data) {
    $sql = "UPDATE combat_scenario SET scenario_name=?, description=? WHERE scenario_id=?";
    $this->db->query($sql, $data);
  }
}
