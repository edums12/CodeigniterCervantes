<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('parser');
		
		$this->load->model('Pessoas_Model', 'pessoas');
	}

	public function index()
	{
		$data['pessoas'] = $this->pessoas->Get();

		// $this->parser->parse('welcome_message', $data);
		$this->load->view('welcome_message', $data);
	}

	public function delete($id)
	{
		$pessoa['id_pessoa'] = $id;

		$this->pessoas->Delete($pessoa);

		redirect(base_url('Welcome'));
	}
}
