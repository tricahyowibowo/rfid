<?php
/**
* 
*/
class Cart_model extends CI_Model
{
	function GetData(){
		$this->db->select('*');
		$this->db->from('keranjang a');
		$this->db->join('barang b','b.kode = a.kode');

		$query = $this->db->get();
		return $query->result();
	}

	function GetDataById($where){
		$this->db->select('*');
		$this->db->from('keranjang a');
		$this->db->join('barang b','b.kode = a.kode');
		$this->db->where($where);

		$query = $this->db->get();
		return $query->result();
	}

	function MaxNoKeranjang(){
		$this->db->select('id_keranjang, no_keranjang, status');
		$this->db->from('keranjang');
		// $this->db->where('status',0);
		$this->db->order_by('id_keranjang','DESC');
		$query = $this->db->get();
		return $query->row();
	}
}

?>