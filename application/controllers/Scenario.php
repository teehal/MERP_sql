<?php
class Scenario extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		if(isset($_SESSION['logged_in'])){
      //we dont' do anything
    }
    else {
      redirect('login/index');
    }
	}

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

  public function combat_scenario($id) {
    $this->load->model('NPC_model');
    $this->load->model('Scenario_model');
    $data['npcs'] = $this->NPC_model->npcs_for_scenario($id)->result_array();
    $data['scenario_info'] = $this->Scenario_model->single_scenario($id);
    $data['page'] = 'scenario/combat_scenario';
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
    $owner = $this->Scenario_model->single_scenario($id)->owner_id;
    $this->Scenario_model->delete_scenario($id);
    $data['page'] = 'scenario/scenario_deleted';
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }

  public function edit_combat_scenario($id) {
    $this->load->model('Scenario_model');
    $this->load->model('NPC_model');
    $data['scenario_info'] = $this->Scenario_model->single_scenario($id);
    $data['npcs'] = $this->NPC_model->npcs_for_new_scenario()->result_array();
    $data['page'] = 'scenario/edit_scenario_form';
    $this->load->view('user/content', $data);
  }

  public function create_new_scenario(){
    $this->load->model('NPC_model');
    $data['npcs'] = $this->NPC_model->npcs_for_new_scenario()->result_array();
    $data['page'] = 'scenario/create_new_scenario_form';
    $this->load->view('user/content', $data);
  }

  public function scenarios() {
    $this->load->model('Scenario_model');
    $data['scenarios'] = $this->Scenario_model->scenarios()->result_array();
    $data['all_scenarios'] = $this->Scenario_model->all_scenarios()->result_array();
    $data['page'] = 'scenario/browse_scenarios_as_'.$_SESSION['user_url'];
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }

  public function update_scenario_to_db($id) {
    $this->load->model('Scenario_model');
    $this->load->model('NPC_model');
    $data['npc_ids'] = $this->NPC_model->npcs_for_scenario($id)->result_array();
    $data['scenario_id'] = $id;
    $data['ids_after_edit'] = $this->input->post('npc_id');
    $update_data = array(
      $this->input->post('scenario_name'),
      $this->input->post('description'),
      $id
    );
    $this->Scenario_model->update_scenario_in_db($update_data);
    $this->NPC_model->update_scenario_id_after_edit($data);
    $data['page'] = 'scenario/scenario_updated';
    $this->load->view('user/content', $data);

  }
}
