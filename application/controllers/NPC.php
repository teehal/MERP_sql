<?php
class NPC extends CI_Controller {

/*  public function show_npcs_admin() {
    $data['page'] = 'NPC/list_npcs';
    $data['user'] = 'admin';
    $this->load->view('admin/content', $data);
  }

  public function show_npcs_regular_user() {
    $data['page'] = 'NPC/list_npcs';
    $data['user'] = 'regular_user';
    $this->load->view('user/content', $data);
  } */
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

  public function add_npc_to_db() {
    $this->load->model('NPC_model');
    $small_armor = array(0, 0, 0, 0);
    $npc_armor = $this->input->post('add_armor');

    if ( count($npc_armor) > 0) {
      foreach ($npc_armor as $index)
        $small_armor[$index] = 1;
    }
    $insert_data = array(
      $this->input->post('name'),
      $this->input->post('class'),
      $this->input->post('level'),
      $this->input->post('race'),
      $this->input->post('primary_weapon'),
      $this->input->post('secondary_weapon'),
      $this->input->post('armor'),
      $this->input->post('def_bon'),
      $this->input->post('hp'),
      $this->input->post('ob_pri'),
      $this->input->post('ob_sec'),
      $small_armor[0],
      $small_armor[1],
      $small_armor[2],
      $small_armor[3],
      $this->input->post('background'),
      $_SESSION['user_id']
    );
    $result = $this->NPC_model->insert_npc_to_db($insert_data);

    if ($result)
      $data['message'] = "NPC successfully added to database.";
    else
      $data['message'] = "Unable to add NPC to database.";

    $data['page'] = 'NPC/add_npc_to_db';
    $this->load->view('user/content', $data);
  }

  public function browse_npcs() {
    $this->load->model('NPC_model');
    $data['npcs'] = $this->NPC_model->npcs()->result_array();
    $data['page'] = 'NPC/browse_npcs_as_'.$_SESSION['user_url'];
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }

  public function create_new_npc() {
    $data['page'] = 'NPC/create_new_npc';
    $this->load->view('user/content', $data);
  }

  public function confirm_delete_npc($npc_id) {
    $this->load->model('NPC_model');
    $data['chosen_npc'] = $this->NPC_model->chosen_npc($npc_id);
    $data['page'] = 'NPC/confirm_delete';
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }

  public function delete_npc($npc_id) {
    $this->load->model('NPC_model');
    $this->NPC_model->delete_chosen_npc($npc_id);
    $data['page'] = 'NPC/npc_deleted';
    $this->load->view($_SESSION['user_url'].'/content', $data);
  }

  public function edit_npc($id) {
    $this->load->model('NPC_model');
    $data['npc'] = $this->NPC_model->chosen_npc($id);
    $data['page'] = 'NPC/edit_npc';
    $data['npc_id'] = $id;
    $this->load->view('user/content', $data);
  }

  public function npc_editor() {
    $data['page'] = 'NPC/npc_editor';
    $user_url = $_SESSION['user'] == 'admin' ? 'admin' : 'user';
    $this->load->view($user_url.'/content', $data);
  }

  public function combat_helper() {
    $data['page'] = 'NPC/combat_helper';
    $this->load->view('user/content', $data);
  }

  public function update_npc_to_db($id) {
    $data['page'] = 'NPC/npc_updated_to_db';
    $data['id'] = $id;
    $this->load->view('user/content', $data);
  }

}
