 <?php
class Objek extends CI_Controller{
    
  function __construct(){
    parent::__construct();
    
   $this->load->library('pagination');
    $this->load->model('objek_model');

  }

  function index(){
        $config['base_url'] = site_url('objek/index'); //site url
        $config['total_rows'] = $this->db->count_all('tabelbarang1'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    $data['data'] = $this->objek_model->get_objek($config["per_page"], $data['page']);
    $data['pagination'] = $this->pagination->create_links();
    $this->load->view('objek_view',$data);
  }
  
  function add_new(){
    $this->load->view('add_objek_view');
  }
  
  function save(){
    $kode = $this->input->post('kode');
    $nama = $this->input->post('nama');
    $harga = $this->input->post('harga');
    $jumlah = $this->input->post('jumlah');
    $kondisi = $this->input->post('kondisi');
   
    $this->objek_model->save($kode,$nama,$harga,$jumlah,$kondisi);
    redirect('objek');
  }

  function delete(){
    $id = $this->uri->segment(3);
    $this->objek_model->delete($id);
    redirect('objek');
}

function get_edit(){
    $id = $this->uri->segment(3);
    $result = $this->objek_model->get_objek_id($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'kode'  => $i['kode'],
            'nama'     => $i['nama'],
            'harga' =>$i['harga'],
            'jumlah' =>$i['jumlah'],
            'kondisi' =>$i['kondisi']
        );
        $this->load->view('edit_objek_view',$data);
    }else{
        echo "Data Was Not Found";
    }
}

function update(){
    $id = $this->input->post('id');
    $kode = $this->input->post('kode');
    $nama = $this->input->post('nama');
    $harga = $this->input->post('harga');
    $jumlah = $this->input->post('jumlah');
    $kondisi = $this->input->post('kondisi');
    
    $this->objek_model->update($id,$kode,$nama,$harga,$jumlah,$kondisi);
    redirect('objek');
}

function transaksi(){
    $id = $this->uri->segment(3);
    $result = $this->objek_model->get_objek_id($id);
    if($result->num_rows() > 0){
        $i = $result->row_array();
        $data = array(
            'id'    => $i['id'],
            'kode'  => $i['kode'],
            'nama'     => $i['nama'],
            'harga' =>$i['harga'],
            'jumlah' =>$i['jumlah'],
            'kondisi' =>$i['kondisi']
        );
        $this->load->view('transaksi_view',$data);
    }else{
        echo "Data Was Not Found";
    }
}

function save_transaksi(){
    $id = $this->input->post('id');
    $kode = $this->input->post('kode');
    $nama = $this->input->post('nama');
    $harga = $this->input->post('harga');
    $jumlah = $this->input->post('jumlah');
    $jumlah_checkout = $this->input->post('jumlah_checkout');
    $kondisi = $this->input->post('kondisi');
    $sisa = $jumlah - $jumlah_checkout;
   
    $this->objek_model->save_transaksi($id,$kode,$nama,$harga,$jumlah_checkout,$kondisi);
    $this->objek_model->update_after_trans($id,$kode,$nama,$harga,$sisa,$kondisi);
     redirect('objek/tampil_transaksi');
  }

  function tampil_transaksi(){
    $data['data'] = $this->objek_model->get_objek_transaksi();
    $this->load->view('list_transaksi_view',$data);
  }

}