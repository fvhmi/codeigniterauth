<?php
/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('template'));
		$this->load->model('M_admin', 'admin');
	}

	function cek_login()
	{
		if ($this->session->userdata('login'))
		{
			redirect('user');
		}
	}

	public function index()
	{
		$this->cek_login();
		$this->load->view('auth/login');
	}

	public function login()
	{
		$email 	= $this->input->post('email', TRUE);
     	$pass 	= $this->input->post('password', TRUE);

		$cek 	= $this->admin->get_where('user', array('email' => $email));

		if ($cek->num_rows() > 0) {
			
			$data = $cek->row();

			if (password_verify($pass, $data->password))
			{

				$datauser = array (
					'id'     	=> $data->id,
					'nama'  	=> $data->nama,
					'email'     => $data->email,
					'level'     => $data->level,
					'login'     => TRUE
				);

				$this->session->set_userdata($datauser);

				redirect('user');

			} else {
				$this->session->set_flashdata('alert', "Password yang anda masukkan salah..");

				redirect('auth');
			}

		} else {
			$this->session->set_flashdata('alert', "Email tidak terdaftar");

			redirect('auth');
		}

	}

	public function logout()
   	{
      	$this->session->sess_destroy();

      	redirect('auth');
   	}

   	public function register()
   	{
   		$this->load->view('auth/register');
   	}

   	public function signup()
	{
		$this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('auth/register');
        }
        else
        {
            $data = [
            	'nama' 		=> $this->input->post('nama'),
            	'email' 	=> $this->input->post('email'),
            	'password' 	=> password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
            	'status' 	=> 'aktif',
            	'level' 	=> '1',
            ];

            $this->admin->insert('user', $data);

            $this->session->set_flashdata('success', "Berhasil Registrasi, Silahkan Login");

            redirect('auth');
        }
	}
}
