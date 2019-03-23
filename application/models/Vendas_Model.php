<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendas_Model extends Base_Model
{
    public function __construct()
    {
        parent::__construct('venda', 'id_venda');
    }

    public function dados()
    {
        return 
            $this->db->query(
                "SELECT
                    DATE_PART('MONTH', data_hora) as mes,
                    SUM(valor_venda) as total
                FROM
                    venda
                INNER JOIN venda_item USING(id_venda)
                GROUP BY DATE_PART('MONTH', data_hora);
                ")->result();
    }
}