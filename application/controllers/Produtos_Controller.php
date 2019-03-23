<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Produtos_Model', 'produtos');
	}

	public function index()
	{
		$data['produtos'] = $this->produtos->Get();

		array_map(
			function ($produto){
				$produto->valor_display = "R$ " . number_format($produto->valor, 2, ',', '.');
			},
			$data['produtos']
		);

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->parser->parse('produtos/listar_produtos', $data);
		$this->load->view('include/footer');
	}

	public function add()
	{
		try 
		{
			$data = (object)$this->input->post();

			if (empty($data->codigo))
				throw new Exception("Código do produto não infomado");
				
			if (empty($data->descricao))
				throw new Exception("Descrição do produto não informada");

			if (empty($data->valor) || $data->valor < 0)
				throw new Exception("Valor do produto não informado ou menor que zero");
			
			$this->produtos->Save($data);
			
			$this->session->set_flashdata('success', 'Produto cadastrado!');	
		} 
		catch (Exception $ex) 
		{
			$this->session->set_flashdata('error', $ex->getMessage());
		}
		finally
		{
			redirect(base_url('produtos'));
		}
	}

	public function delete($id)
	{
		try 
		{
			$this->produtos->Delete($id);
		} 
		catch (Exception $ex)
		{
			$this->session->set_flashdata('error', $ex->getMessage());
		}
		finally
		{
			redirect(base_url('produtos'));
		}
	}

}
