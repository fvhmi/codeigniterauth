<?php
/**** Author = Fahmi Amiruddin Nafi (amirfahmi8@gmail.com) ****/

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('template'));
		$this->load->model('M_admin', 'admin');
	}

	function cek_login()
	{
		if (!$this->session->userdata('login'))
		{
			redirect('auth');
		}
	}

	public function index()
	{
		$this->cek_login();

		$data['users'] = $this->admin->get_all('user')->result();
		
		$this->template->admin('users/index', $data);
	}

	public function add()
	{
		$this->cek_login();
		
		$this->template->admin('users/add');
	}

	public function save()
	{
		$this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE)
        {
            $this->template->admin('users/add');
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

            $this->session->set_flashdata('success', "Berhasil Menambah User");

            redirect('user');
        }
	}

	public function edit($id)
    {
    	$id     = $this->uri->segment(3);

        $data['edit']   = $this->admin->get_where('user', array('id' => $id))->row();

        $this->template->admin('users/edit', $data);
    }

    public function update($id)
    {
        $id    = $this->uri->segment(3);

    	$data  = [
            'nama' 		=> $this->input->post('nama'),
        	'hp' 		=> $this->input->post('hp'),
        	'alamat' 	=> $this->input->post('alamat'),
        	'hobi'	 	=> $this->input->post('hobi'),
        ];

        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama', 'Name', 'required');
        $this->form_validation->set_rules('hp', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            $this->admin->update('user', $data, array('id' => $id));

            $this->session->set_flashdata('success', "Data user Berhasil diubah");

            redirect('user');

        }else{

            $data['edit']   = $this->admin->get_where('user', array('id' => $id))->row();

            $this->template->admin('users/edit', $data);
        }

    }

	public function delete($id)
    {
    	$this->cek_login();

        $id     = $this->uri->segment(3);

        $this->admin->delete('user', array('id' => $id));

        $this->session->set_flashdata('success', "Data user Berhasil dihapus");

        redirect('user');
    }

    public function getById()
    {
        $id       = $this->input->get('id');
        
        $result   = $this->admin->get_where('user', array('id' => $id))->row();

        echo json_encode($result);
    }
}
