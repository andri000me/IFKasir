<?php

class Inv_model extends CI_Model
{
	public function get_session()
	{
		$query = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
		return $query->row_array();
	}
	public function list_barang()
	{
		return $this->db->get('stock_barang');
	}
	public function list_pembelian()
	{
		return $this->db->get('pembelian');
	}
	public function list_loss_pembelian()
	{
		return $this->db->where('status', 1)->get('pembelian');
	}
	public function list_detail_pembelian($id = null)
	{
		return $this->db->where('id_pembelian', $id)->get('detail_pembelian');
	}
	public function jumlah_barang()
	{
		return $this->db->count_all_results('stock_barang');
	}
	public function jumlah_total_barang()
	{
		return $this->db->select('SUM(qty_inventory) as qty_inventory')->get('stock_barang')->row_array();
	}
	public function jumlah_pegawai()
	{
		return $this->db->count_all_results('user');
	}
	public function kerugian()
	{
		return $this->db->select('SUM(total_rugi) as kerugian')->get('pembelian')->row_array();
	}

	public function list_barang_pembelian($id = null)
	{
		return $this->db->query("SELECT detail_pembelian.id_barang, stock_barang.nama_barang FROM detail_pembelian JOIN stock_barang ON detail_pembelian.id_barang=stock_barang.id_barang WHERE id_pembelian='$id'");
	}
}
