<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Vendas_Model', 'vendas');
		$this->load->model('Produtos_Model', 'produtos');
		$this->load->model('Pessoas_Model', 'pessoas');
	}

	public function index()
	{
		$data['meses'] = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

		$data['relatorio'] = [];
		$data['relatorio'][1] = 0;
		$data['relatorio'][2] = 0;
		$data['relatorio'][3] = 0;
		$data['relatorio'][4] = 0;
		$data['relatorio'][5] = 0;
		$data['relatorio'][6] = 0;
		$data['relatorio'][7] = 0;
		$data['relatorio'][8] = 0;
		$data['relatorio'][9] = 0;
		$data['relatorio'][10] = 0;
		$data['relatorio'][11] = 0;
		$data['relatorio'][12] = 0;
		
		foreach ($this->vendas->dados() as $venda){
			$data['relatorio'][$venda->mes] = $venda->total;
		}

		$data['meses_label'] = "'" . join("', '", $data['meses']) . "'";
		$data['relatorio_datasets'] = join(',', $data['relatorio']);

		$this->load->view('include/header');
		$this->load->view('include/navbar');
		$this->parser->parse('vendas/listar_vendas', $data);
		$this->load->view('include/footer');
	}

}
