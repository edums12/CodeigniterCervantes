<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base_Model extends CI_Model
{
    public $table;
    public $primary_key;

    public function __construct($table = NULL, $primary_key = NULL)
    {
        parent::__construct();

        $this->table = $table;
        $this->primary_key = $primary_key;
    }

    public function Get()
    {
        return $this->db->get($this->table)->result();
    }

    public function FindAll(array $conditional)
    {
        return $this->db->where($conditional)->get($this->table)->result();
    }

    public function Find(array $conditional)
    {
        return $this->db->where($conditional)->get($this->table)->row();
    }

    public function Save($data) :int
    {
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function Update($id, $data)
    {
        $id = $this->primary_key;

        $this->db->where($this->primary_key, $id)->update($this->table, $data);
    }

    public function Delete($id)
    {
        $this->db->where($this->primary_key, $id)->delete($this->table);
    }
}