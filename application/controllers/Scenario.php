<?php
class Scenario extends CI_Controller {

  public function add_new_scenario_to_db() {
    $this->load->model('Scenario_model');
    $this->load->model('NPC_model');
    $insert_data = array(
      $this->input->post('scenario_name'),
      $this->input->post('description'),
      $_SESSION['user_id']
    );
    $this->Scenario_model->insert_scenario_to_db($insert_data);
    $scenario_data = array(
      $this->db->insert_id(),
      $this->input->post('npc_id')
    );
    $this->NPC_model->update_scenario_id_to_npc($scenario_data);
    $data['page'] = 'scenario/added_new_scenario_to_db';
    $data['scenario'] = $this->input->post('scenario_name');
    $this->load->view('user/content', $data);
  }

  public function confirm_delete_scenario($scenario_id) {
    $this->load->model('Scenario_model');
    $data['scenario'] = $this->Scenario_model->single_scenario($scenario_id);
    $data['page'] = "scenario/confirm_delete";
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }

  public function delete_scenario($id) {
    $this->load->model('Scenario_model');
    $this->load->model('NPC_model');
    $owner = $this->Scenario_model->single_scenario($id)->owner_id;
    $this->Scenario_model->delete_scenario($id);
    $data = array(
      $id,
      array($owner)
    );
    $data['page'] = 'scenario/scenario_deleted';
    $this->load->view($_SESSION.'/content', $data);
  //  $this->NPC_model->update_scenario_id_to_npc($data);
  }

  public function create_new_scenario(){
    $this->load->model('NPC_model');
    $data['npcs'] = $this->NPC_model->npcs()->result_array();
    $data['page'] = 'scenario/create_new_scenario_form';
    $this->load->view('user/content', $data);
  }

  public function scenarios() {
    $this->load->model('Scenario_model');
    $data['scenarios'] = $this->Scenario_model->scenarios()->result_array();
    $data['page'] = 'scenario/browse_scenarios_as_'.$_SESSION['user_url'];
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }
}
