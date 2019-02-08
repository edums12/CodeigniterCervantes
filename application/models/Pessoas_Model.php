<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoas_Model extends CI_Model
{
    const TABLE = 'pessoa';

    public function Get()
    {
        return $this->db->order_by('id_pessoa')->get(self::TABLE)->result();
    }

    public function Save($pessoa) :int
    {
        $this->db->insert(self::TABLE, $pessoa);

        return $this->db->insert_id();
    }

    public function Update($pessoa)
    {
        $this->db->where('id_pessoa', ((object)$pessoa)->id_pessoa)->update(self::TABLE, $pessoa);
    }

    public function Delete($pessoa)
    {
        $this->db->delete(self::TABLE, array('id_pessoa' => ((object)$pessoa)->id_pessoa));
    }
}