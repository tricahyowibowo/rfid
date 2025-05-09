<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model
{
    function GetData($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();

        return $query->result();
	}

    function GetDataById($where,$table){
        $this->db->select('*');
        $this->db->from($table);
		$this->db->where($where);
        $query = $this->db->get();

        return $query->result();
    }

    function GetdataRow($table){
        $this->db->select('*');
        $this->db->from($table);
        $query = $this->db->get();

        return $query->row();
	}

    function GetdataRowById($ParamSelect, $where, $table){
        $this->db->select($ParamSelect);
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();

        return $query->row();
	}

    function input($data,$table)
    {
        $this->db->insert($table,$data);
    }

    function update($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

    function delete($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
}