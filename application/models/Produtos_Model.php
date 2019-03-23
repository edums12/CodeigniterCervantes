<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_Model extends Base_Model
{
    public function __construct()
    {
        parent::__construct('produto', 'id_produto');
    }
}