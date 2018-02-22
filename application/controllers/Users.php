<?php
class Users extends CI_Controller {

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

  public function add_user_form() {
    if ($_SESSION['is_admin'] == 1) {
      $data['page'] = 'admin/add_user_form';
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }

  public function add_user_to_db() {
    if ($_SESSION['is_admin'] == 1) {
      $this->load->model('Users_model');
      $insert_data = array(
        $username = $this->input->post('username'),
        $email = $this->input->post('email'),
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT)
      );
      $result = $this->Users_model->insert_user_to_db($insert_data);

      if ($result)
        $data['message'] = "User ".$username." successfully added to database.";
      else
        $data['message'] = "There was an error adding user ".$username." to database.";

      $data['page'] = 'user/add_user_to_db';
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }

  public function confirm_delete($user_id) {
    if ($_SESSION['is_admin'] == 1) {
      $this->load->model('Users_model');
      $data['chosen_user'] = $this->Users_model->single_user($user_id)->row();
      $data['page'] = 'user/confirm_delete';
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }

  public function delete_user($user_id) {
    if ($_SESSION['is_admin'] == 1) {
      $this->load->model('Users_model');
      $data['name'] = $this->Users_model->delete_user($user_id);
      $data['page'] = 'user/user_deleted';
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }

  public function introduction() {
    if ($_SESSION['is_admin'] == 1) {
      $data['page'] = 'admin/index';
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }
  public function list_users() {
    if ($_SESSION['is_admin'] == 1) {
      $this->load->model('Users_model');
      $data['users'] = $this->Users_model->users()->result_array();
      $data['page'] = 'admin/list_users';
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }
}
