<?php
class Users extends CI_Controller {

  public function add_user_form() {
    $data['page'] = 'admin/add_user_form';
    $this->load->view('admin/content', $data);
  }

  public function add_user_to_db() {
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

  public function list_users() {
    $this->load->model('Users_model');
    $data['users'] = $this->Users_model->users()->result_array();
    $data['page'] = 'admin/list_users';
    $this->load->view('admin/content', $data);
  }

  public function recent_activity() {
    $data['page'] = 'admin/recent_activity';
    $this->load->view('admin/content', $data);
  }
}
