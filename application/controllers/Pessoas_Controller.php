<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('parser');
		
		$this->load->model('Pessoas_Model', 'pessoas');
	}

	public function index()
	{
		$data['pessoas'] = $this->pessoas->Get();

		array_map(
			function($pessoa){
				$pessoa->data_aniversario_display = date('d/m/Y', strtotime($pessoa->data_aniversario));
			},
			$data['pessoas']
		);

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->parser->parse('pessoas/listar_pessoas', $data);
		$this->load->view('include/footer');
	}

	public function get()
	{
		$data['pessoas'] = $this->pessoas->Get();

		echo json_encode($data);
	}

	public function add()
	{
		try 
		{
			$data = (object)$this->input->post();

			if (empty($data->nome_pessoa))
				throw new Exception("Nome pessoa inválido");
				
			if (empty($data->data_aniversario))
				throw new Exception("Data de aniversário inválida");
			
			$this->pessoas->Save($data);
			
			$this->session->set_flashdata('success', 'Pessoa cadastrada!');	
		} 
		catch (Exception $ex) 
		{
			$this->session->set_flashdata('error', $ex->getMessage());
		}
		finally
		{
			redirect(base_url('pessoas'));
		}
	}

	public function ajax_add()
	{
		try 
		{
			$data = (object)$this->input->post();

			if (empty($data->nome_pessoa))
				throw new Exception("Nome pessoa inválido");
				
			if (empty($data->data_aniversario))
				throw new Exception("Data de aniversário inválida");
			
			$this->pessoas->Save($data);
			
			echo json_encode((object)['data' => 'Pessoa cadastrada', 'type' => 'success']);	
		} 
		catch (Exception $ex) 
		{
			echo json_encode((object)['data' => $ex->getMessage(), 'type' => 'error']);	
		}
	}

	public function edit($id)
	{
		try 
		{
			$data = (object)$this->input->post();

			if (empty($data->nome_pessoa))
				throw new Exception("Nome pessoa inválido");
				
			if (empty($data->data_aniversario))
				throw new Exception("Data de aniversário inválida");

			$data->id_pessoa = $id;

			$this->pessoas->Update($data);
		} 
		catch (Exception $ex)
		{
			$this->session->set_flashdata('error', $ex->getMessage());
		}
		finally
		{
			redirect(base_url('pessoas'));
		}
	}

	public function delete($id)
	{
		try 
		{
			$this->pessoas->Delete($id);
		} 
		catch (Exception $ex)
		{
			$this->session->set_flashdata('error', $ex->getMessage());
		}
		finally
		{
			redirect(base_url('pessoas'));
		}
	}
}
