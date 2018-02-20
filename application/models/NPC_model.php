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
    $sql = "INSERT INTO npc(name, class, level, race, background,
      owner_id, combat_scenario) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $result = $this->db->query($sql, $insert_data);
    return $result;
  }

  public function npcs() {

    //$this->db->db_debug = false;
    if ( $_SESSION['is_admin'] == 1)
      $sql = "SELECT npc_id, name, class, level, race, background,
        combat_scenario, user.username FROM npc INNER JOIN user ON
        owner_id = user.user_id";
    else
      $sql = "SELECT npc_id, name, class, level, race, background, combat_scenario
        FROM npc WHERE owner_id=".$_SESSION['user_id'];

    return $this->db->query($sql);
  }


}
