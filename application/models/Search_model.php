 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model {

	public function ambil_data($keyword=null){
		$this->db->select('*');
		$this->db->from('tabelbarang1');
		if(!empty($keyword)){
			$this->db->like('nama',$keyword);
			
		}
		$result = $this->db->get();
		return $result;
	}

}