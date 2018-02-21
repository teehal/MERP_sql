<?php
class Login extends CI_Controller {


  public function index() {
    $data['title'] = 'Hello';

    $this->load->view('templates/header', $data);
    $this->load->view('login/login', $data);
    $this->load->view('templates/footer', $data);
  }

  public function log_in() {
    $this->load->model('Login_model');
    $login_array = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password')
    );
    $result = $this->Login_model->process_log_in($login_array);

    if ( !$result ) {
      $data['message'] = "Invalid username or password.";
      $this->load->view('templates/header', $data);
      $this->load->view('errors/failed_login', $data);
      $this->load->view('templates/footer', $data);
    }
    elseif ( $_SESSION['is_admin'] == 1) {
      $data['page'] = "admin/index";
      $this->load->view('admin/content', $data);
    }
    else {
      $data['page'] = 'user/index';
      $this->load->view('user/content', $data);
    }
  }

  public function log_out() {
    $_SESSION['logged_in'] = false;
    session_destroy();
    redirect('login/index');
  }
}
