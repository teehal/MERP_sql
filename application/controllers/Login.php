<?php
class Login extends CI_Controller {

  public function view($page = 'login'){

    if ( !file_exists(APPPATH.'views/login/'.$page.'.php') )
      show_404();

    $data['title'] = ucfirst($page);

    $this->load->view('templates/header', $data);
    $this->load->view('login/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }

  public function log_in() {
    $this->load->model('Login_model');
    $login_array = array(
      'username' => $this->input->post('username'),
      'password' => $this->input->post('password')
    );
    $result = $this->Login_model->process_log_in($login_array);
    // $admin_pwd = 'admin123';
    // $admin_user = 'pekka';
    // $regular_user = 'user1';
    // $regular_user_pwd = 'user1';
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
    // if ( $username == $admin_user && $password == $admin_pwd ) {
    //   $_SESSION['logged_in'] = true;
    //   $_SESSION['user'] = 'admin';
    //   $data['page'] = "admin/index";
    // //  $this->load->view('templates/header', $data);
    //   $this->load->view('admin/content', $data);
    // //  $this->load->view('templates/footer', $data);
    // }
    // else if ( $username == $regular_user && $password == $regular_user_pwd ) {
    //   $_SESSION['logged_in'] = true;
    //   $_SESSION['user'] = $username;
    //   $data['page'] = 'user/index';
    //   //$this->load->view('templates/header', $data);
    //   $this->load->view('user/content', $data);
    //   //$this->load->view('templates/footer', $data);
    // }
    // else {
    //   $data['message'] = "Invalid username or password.";
    //   $this->load->view('templates/header', $data);
    //   $this->load->view('errors/failed_login', $data);
    //   $this->load->view('templates/footer', $data);
    // }
  }
}
