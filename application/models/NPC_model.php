<?php
class NPC_model extends CI_Model {

  public function chosen_npc($npc_id) {
    $sql = "SELECT npc_id, name FROM npc WHERE npc_id=?";
    return $this->db->query($sql, $npc_id)->row();
  }

  public function delete_chosen_npc($npc_id) {
    $sql = "DELETE FROM npc WHERE npc_id=?";
    $this->db->query($sql, $npc_id);
  }

  public function insert_npc_to_db($insert_data) {
    //$this->db->db_debug = false;
    $sql = "INSERT INTO npc(name, class, level, race,
      primary_weapon, secondary_weapon, armor, defensive_bonus,
      hit_points, offensive_primary, offensive_secondary, shield,
      helmet, leg_armor, arm_armor, background, owner_id) VALUES (?, ?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $result = $this->db->query($sql, $insert_data);
    return $result;
  }

  public function insert_scenario_id_to_npc($data){
    if ( count($data[0]) > 0 ) {
      $sql = "UPDATE npc SET scenario_id=? WHERE npc_id IN ?";
      $this->db->query($sql, $data);
    }
  }

  public function npcs() {

    //$this->db->db_debug = false;
    if ( $_SESSION['is_admin'] == 1)
      $sql = "SELECT npc_id, name, class, level, race, background,
        scenario_id, user.username FROM npc INNER JOIN user ON
        owner_id = user.user_id";
    else
      $sql = "SELECT npc_id, name, class, level, race, background, scenario_id
        FROM npc WHERE owner_id=".$_SESSION['user_id'];

    return $this->db->query($sql);
  }


}
