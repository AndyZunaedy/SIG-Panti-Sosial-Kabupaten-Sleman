<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()

    {
        parent::__construct();
        $this->load->model('m_data');

        $this->load->library('form_validation');
    }
    public function index()
    {
        $dataa["panti"] = $this->m_data->tampil_jenis_panti();
        $data['title'] = 'Sosial Sesama';
        
        
        $dataa['kegiatan'] = $this->m_data->kegiatan_dashboard();
        $dataa['jenis_panti'] = $this->m_data->jenis_panti_marker();

        $config['base_url'] = site_url('dashboard/index');
        $config['total_rows'] = $this->m_data->menghitung_kegiatan();
        $config['per_page'] = 4;

        $config['full_tag_open'] = '<nav"> <ul class="pagination">';
        $config['full_tag_close'] = '</ul> </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        $dataa['pagination'] = $this->pagination->create_links();
        $dataa['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $dataa["profil_keyword"] = $this->m_data->tampil_kegiatan_array_profil($config['per_page'], $dataa['start']);
        
     
        $data["lokasi"] = $this->m_data->tampil_profil_array();
        
        
        $this->load->view('Halaman_web/Templates/kepala', $data);
        $this->load->view('Halaman_web/Home',  $dataa, $data);
        // $this->load->view('Halaman_web/halaman1',  $dataa);
        $this->load->view('Halaman_web/Templates/kaki');
    }

    public function marker()
    {
        $data = $this->db->get('profil_panti')->result();
        echo json_encode($data);
    }
    // public function data_orang_panti()
    // {
    
    
    //     $data['title'] = 'Data Penghuni';
    //     $config['base_url'] = site_url('dashboard/data_orang_panti');
    //     $config['total_rows'] = $this->m_data->menghitung_penghuni();
    //     $config['per_page'] = 12;

    //     $config['full_tag_open'] = '<nav"> <ul class="pagination">';
    //     $config['full_tag_close'] = '</ul> </nav>';

    //     $config['first_link'] = 'First';
    //     $config['first_tag_open'] = '<li class="page-item">';
    //     $config['first_tag_close'] = '</li>';

    //     $config['last_link'] = 'Last';
    //     $config['last_tag_open'] = '<li class="page-item">';
    //     $config['last_tag_close'] = '</li>';

    //     $config['next_link'] = '&raquo';
    //     $config['next_tag_open'] = '<li class="page-item">';
    //     $config['next_tag_close'] = '</li>';

    //     $config['prev_link'] = '&laquo';
    //     $config['prev_tag_open'] = '<li class="page-item">';
    //     $config['prev_tag_close'] = '</li>';

    //     $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
    //     $config['cur_tag_close'] = '</a></li>';

    //     $config['num_tag_open'] = '<li class="page-item">';
    //     $config['num_tag_close'] = '</li>';

    //     $config['attributes'] = array('class' => 'page-link');


    //     $this->pagination->initialize($config);
    //     $data['pagination'] = $this->pagination->create_links();
    //     $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
    //     $keyword = $this->input->post('keyword');
    //     $data["profil_keyword"] = $this->m_data->get_penghuni($config['per_page'], $data['start']);

    //     $data['kegiatan'] = $this->m_data->kegiatan_dashboard();

    //     $this->load->view('Halaman_web/Templates/Kepala', $data);
    //     $this->load->view('Halaman_web/dataorang_panti', $data);
    //     $this->load->view('Halaman_web/Templates/Kaki');
    // }

    public function lokasi()
    {
      
      if($this->input->post('search')){
         $data['keyword'] = $this->input->post('keyword');
         $this->session->set_userdata('keyword', $data['keyword']);
      }else{
          $data['keyword'] = $this->session->userdata('keyword');
      }
        
        //config
        $config['base_url'] = site_url('dashboard/lokasi');
        $this->db->like('nama_panti', $data['keyword']);
        $this->db->from('profil_panti');
        $this->db->where('aktifasi_profil', '1');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->m_data->menghitung_panti();
        $config['per_page'] = 8;

        $config['full_tag_open'] = '<nav"> <ul class="pagination">';
        $config['full_tag_close'] = '</ul> </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);

        $dataa['start'] = $this->uri->segment(3);

        // $keyword = $this->input->post('keyword');
        // $data = array(
        //     'keyword' => $keyword,
        //     'data' => $dataa
        // );
       
        //akhir config
        $data['pagination'] = $this->pagination->create_links();
        $data['data'] = $this->m_data->tampil_profil_dashboard($config['per_page'], $dataa['start'], $data['keyword']);
       
        
        //kegiatan pagination
        
        $data["profile_keyword"] = $this->m_data->tampil_kegiatan_lokasi();
        $data['title'] = 'Lokasi';
        $data['jenis_panti'] = $this->m_data->jenis_panti_lokasi();
        

        $this->load->view('Halaman_web/Templates/kepala', $data);
        $this->load->view('Halaman_web/Lokasi', $data);
        $this->load->view('Halaman_web/Templates/kaki');
    }
    public function kegiatan()

    {
         
         if($this->input->post('search')){
         $data['keyword'] = $this->input->post('keyword');
         $this->session->set_userdata('keyword', $data['keyword']);
        }else{
          $data['keyword'] = $this->session->userdata('keyword');
        }
        
        
        $config['base_url'] = site_url('dashboard/kegiatan');
        
        $this->db->like('nama_kegiatan', $data['keyword']);
        $this->db->from('kegiatan');
        $this->db->where('aktifasi_kegiatan', '1');
        $config['total_rows'] = $this->db->count_all_results();
         $config['per_page'] = 8;
        // $config['total_rows'] = $this->m_data->menghitung_kegiatan();
       

        $config['full_tag_open'] = '<nav"> <ul class="pagination">';
        $config['full_tag_close'] = '</ul> </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $keyword = $this->input->post('keyword');

        $this->pagination->initialize($config);
        $dataa['pagination'] = $this->pagination->create_links();
        $dataa['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $dataa["profil_keyword"] = $this->m_data->tampil_kegiatan_array($config['per_page'], $dataa['start'], $data['keyword']);
        
        
        
        $data['title'] = 'Kegiatan';
       
        $dataa["lokasi"] = $this->m_data->tampil_profil_array_kegiatan();


        $dataa['kegiatan'] = $this->m_data->kegiatan_dashboard();
        $dataa['jenis_panti'] = $this->m_data->jenis_panti_marker();

        $this->load->view('Halaman_web/Templates/kepala', $data);
        $this->load->view('Halaman_web/Kegiatan', $dataa);
        $this->load->view('Halaman_web/Templates/kaki');
    }

    public function tampil_lokasi($id_profil)
    {
        $dataa['title'] = 'Tampil Lokasi';
        // $data["id_penghuni"] = $this->m_data->get_penghuni_lokasi($id_profil);
        $data["id_foto"] = $this->m_data->get_foto_profil($id_profil);
        $data["id_profil"] = $this->m_data->get_profil($id_profil);
        $data["profil"] = $this->m_data->penghuni_innerjoin($id_profil);
        $data['jenis_panti'] = $this->m_data->jenis_panti_lokasi();
        $config['base_url'] = site_url('Dashboard/tampil_lokasi/' . $id_profil . '');
        $config['total_rows'] = $this->m_data->tampil_penghuni_rows($id_profil);
        $config['per_page'] = 7;

        $config['full_tag_open'] = '<nav"> <ul class="pagination">';
        $config['full_tag_close'] = '</ul> </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');



        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['start'] = $this->uri->segment(4) ? $this->uri->segment(4) : 0;
        $data["id_penghuni"] = $this->m_data->get_penghuni_lokasi($id_profil, $config['per_page'], $data['start']);
        $data["tampil_komentar"] = $this->m_data->tampil_komentar($id_profil);

        $this->load->view('Halaman_web/Templates/kepala', $dataa);
        $this->load->view('Halaman_web/Tampil_lokasi', $data);
        $this->load->view('Halaman_web/Templates/kaki');
    }
    public function detail_lokasi($id_profil)
    {
        $data['title'] = 'Detail Lokasi';
        $data["id_profil"] = $this->m_data->get_profil($id_profil);
        $this->load->view('Halaman_web/Templates/kepala', $data);
        $this->load->view('Halaman_web/Detail_lokasi', $data);
        $this->load->view('Halaman_web/Templates/kaki');
    }
    public function tampil_kegiatan($id_kegiatan)
    {
        $data['title'] = 'Tampil Kegiatan';
        $dataa['start'] = $this->uri->segment(1);
        $config['per_page'] = 3;
        $data["id_kegiatan1"] = $this->m_data->kegiatan($config['per_page'], $dataa['start']);

        $data["id_kegiatan"] = $this->m_data->get_kegiatan($id_kegiatan);
        $this->load->view('Halaman_web/Templates/kepala', $data);
        $this->load->view('Halaman_web/Tampil_kegiatan', $data);
        $this->load->view('Halaman_web/Templates/kaki');
    }

    public function print($id_penghuni)
    {
        $data['title'] = 'Cetak Penghuni';
        $data["id_penghuni"] = $this->m_data->id_penghuni($id_penghuni);
        $this->load->view('Halaman_web/print_penghuni', $data);
    }

    public function print_semua($id_profil)
    {
        $data['title'] = 'Cetak Penghuni';
        $data["print"] = $this->m_data->jenis_panti($id_profil);
        $data["print1"] = $this->m_data->print_semua($id_profil);
        $this->load->view('Halaman_web/print_semua', $data);
    }

    public function kirim_komentar()
    {
        $id_profil = $this->input->post('id_profil');
        $id_admin = $this->input->post('id_admin');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $isi_komentar = $this->input->post('isi_komentar');
        $data = array(
            'id_profil'  => $id_profil,
            'id_admin'  => $id_admin,
            'nama_user' => $nama,
            'email_user' => $email,
            'komen_status' => '0',
            'isi_komentar' => $isi_komentar

        );
        $this->db->insert('komentar_kirim', $data);
        redirect('dashboard/tampil_lokasi/' . $id_profil . '');
    }

    public function balas_komentar()
    {
        $id_profil = $this->input->post('id_profil');
        $id_admin = $this->input->post('id_admin');
        $id_komen = $this->input->post('id_komen');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $isi_komentar = $this->input->post('isi_komentar');
        $data = array(
            'id_profil'  => $id_profil,
            'id_admin'  => $id_admin,
            'nama_user' => $nama,
            'email_user' => $email,
            'komen_status' => $id_komen,
            'isi_komentar' => $isi_komentar

        );
        $this->db->insert('komentar_kirim', $data);
        redirect('dashboard/tampil_lokasi/' . $id_profil . '');
    }
}
