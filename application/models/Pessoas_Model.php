<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas_Model extends Base_Model
{
    public function __construct()
    {
        parent::__construct('pessoa', 'id_pessoa');
    }
}