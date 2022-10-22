<?php
class Objek_model extends CI_Model{
 
  function get_objek($limit, $start){
    $result = $this->db->get('tabelbarang1', $limit, $start);
    return $result;
  }
  
  function save($kode,$nama,$harga,$jumlah,$kondisi){
    $data = array(
      'kode' => $kode,
      'nama' => $nama,
      'harga' => $harga,
      'jumlah' => $jumlah,
      'kondisi' => $kondisi
    );
    $this->db->insert('tabelbarang1',$data);
  }

  function delete($id){
    $this->db->where('id', $id);
    $this->db->delete('tabelbarang1');
}

function get_objek_id($id){
    $query = $this->db->get_where('tabelbarang1', array('id' => $id));
    return $query;
}

function update($id,$kode,$nama,$harga,$jumlah,$kondisi){
    $data = array(
      'kode' => $kode,
      'nama' => $nama,
      'harga' => $harga,
      'jumlah' => $jumlah,
      'kondisi' => $kondisi
    );
    $this->db->where('id', $id);
    $this->db->update('tabelbarang1', $data);
}

function cariBarang(){
  $keyword = $this->input->post('keyword');
  $this->db->like('nama', $keyword);
  return $this->db->get('tabelbarang1')->result_array();
}

function get_objek_transaksi(){
    $result = $this->db->get('transaksi');
    return $result;
  }

function save_transaksi($id, $kode,$nama,$harga,$jumlah_checkout,$kondisi){
    $data = array(
      'id' => $id,
      'kode' => $kode,
      'nama' => $nama,
      'harga' => $harga,
      'jumlah_checkout' => $jumlah_checkout,
      'kondisi' => $kondisi
    );
    $this->db->insert('transaksi',$data);
  }

  function update_after_trans($id,$kode,$nama,$harga,$sisa,$kondisi){
    $data = array(
      'kode' => $kode,
      'nama' => $nama,
      'harga' => $harga,
      'jumlah' => $sisa,
      'kondisi' => $kondisi
    );
    $this->db->where('id', $id);
    $this->db->update('tabelbarang1', $data);
}

}