<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()

    {
        parent::__construct();
        $this->load->model('m_data');
        $this->load->library('form_validation');
    }
    public function index()
    {

        $user = $this->session->userdata('id_level');
        //usernya ada

        if ($user == 1) {
            $data['title'] = 'Dashboard Admin';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $dataa['jumlah_penghuni'] = $this->m_data->jumlah_penghuni_admin();
            $dataa['admin'] = $this->m_data->jumlah_admin();
            $dataa['panti'] = $this->m_data->jumlah_panti_admin();

            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);
            $this->load->view('Halaman_admin/Admin/Home', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $data['title'] = 'Dashboard Pengurus Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $dataa['jumlah_penghuni'] = $this->m_data->jumlah_penghuni($id_admin);
            $dataa['admin'] = $this->m_data->jumlah_admin();
            $dataa['panti'] = $this->m_data->jumlah_panti($id_admin);
            $dataa['profil'] = $this->m_data->tampil_profil();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti_marker();

            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

            $this->load->view('Halaman_admin/Pengurus/Home', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    //Awal CRUD Profil Panti
    public function profil_panti()
    {
      
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
            
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            
            $data['title'] = 'Halaman Panti Admin';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['provinsi'] = $this->m_data->provinsi();
            $data['jenis_panti'] = $this->m_data->jenis_panti_insert();


            $config['base_url'] = site_url('admin/profil_panti');
            $this->db->like('nama_panti', $data['keyword']);
            $this->db->from('profil_panti');
            $this->db->where('aktifasi_profil', '1');
            $config['total_rows'] = $this->db->count_all_results();
            // $config['total_rows'] = $this->m_data->menghitung_panti();
            $config['per_page'] = 10;

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



            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["data_profil"] = $this->m_data->panti();
            $data["profil"] = $this->m_data->tampil_profil_admin($id_admin);

            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_profil"] = $this->m_data->profil_panti_admin($config['per_page'], $data['start'],$data['keyword']);

            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);
            $this->load->view('Halaman_admin/Admin/Profil_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
         
            $data['title'] = 'Halaman Panti Pengurus';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['provinsi'] = $this->m_data->provinsi();
            $data['jenis_panti'] = $this->m_data->jenis_panti_insert();

        if($this->input->post('search')){
         $data['keyword'] = $this->input->post('keyword');
         $this->session->set_userdata('keyword', $data['keyword']);
        }else{
          $data['keyword'] = $this->session->userdata('keyword');
        }
            $id_admin = $this->session->userdata('id_admin');
            $config['base_url'] = site_url('admin/profil_panti');
            $this->db->like('nama_panti', $data['keyword']);
            $this->db->from('profil_panti');
            $this->db->where('id_admin', $id_admin);
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
            $keyword = $this->input->post('keyword');

            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->tampil_profil($id_admin);

            $data["penghuni"] = $this->m_data->tampil_penghuni_rows($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_profil"] = $this->m_data->tampil_profil_byid_page($id_admin, $config['per_page'], $data['start'], $data['keyword']);


            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
            $this->load->view('Halaman_admin/Pengurus/Profil_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    public function form_tambah_panti()
    {
        
        $user = $this->session->userdata('id_level');
        if ($user == 1) {

            $data['title'] = 'Halaman Panti Admin';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['provinsi'] = $this->m_data->provinsi();
            $data['jenis_panti'] = $this->m_data->jenis_panti_insert();
            $data['jenis_panti1'] = $this->m_data->jenis_panti_marker();

            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);


            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);
            $this->load->view('Halaman_admin/Admin/tambahprofilpanti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $dataa['title'] = 'Halaman Tambah Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();
            $dataa['jenis_panti1'] = $this->m_data->jenis_panti_marker();

            $id_admin = $this->session->userdata('id_admin');
            $dataa["id_admin"] = $this->m_data->id_admin($id_admin);



            $this->load->view('Halaman_admin/Templates/Header', $dataa);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

            $this->load->view('Halaman_admin/Pengurus/tambahprofilpanti', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }
    
        
    
    public function tambah_profil()
    {
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Document', 'required');
        }
     
        $this->form_validation->set_rules('nama_panti', 'Nama_panti', 'trim|required');
        $this->form_validation->set_rules('nomor_izin', 'nomor_izin', 'trim|required');
        $this->form_validation->set_rules('nomor_izin', 'nomor_izin', 'trim|required');
        $this->form_validation->set_rules('id_jenis_panti', 'id_jenis_panti', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'id_kecamatan', 'required');
        $this->form_validation->set_rules('id_desa', 'id_desa', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'longitude', 'trim|required');
        $this->form_validation->set_rules('telpon', 'telpon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
        $this->form_validation->set_message('required', '%s Pilih salah satu ');
        if ($this->form_validation->run() == false) {
           $data['title'] = 'Halaman Tambah Profil Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $data['provinsi'] = $this->m_data->provinsi();
            $data['jenis_panti'] = $this->m_data->jenis_panti_insert();
            $data['jenis_panti1'] = $this->m_data->jenis_panti_marker();

            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);


            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);
            $this->load->view('Halaman_admin/Admin/tambahprofilpanti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $dataa['title'] = 'Halaman Tambah Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();

            $id_admin = $this->session->userdata('id_admin');
            $dataa["id_admin"] = $this->m_data->id_admin($id_admin);

            $id_profil = uniqid();
            $nama_panti = $this->input->post('nama_panti');
            $nomor_izin = $this->input->post('nomor_izin');
            $alamat = $this->input->post('alamat');
            $id_admin = $this->input->post('id_admin');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $telpon = $this->input->post('telpon');
            $email = $this->input->post('email');
            $deskripsi = $this->input->post('deskripsi');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_desa = $this->input->post('id_desa');
            $id_jenis_panti = $this->input->post('id_jenis_panti');
            if (isset($_POST['simpan'])) {
                if ($_FILES['foto']['error'] <> 10) {
                    $config['upload_path'] = './application/upload/panti/profil/';
                    $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                    $this->load->library('upload', $config);
                    // $config['max_size']             = 1024; // 1MB
                    // $config['max_width']            = 320;
                    // $config['max_height']           = 370;
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('foto')) {
                        $error = $this->upload->display_errors();
                        // $this->index($error);
                        echo $error;
                        // echo "Upload Gagal";
                        $dataa['title'] = 'Halaman Tambah Profil Panti';
                        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
                        $this->session->userdata('email')])->row_array();

                        $dataa['provinsi'] = $this->m_data->provinsi();
                        $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();

                        $id_admin = $this->session->userdata('id_admin');
                        $dataa["id_admin"] = $this->m_data->id_admin($id_admin);


                        $this->load->view('Halaman_admin/Templates/Header', $dataa);
                        $this->load->view('Halaman_admin/admin/Sidebar', $dataa);

                        $this->load->view('Halaman_admin/admin/tambahprofilpanti', $dataa);
                        $this->load->view('Halaman_admin/Templates/Footer');
                    } else {
                        $hasil     = $this->upload->data();
                        $data = array(
                            'id_profil'  => $id_profil,
                            'id_kecamatan'  => $id_kecamatan,
                            'id_desa'       => $id_desa,
                            'id_admin'       => $id_admin,
                            'id_jenis_panti'       => $id_jenis_panti,
                            'nama_panti'       => $nama_panti,
                            'nomor_izin'       => $nomor_izin,
                            'alamat'       => $alamat,
                            'lat'       => $latitude,
                            'lng'       => $longitude,
                            'foto_p'       => $hasil['file_name'],
                            'telpon'       => $telpon,
                            'email'       => $email,
                            'deskripsi'  => $deskripsi
                        );
                        $this->db->insert('profil_panti', $data);
                        redirect('admin/profil_panti');
                    }
                } else {
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_kecamatan'  => $id_kecamatan,
                        'id_desa'       => $id_desa,
                        'id_admin'       => $id_admin,
                        'id_jenis_panti'       => $id_jenis_panti,
                        'nama_panti'       => $nama_panti,
                        'nomor_izin'       => $nomor_izin,
                        'alamat'       => $alamat,
                        'lat'       => $latitude,
                        'lng'       => $longitude,
                        'telpon'       => $telpon,
                        'email'       => $email,
                        'deskripsi'  => $deskripsi
                    );
                    $this->db->insert('profil_panti', $data);
                    redirect('admin/profil_panti');
                }
            }
            }
        } else {
            if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Foto', 'required');
        }
        $this->form_validation->set_rules('nama_panti', 'Nama panti', 'trim|required');
        $this->form_validation->set_rules('nomor_izin', 'Nomor izin', 'trim|required');
        $this->form_validation->set_rules('id_jenis_panti', 'Jenis Panti', 'required');
        $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('id_desa', 'Desa', 'required');
        $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
        $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
        $this->form_validation->set_rules('telpon', 'Telpon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
             $dataa['title'] = 'Halaman Tambah Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();

            $id_admin = $this->session->userdata('id_admin');
            $dataa["id_admin"] = $this->m_data->id_admin($id_admin);

            $this->load->view('Halaman_admin/Templates/Header', $dataa);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

            $this->load->view('Halaman_admin/Pengurus/tambahprofilpanti', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $dataa['title'] = 'Halaman Tambah Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();

            $id_admin = $this->session->userdata('id_admin');
            $dataa["id_admin"] = $this->m_data->id_admin($id_admin);

            $id_profil = uniqid();
            $nama_panti = $this->input->post('nama_panti');
            $nomor_izin = $this->input->post('nomor_izin');
            $alamat = $this->input->post('alamat');
            $id_admin = $this->input->post('id_admin');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $telpon = $this->input->post('telpon');
            $email = $this->input->post('email');
            $deskripsi = $this->input->post('deskripsi');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_desa = $this->input->post('id_desa');
            $id_jenis_panti = $this->input->post('id_jenis_panti');
            if (isset($_POST['simpan'])) {
                if ($_FILES['foto']['error'] <> 10) {
                    $config['upload_path'] = './application/upload/panti/profil/';
                    $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                    $this->load->library('upload', $config);
                    // $config['max_size']             = 1024; // 1MB
                    // $config['max_width']            = 320;
                    // $config['max_height']           = 370;
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('foto')) {
                        $error = $this->upload->display_errors();
                        // $this->index($error);
                        echo $error;
                        // echo "Upload Gagal";
                        $dataa['title'] = 'Halaman Tambah Profil Panti';
                        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
                        $this->session->userdata('email')])->row_array();

                        $dataa['provinsi'] = $this->m_data->provinsi();
                        $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();

                        $id_admin = $this->session->userdata('id_admin');
                        $dataa["id_admin"] = $this->m_data->id_admin($id_admin);


                        $this->load->view('Halaman_admin/Templates/Header', $dataa);
                        $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

                        $this->load->view('Halaman_admin/Pengurus/tambahprofilpanti', $dataa);
                        $this->load->view('Halaman_admin/Templates/Footer');
                    } else {
                        $hasil     = $this->upload->data();
                        $data = array(
                            'id_profil'  => $id_profil,
                            'id_kecamatan'  => $id_kecamatan,
                            'id_desa'       => $id_desa,
                            'id_admin'       => $id_admin,
                            'id_jenis_panti'       => $id_jenis_panti,
                            'nama_panti'       => $nama_panti,
                            'nomor_izin'       => $nomor_izin,
                            'alamat'       => $alamat,
                            'lat'       => $latitude,
                            'lng'       => $longitude,
                            'foto_p'       => $hasil['file_name'],
                            'telpon'       => $telpon,
                            'email'       => $email,
                            'deskripsi'  => $deskripsi
                        );
                        $this->db->insert('profil_panti', $data);
                        redirect('admin/profil_panti');
                    }
                } else {
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_kecamatan'  => $id_kecamatan,
                        'id_desa'       => $id_desa,
                        'id_admin'       => $id_admin,
                        'id_jenis_panti'       => $id_jenis_panti,
                        'nama_panti'       => $nama_panti,
                        'nomor_izin'       => $nomor_izin,
                        'alamat'       => $alamat,
                        'lat'       => $latitude,
                        'lng'       => $longitude,
                        'telpon'       => $telpon,
                        'email'       => $email,
                        'deskripsi'  => $deskripsi
                    );
                    $this->db->insert('profil_panti', $data);
                    redirect('admin/profil_panti');
                }
            }
        }
        }
    }
    public function formedit($id_profil)
    {
        $user = $this->session->userdata('id_level');
        if ($user == 1) {

            $dataa['title'] = 'Halaman Edit Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $dataa['pengurus'] = $this->m_data->getById($id_profil);
            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti($id_profil);
            $dataa['tampil_panti'] = $this->m_data->tampil_panti();
            $dataa['jenis_kecamatan'] = $this->m_data->jenis_kecamatan($id_profil);
            $dataa['tampil_kecamatan'] = $this->m_data->tampil_kecamatan($id_profil);
            $dataa['jenis_desa'] = $this->m_data->jenis_desa($id_profil);

            $this->load->view('Halaman_admin/Templates/Header', $dataa);
            $this->load->view('Halaman_admin/Admin/Sidebar', $dataa);

            $this->load->view('Halaman_admin/Admin/Edit_profilpanti', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $dataa['title'] = 'Halaman Edit Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $dataa['pengurus'] = $this->m_data->getById($id_profil);
            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti($id_profil);
            $dataa['tampil_panti'] = $this->m_data->tampil_panti();
            $dataa['jenis_kecamatan'] = $this->m_data->jenis_kecamatan($id_profil);
            $dataa['tampil_kecamatan'] = $this->m_data->tampil_kecamatan($id_profil);
            $dataa['jenis_desa'] = $this->m_data->jenis_desa($id_profil);

            $this->load->view('Halaman_admin/Templates/Header', $dataa);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

            $this->load->view('Halaman_admin/Pengurus/Edit_profilpanti', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }
    public function edit_profil_panti()
    {
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
            
            $id_profil = $this->input->post('id_profil');
            $this->form_validation->set_rules('nama_panti', 'Nama panti', 'trim|required');
            $this->form_validation->set_rules('nomor_izin', 'Nomor izin', 'trim|required');
            $this->form_validation->set_rules('id_jenis_panti', 'Jenis Panti', 'required');
            $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('id_desa', 'Desa', 'required');
            $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
            $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
            $this->form_validation->set_rules('telpon', 'Telpon', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
            if ($this->form_validation->run() == false) {
          
            $dataa['title'] = 'Halaman Edit Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $dataa['pengurus'] = $this->m_data->getById($id_profil);
            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti($id_profil);
            $dataa['tampil_panti'] = $this->m_data->tampil_panti();
            $dataa['jenis_kecamatan'] = $this->m_data->jenis_kecamatan($id_profil);
            $dataa['tampil_kecamatan'] = $this->m_data->tampil_kecamatan($id_profil);
            $dataa['jenis_desa'] = $this->m_data->jenis_desa($id_profil);

            $this->load->view('Halaman_admin/Templates/Header', $dataa);
            $this->load->view('Halaman_admin/Admin/Sidebar', $dataa);
            
            $this->load->view('Halaman_admin/Admin/Edit_profilpanti', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
            } else {
            $id_profil = $this->input->post('id_profil');
            $nama_panti = $this->input->post('nama_panti');
            $nomor_izin = $this->input->post('nomor_izin');
            $alamat = $this->input->post('alamat');
            $id_admin = $this->input->post('id_admin');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $telpon = $this->input->post('telpon');
            $email = $this->input->post('email');
            $deskripsi = $this->input->post('deskripsi');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_desa = $this->input->post('id_desa');
            $id_jenis_panti = $this->input->post('id_jenis_panti');
            if (isset($_POST['simpan'])) {
                if ($_FILES['foto']['error'] <> 4) {

                    $config['upload_path'] = './application/upload/panti/profil/';
                    $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                    $this->load->library('upload', $config);
                    // $config['max_size']             = 1024; // 1MB
                    // $config['max_width']            = 320;
                    // $config['max_height']           = 370;
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto')) {
                        $error = $this->upload->display_errors();
                        // $this->index($error);
                        echo $error;
                        // echo "Upload Gagal";
                        $dataa['title'] = 'Halaman Edit Profil Panti';
                        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
                        $this->session->userdata('email')])->row_array();
                        $dataa['pengurus'] = $this->m_data->getById($id_profil);
                        $dataa['provinsi'] = $this->m_data->provinsi();
                        $dataa['jenis_panti'] = $this->m_data->jenis_panti($id_profil);
                        $dataa['tampil_panti'] = $this->m_data->tampil_panti();
                        $dataa['jenis_kecamatan'] = $this->m_data->jenis_kecamatan($id_profil);
                        $dataa['tampil_kecamatan'] = $this->m_data->tampil_kecamatan($id_profil);
                        $dataa['jenis_desa'] = $this->m_data->jenis_desa($id_profil);

                        $this->load->view('Halaman_admin/Templates/Header', $dataa);
                        $this->load->view('Halaman_admin/Admin/Sidebar', $dataa);
            
                        $this->load->view('Halaman_admin/Admin/Edit_profilpanti', $dataa);
                        $this->load->view('Halaman_admin/Templates/Footer');
                    } else {
                        $hasil     = $this->upload->data();
                        $data = array(
                            'id_profil'  => $id_profil,
                            'id_kecamatan'  => $id_kecamatan,
                            'id_desa'       => $id_desa,
                            'id_admin'       => $id_admin,
                            'id_jenis_panti'       => $id_jenis_panti,
                            'nama_panti'       => $nama_panti,
                            'nomor_izin'       => $nomor_izin,
                            'alamat'       => $alamat,
                            'lat'       => $latitude,
                            'lng'       => $longitude,
                            'foto_p'       => $hasil['file_name'],
                            'telpon'       => $telpon,
                            'email'       => $email,
                            'deskripsi'  => $deskripsi
                        );
                        $id_profil = $this->input->post('id_profil');
                        $query = $this->db->get_where('profil_panti', array('id_profil' => $id_profil))->row_array();
                        unlink("./application/upload/panti" . $query['foto']);
                        $this->db->where('id_profil', $id_profil);
                        $this->db->update('profil_panti', $data);
                        redirect('admin/profil_panti');
                    }
                } else {
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_kecamatan'  => $id_kecamatan,
                        'id_desa'       => $id_desa,
                        'id_admin'       => $id_admin,
                        'id_jenis_panti'       => $id_jenis_panti,
                        'nama_panti'       => $nama_panti,
                        'nomor_izin'       => $nomor_izin,
                        'alamat'       => $alamat,
                        'lat'       => $latitude,
                        'lng'       => $longitude,
                        'telpon'       => $telpon,
                        'email'       => $email,
                        'deskripsi'  => $deskripsi
                    );
                    $id        = $this->input->post('id_profil');
                    $this->db->where('id_profil', $id);
                    $this->db->update('profil_panti', $data);
                    redirect('admin/profil_panti');
                }
            }
            }
        } else {
            $id_profil = $this->input->post('id_profil');
            $this->form_validation->set_rules('nama_panti', 'Nama panti', 'trim|required');
            $this->form_validation->set_rules('nomor_izin', 'Nomor izin', 'trim|required');
            $this->form_validation->set_rules('id_jenis_panti', 'Jenis Panti', 'required');
            $this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('id_desa', 'Desa', 'required');
            $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
            $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
            $this->form_validation->set_rules('telpon', 'Telpon', 'trim|required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
            if ($this->form_validation->run() == false) {
          
            $dataa['title'] = 'Halaman Edit Profil Panti';
            $dataa['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $dataa['pengurus'] = $this->m_data->getById($id_profil);
            $dataa['provinsi'] = $this->m_data->provinsi();
            $dataa['jenis_panti'] = $this->m_data->jenis_panti($id_profil);
            $dataa['tampil_panti'] = $this->m_data->tampil_panti();
            $dataa['jenis_kecamatan'] = $this->m_data->jenis_kecamatan($id_profil);
            $dataa['tampil_kecamatan'] = $this->m_data->tampil_kecamatan($id_profil);
            $dataa['jenis_desa'] = $this->m_data->jenis_desa($id_profil);
    
            $this->load->view('Halaman_admin/Templates/Header', $dataa);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);
                
            $this->load->view('Halaman_admin/Pengurus/Edit_profilpanti', $dataa);
            $this->load->view('Halaman_admin/Templates/Footer');
            } else {
            $id_profil = $this->input->post('id_profil');
            $nama_panti = $this->input->post('nama_panti');
            $nomor_izin = $this->input->post('nomor_izin');
            $alamat = $this->input->post('alamat');
            $id_admin = $this->input->post('id_admin');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $telpon = $this->input->post('telpon');
            $email = $this->input->post('email');
            $deskripsi = $this->input->post('deskripsi');
            $id_kecamatan = $this->input->post('id_kecamatan');
            $id_desa = $this->input->post('id_desa');
            $id_jenis_panti = $this->input->post('id_jenis_panti');
            if (isset($_POST['simpan'])) {
                if ($_FILES['foto']['error'] <> 4) {

                    $config['upload_path'] = './application/upload/panti/profil/';
                    $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                    $this->load->library('upload', $config);
                    // $config['max_size']             = 1024; // 1MB
                    // $config['max_width']            = 320;
                    // $config['max_height']           = 370;
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('foto')) {
                        $error = $this->upload->display_errors();
                        // $this->index($error);
                        echo $error;
                        // echo "Upload Gagal";
                        $dataa['title'] = 'Halaman Edit Profil Panti';
                        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
                        $this->session->userdata('email')])->row_array();

                        $dataa['provinsi'] = $this->m_data->provinsi();
                        $dataa['jenis_panti'] = $this->m_data->jenis_panti_insert();

                        $id_admin = $this->session->userdata('id_admin');
                        $dataa["id_admin"] = $this->m_data->id_admin($id_admin);


                        $this->load->view('Halaman_admin/Templates/Header', $dataa);
                        $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

                        $this->load->view('Halaman_admin/Pengurus/Edit_profilpanti', $dataa);
                        $this->load->view('Halaman_admin/Templates/Footer');
                    } else {
                        $hasil     = $this->upload->data();
                        $data = array(
                            'id_profil'  => $id_profil,
                            'id_kecamatan'  => $id_kecamatan,
                            'id_desa'       => $id_desa,
                            'id_admin'       => $id_admin,
                            'id_jenis_panti'       => $id_jenis_panti,
                            'nama_panti'       => $nama_panti,
                            'nomor_izin'       => $nomor_izin,
                            'alamat'       => $alamat,
                            'lat'       => $latitude,
                            'lng'       => $longitude,
                            'foto_p'       => $hasil['file_name'],
                            'telpon'       => $telpon,
                            'email'       => $email,
                            'deskripsi'  => $deskripsi
                        );
                        $query = $this->db->get_where('profil_panti', array('id_profil' => $id_profil))->row_array();
                        unlink("./application/upload/panti" . $query['foto']);
                        $this->db->where('id_profil', $id_profil);
                        $this->db->update('profil_panti', $data);
                        redirect('admin/profil_panti');
                    }
                } else {
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_kecamatan'  => $id_kecamatan,
                        'id_desa'       => $id_desa,
                        'id_admin'       => $id_admin,
                        'id_jenis_panti'       => $id_jenis_panti,
                        'nama_panti'       => $nama_panti,
                        'nomor_izin'       => $nomor_izin,
                        'alamat'       => $alamat,
                        'lat'       => $latitude,
                        'lng'       => $longitude,
                        'telpon'       => $telpon,
                        'email'       => $email,
                        'deskripsi'  => $deskripsi
                    );
                    $id_profil        = $this->input->post('id_profil');
                    $this->db->where('id_profil', $id_profil);
                    $this->db->update('profil_panti', $data);
                    redirect('admin/profil_panti');
                }
            }
        }
    }
    }

    function ambil_data()
    {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if ($modul == "id_desa") {
            echo $this->m_data->kabupaten($id);
        }
    }

    function tampil_desa()
    {
        $data['provinsi'] = $this->m_data->provinsi();

        $this->load->view('Halaman_admin/Pengurus/tambahprofilpanti', $data);
    }
    //Akhir CRUD Profil Panti


    public function edit_profil_admin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');



        if ($this->form_validation->run() == false) {

            $user = $this->session->userdata('id_level');

            if ($user == 1) {
                $data['title'] = 'Edit Profil Admin';
                $data['admin'] = $this->db->get_where('admin', ['email' =>
                $this->session->userdata('email')])->row_array();

                $this->load->view('Halaman_admin/Templates/Header', $data);
                $this->load->view('Halaman_admin/Admin/Sidebar', $data);

                $this->load->view('Halaman_admin/Admin/Edit_Profil_Admin', $data);
                $this->load->view('Halaman_admin/Templates/Footer');
            } else {
                $data['title'] = 'Edit Profil Pengurus Panti';
                $data['admin'] = $this->db->get_where('admin', ['email' =>
                $this->session->userdata('email')])->row_array();


                $this->load->view('Halaman_admin/Templates/Header', $data);
                $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

                $this->load->view('Halaman_admin/Pengurus/Edit_Profil_Pengurus', $data);
                $this->load->view('Halaman_admin/Templates/Footer');
            }
        } else {
            $user = $this->session->userdata('id_level');
            if ($user == 1) {
                $nama = $this->input->post('name');
                $email = $this->input->post('email');
                $nik = $this->input->post('no_identitas');
                $alamat = $this->input->post('alamat');
                $id_admin = $this->input->post('id_admin');

                if (isset($_POST['update'])) {
                    if ($_FILES['foto']['error'] <> 4) {

                        $config['upload_path'] = './application/upload/admin';
                        $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);


                        if (!$this->upload->do_upload('foto')) {
                            $error = array('error' => $this->upload->display_errors());
                            // $this->profil($error);
                            echo $error;

                            $user = $this->session->userdata('id_level');

                            if ($user == 1) {
                                $data['title'] = 'Edit Profil Admin';
                                $data['admin'] = $this->db->get_where('admin', ['email' =>
                                $this->session->userdata('email')])->row_array();

                                $this->load->view('Halaman_admin/Templates/Header', $data);
                                $this->load->view('Halaman_admin/Admin/Sidebar', $data);

                                $this->load->view('Halaman_admin/Admin/Edit_Profil_Admin', $data);
                                $this->load->view('Halaman_admin/Templates/Footer');
                            } else {
                                $data['title'] = 'Edit Profil Pengurus Panti';
                                $data['admin'] = $this->db->get_where('admin', ['email' =>
                                $this->session->userdata('email')])->row_array();


                                $this->load->view('Halaman_admin/Templates/Header', $data);
                                $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

                                $this->load->view('Halaman_admin/Pengurus/Edit_Profil_Pengurus', $data);
                                $this->load->view('Halaman_admin/Templates/Footer');
                            }
                        } else {
                            $hasil = $this->upload->data();
                            $data = array(

                                'name'  => $nama,
                                'id_admin'  => $id_admin,
                                'no_identitas'       => $nik,
                                'email'       => $email,
                                'alamat_admin'       => $alamat,
                                'foto'       => $hasil['file_name'],

                            );

                            $id        = $this->input->post('id_admin');
                            $query     = $this->db->get_where('admin', array('id_admin' => $id))->row_array();
                            unlink("./application/upload/admin" . $query['foto']);

                            $this->db->where('id_admin', $id);
                            $this->db->update('admin', $data);

                            echo '<script language="javascript">';
                            echo 'alert("Data Berhasil Di Ubah")';
                            echo '</script>';

                            redirect('admin');
                        }
                    } else {
                        $data = array(

                            'name'  => $nama,
                            'id_admin'  => $id_admin,
                            'no_identitas'       => $nik,
                            'email'       => $email,
                            'alamat_admin'       => $alamat,

                        );
                        $id        = $this->input->post('id_admin');
                        $this->db->where('id_admin', $id);
                        $this->db->update('admin', $data);

                        echo '<script language="javascript">';
                        echo 'alert("Data Berhasil Di Ubah")';
                        echo '</script>';
                        redirect('admin');
                    }
                }
            } else {
                $nama = $this->input->post('name');
                $email = $this->input->post('email');
                $nik = $this->input->post('no_identitas');
                $alamat = $this->input->post('alamat');
                $id_admin = $this->input->post('id_admin');

                if (isset($_POST['update'])) {
                    if ($_FILES['foto']['error'] <> 4) {

                        $config['upload_path'] = './application/upload/admin';
                        $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);


                        if (!$this->upload->do_upload('foto')) {
                            $error = array('error' => $this->upload->display_errors());
                            // $this->profil($error);
                            echo $error;

                            $user = $this->session->userdata('id_level');

                            if ($user == 1) {
                                $data['title'] = 'Edit Profil Admin';
                                $data['admin'] = $this->db->get_where('admin', ['email' =>
                                $this->session->userdata('email')])->row_array();

                                $this->load->view('Halaman_admin/Templates/Header', $data);
                                $this->load->view('Halaman_admin/Admin/Sidebar', $data);

                                $this->load->view('Halaman_admin/Admin/Edit_Profil_Admin', $data);
                                $this->load->view('Halaman_admin/Templates/Footer');
                            } else {
                                $data['title'] = 'Edit Profil Pengurus Panti';
                                $data['admin'] = $this->db->get_where('admin', ['email' =>
                                $this->session->userdata('email')])->row_array();


                                $this->load->view('Halaman_admin/Templates/Header', $data);
                                $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

                                $this->load->view('Halaman_admin/Pengurus/Edit_Profil_Pengurus', $data);
                                $this->load->view('Halaman_admin/Templates/Footer');
                            }
                        } else {
                            $hasil = $this->upload->data();
                            $data = array(

                                'name'  => $nama,
                                'alamat_admin'  => $id_admin,
                                'no_identitas'       => $nik,
                                'email'       => $email,
                                'alamat_admin'       => $alamat,
                                'foto'       => $hasil['file_name'],

                            );

                            $id        = $this->input->post('id_admin');
                            $query     = $this->db->get_where('admin', array('id_admin' => $id))->row_array();
                            unlink("./application/upload/admin" . $query['foto']);

                            $this->db->where('id_admin', $id);
                            $this->db->update('admin', $data);

                            echo '<script language="javascript">';
                            echo 'alert("Data Berhasil Di Ubah")';
                            echo '</script>';

                            redirect('admin');
                        }
                    } else {
                        $data = array(

                            'name'  => $nama,
                            'alamat_admin'  => $id_admin,
                            'no_identitas'       => $nik,
                            'email'       => $email,
                            'alamat_admin'       => $alamat,

                        );
                        $id        = $this->input->post('id_admin');
                        $this->db->where('id_admin', $id);
                        $this->db->update('admin', $data);

                        echo '<script language="javascript">';
                        echo 'alert("Data Berhasil Di Ubah")';
                        echo '</script>';
                        redirect('admin');
                    }
                }
            }
        }











        // $this->db->set('name', $nama);
        // $this->db->where('id_admin', $id_admin);
        // $this->db->update('admin');

        // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //         Profile Kamu Sudah Terupdate!
        //         </div>');
        // $user = $this->db->get_where('admin', ['email' => $email])->row_array();
        // //usernya ada
        // if ($user) {
        //     if ($user['id_level'] == 1) {
        //         redirect('admin');
        //     } else {
        //         redirect('admin');
        //     }
        // }

    }

    function hapus_panti($id_profil)
    {
        $this->m_data->hapuspanti($id_profil);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('admin/profil_panti');
    }
    
      function hapus_panti_verifikasi($id_profil)
    {
        $this->m_data->hapuspanti($id_profil);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('admin/verifikasi_profil');
    }



    //Awal Crud Penghuni Panti
    public function penghuni()
    {
        
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
            $id_admin = $this->session->userdata('id_admin');
            
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            
            $data['title'] = 'Halaman Penghuni Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $config['base_url'] = site_url('admin/penghuni');
            
            $this->db->like('nama_penghuni', $data['keyword']);
            $this->db->from('penghuni_panti');
            $this->db->where('aktifasi_penghuni', '1');
            $config['total_rows'] = $this->db->count_all_results();
            
            
            // $config['total_rows'] = $this->m_data->menghitung_penghuni();
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
            $keyword = $this->input->post('keyword');



            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->penghuni_innerjoin($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data["id"] = $this->m_data->tampil_profil_byid($id_admin);
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_penghuni"] = $this->m_data->tampil_penghuni_admin_aktif($config['per_page'], $data['start'], $data['keyword']);
            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);
            $this->load->view('Halaman_admin/Admin/Data_orang_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            
            
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Penghuni Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $config['base_url'] = site_url('admin/penghuni');
            $this->db->like('nama_penghuni', $data['keyword']);
            $this->db->from('penghuni_panti');
            $this->db->where('id_admin', $id_admin);
            $config['total_rows'] = $this->db->count_all_results();
            // $config['total_rows'] = $this->m_data->menghitung_penghuni();
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
            $keyword = $this->input->post('keyword');

            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->penghuni_innerjoin($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data["id"] = $this->m_data->tampil_profil_byid($id_admin);
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_penghuni"] = $this->m_data->tampil_penghuni_page($id_admin, $config['per_page'], $data['start'],  $data['keyword']);
            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
            $this->load->view('Halaman_admin/Pengurus/Data_orang_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    public function formpenghuni()
    {
        $dataa['title'] = 'Halaman Tambah Penghuni Panti';
        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_admin = $this->session->userdata('id_admin');
        $dataa["id_admin"] = $this->m_data->id_admin($id_admin);
        $dataa["jenis_k"] = $this->m_data->jenis_kelamin();
        $dataa["penghuni"] = $this->m_data->tampil_profil_byid($id_admin);


        $this->load->view('Halaman_admin/Templates/Header', $dataa);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

        $this->load->view('Halaman_admin/Pengurus/tambahpenghunipanti', $dataa);
        $this->load->view('Halaman_admin/Templates/Footer');
    }

    public function tambahpenghuni()
    {
         if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Document', 'required');
        }
        $this->form_validation->set_rules('nama', 'Nama Penghuni', 'trim|required');
        $this->form_validation->set_rules('id_profil', 'Nama Panti', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
              $dataa['title'] = 'Halaman Tambah Penghuni Panti';
        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_admin = $this->session->userdata('id_admin');
        $dataa["id_admin"] = $this->m_data->id_admin($id_admin);
        $dataa["jenis_k"] = $this->m_data->jenis_kelamin();
        $dataa["penghuni"] = $this->m_data->tampil_profil_byid($id_admin);


        $this->load->view('Halaman_admin/Templates/Header', $dataa);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);

        $this->load->view('Halaman_admin/Pengurus/tambahpenghunipanti', $dataa);
        $this->load->view('Halaman_admin/Templates/Footer');
        } else {
        $nama = $this->input->post('nama');
        $id_profil = $this->input->post('id_profil');
        $deskripsi = $this->input->post('deskripsi');
        $id_admin = $this->input->post('id_admin');
        $jenis_kelamin = $this->input->post('kelamin');
        $umur = $this->input->post('umur');
        if (isset($_POST['simpan'])) {
            if ($_FILES['foto']['error'] <> 10) {
                $config['upload_path'] = './application/upload/penghuni';
                $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                $this->load->library('upload', $config);
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 320;
                // $config['max_height']           = 370;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    // $this->index($error);
                    echo $error;
                    // echo "Upload Gagal";
                       $dataa['title'] = 'Halaman Tambah Penghuni Panti';
                        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
                        $this->session->userdata('email')])->row_array();
                        $id_admin = $this->session->userdata('id_admin');
                        $dataa["id_admin"] = $this->m_data->id_admin($id_admin);
                        $dataa["jenis_k"] = $this->m_data->jenis_kelamin();
                        $dataa["penghuni"] = $this->m_data->tampil_profil_byid($id_admin);
                
                
                        $this->load->view('Halaman_admin/Templates/Header', $dataa);
                        $this->load->view('Halaman_admin/Pengurus/Sidebar', $dataa);
                
                        $this->load->view('Halaman_admin/Pengurus/tambahpenghunipanti', $dataa);
                        $this->load->view('Halaman_admin/Templates/Footer');
                } else {
                    $hasil     = $this->upload->data();
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_admin'  => $id_admin,
                        'nama_penghuni'       => $nama,
                        'id_jk'       => $jenis_kelamin,
                        'umur'       => $umur,
                        'foto_penghuni'       => $hasil['file_name'],
                        'deskripsi_p'  => $deskripsi
                    );
                    $this->db->insert('penghuni_panti', $data);
                    redirect('Admin/penghuni');
                }
            } else {
                $data = array(
                    'id_profil'  => $id_profil,
                    'id_admin'  => $id_admin,
                    'nama_penghuni'       => $nama,
                    'id_jk'       => $jenis_kelamin,
                    'umur'       => $umur,
                    'deskripsi_p'  => $deskripsi
                );
                $this->db->insert('penghuni_panti', $data);
                redirect('Admin/penghuni');
            }
        }
    }
    }
    public function formedit_penghuni($id_penghuni)
    {
    $user = $this->session->userdata('id_level');
        if ($user == 1) {
            $data['title'] = 'Halaman Edit Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $id_profil = $this->input->post('id_profil');
            $data["tampil"] = $this->m_data->tampil_galeri_admin($id_galeri);


            $data["id_galeri"] = $this->m_data->get_id_galeri($id_galeri);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["nama_galeri"] = $this->m_data->nama_panti_galeri($id_galeri);




            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);

            $this->load->view('Halaman_admin/Admin/Edit_galeri_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {

        $data['title'] = 'Halaman Tambah Penghuni Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_admin = $this->session->userdata('id_admin');
        $data["jenis_k"] = $this->m_data->jenis_kelamin();
        $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);


        $data["id_penghuni"] = $this->m_data->get_id_penghuni($id_penghuni);
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["data_penghuni"] = $this->m_data->tampil_penghuni($id_admin);
        $data["nama_panti"] = $this->m_data->nama_panti($id_penghuni);
        $data["jenis_k1"] = $this->m_data->jenis_k($id_penghuni);




        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

        $this->load->view('Halaman_admin/Pengurus/Edit_penghuni_panti', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }
    }

    public function edit_penghuni()
    {
         $this->form_validation->set_rules('nama', 'Nama Penghuni', 'trim|required');
        $this->form_validation->set_rules('id_profil', 'Nama Panti', 'required');
        $this->form_validation->set_rules('kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
       
        $data['title'] = 'Halaman Edit Penghuni Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_admin = $this->session->userdata('id_admin');
        $data["jenis_k"] = $this->m_data->jenis_kelamin();
        $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);
        $id_penghuni = $this->input->post('id_penghuni');

        $data["id_penghuni"] = $this->m_data->get_id_penghuni($id_penghuni);
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["data_penghuni"] = $this->m_data->tampil_penghuni($id_admin);
        $data["nama_panti"] = $this->m_data->nama_panti($id_penghuni);
        $data["jenis_k1"] = $this->m_data->jenis_k($id_penghuni);




        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

        $this->load->view('Halaman_admin/Pengurus/Edit_penghuni_panti', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
        } else {
        $nama = $this->input->post('nama');
        $id_penghuni = $this->input->post('id_penghuni');
        $id_profil = $this->input->post('id_profil');
        $deskripsi = $this->input->post('deskripsi');
        $id_admin = $this->input->post('id_admin');
        $jenis_kelamin = $this->input->post('kelamin');
        $umur = $this->input->post('umur');
        if (isset($_POST['simpan'])) {
            if ($_FILES['foto']['error'] <> 4) {

                $config['upload_path'] = './application/upload/penghuni';
                $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                $this->load->library('upload', $config);
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 320;
                // $config['max_height']           = 370;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    // $this->index($error);
                    echo $error;
                    // echo "Upload Gagal";
                     
                $data['title'] = 'Halaman Edit Penghuni Panti';
                $data['admin'] = $this->db->get_where('admin', ['email' =>
                $this->session->userdata('email')])->row_array();
                $id_admin = $this->session->userdata('id_admin');
                $data["jenis_k"] = $this->m_data->jenis_kelamin();
                $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);
                $id_penghuni = $this->input->post('id_penghuni');
        
                $data["id_penghuni"] = $this->m_data->get_id_penghuni($id_penghuni);
                $data["id_admin"] = $this->m_data->id_admin($id_admin);
                $data["data_penghuni"] = $this->m_data->tampil_penghuni($id_admin);
                $data["nama_panti"] = $this->m_data->nama_panti($id_penghuni);
                $data["jenis_k1"] = $this->m_data->jenis_k($id_penghuni);
        
        
        
        
                $this->load->view('Halaman_admin/Templates/Header', $data);
                $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
        
                $this->load->view('Halaman_admin/Pengurus/Edit_penghuni_panti', $data);
                $this->load->view('Halaman_admin/Templates/Footer');
                } else {
                    $hasil     = $this->upload->data();
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_admin'  => $id_admin,
                        'nama_penghuni'       => $nama,
                        'id_jk'       => $jenis_kelamin,
                        'umur'       => $umur,
                        'foto_penghuni'       => $hasil['file_name'],
                        'deskripsi_p'  => $deskripsi,
                    );
                    $id_penghuni = $this->input->post('id_penghuni');
                    $query = $this->db->get_where('penghuni_panti', array('id_penghuni' => $id_penghuni))->row_array();
                    unlink("./application/upload/penghuni" . $query['foto']);
                    $this->db->where('id_penghuni', $id_penghuni);
                    $this->db->update('penghuni_panti', $data);
                    redirect('admin/penghuni');
                }
            } else {
                $data = array(
                    'id_profil'  => $id_profil,
                    'id_admin'  => $id_admin,
                    'nama_penghuni'       => $nama,
                    'id_jk'       => $jenis_kelamin,
                    'umur'       => $umur,
                    'deskripsi_p'  => $deskripsi
                );
                $id_penghuni = $this->input->post('id_penghuni');
                $this->db->where('id_penghuni', $id_penghuni);
                $this->db->update('penghuni_panti', $data);
                redirect('admin/penghuni');
            }
        }
    }
    }
    function hapus_penghuni($id_penghuni)
    {
        $this->m_data->hapuspenghuni($id_penghuni);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('admin/penghuni');
    }
    
     function hapus_penghuni_verifikasi($id_penghuni)
    {
        $this->m_data->hapuspenghuni($id_penghuni);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('admin/verifikasi_penghuni');
    }
    //Akhir Crud Penghuni Panti



    //awal galeri
    public function galeri()
    {
     
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();



            $config['base_url'] = site_url('admin/galeri');
            
            $this->db->like('nama_galeri', $data['keyword']);
            $this->db->from('galeri_panti');
            $this->db->where('aktifasi_galeri', '1');
            $config['total_rows'] = $this->db->count_all_results();
            
            // $config['total_rows'] = $this->m_data->menghitung_galeri();
            $config['per_page'] = 10;

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

            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->galeri_innerjoin();
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_galeri"] = $this->m_data->galeri_semua($config['per_page'], $data['start'],$data['keyword']);



            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);

            $this->load->view('Halaman_admin/Admin/galeri_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            
            
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();



            $config['base_url'] = site_url('admin/galeri');
            
            $this->db->like('nama_galeri', $data['keyword']);
            $this->db->from('galeri_panti');
            $this->db->where('id_admin', $id_admin);
            $config['total_rows'] = $this->db->count_all_results();
            
            // $config['total_rows'] = $this->m_data->menghitung_galeri();
            $config['per_page'] = 10;

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
            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->galeri_innerjoin($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_galeri"] = $this->m_data->tampil_galeri_page($id_admin, $config['per_page'], $data['start'], $data['keyword']);



            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

            $this->load->view('Halaman_admin/Pengurus/galeri_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    public function formgaleri()
    {
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["penghuni"] = $this->m_data->tampil_profil();

            $id_profil = $this->input->post('id_profil');
            $data["tg"] = $this->m_data->id_admin_tg($id_profil);
            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);
            $this->load->view('Halaman_admin/Admin/tambah_galeri', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["penghuni"] = $this->m_data->tampil_profil_byid($id_admin);
            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
            $this->load->view('Halaman_admin/Pengurus/tambah_galeri', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    public function tambah_galeri()
    {
        $this->form_validation->set_rules('nama_galeri', 'Nama Galeri', 'trim|required');
        $this->form_validation->set_rules('id_profil', 'Nama Panti', 'required');
         if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Document', 'required');
        }
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Tambah Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["penghuni"] = $this->m_data->tampil_profil_byid($id_admin);
            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
            $this->load->view('Halaman_admin/Pengurus/tambah_galeri', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
        $nama = $this->input->post('nama_galeri');
        $id_profil = $this->input->post('id_profil');
        $deskripsi = $this->input->post('keterangan');
        $id_admin = $this->input->post('id_admin');
        if (isset($_POST['simpan'])) {
            if ($_FILES['foto']['error'] <> 10) {

                $config['upload_path'] = './application/upload/panti';
                $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                $this->load->library('upload', $config);
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 320;
                // $config['max_height']           = 370;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    // $this->index($error);
                    echo $error;
                    // echo "Upload Gagal";
                    $id_admin = $this->session->userdata('id_admin');
                    $data['title'] = 'Halaman Tambah Galeri Panti';
                    $data['admin'] = $this->db->get_where('admin', ['email' =>
                    $this->session->userdata('email')])->row_array();
                    $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
                    $data["id_admin"] = $this->m_data->id_admin($id_admin);
                    $data["penghuni"] = $this->m_data->tampil_profil_byid($id_admin);
                    $this->load->view('Halaman_admin/Templates/Header', $data);
                    $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
                    $this->load->view('Halaman_admin/Pengurus/tambah_galeri', $data);
                    $this->load->view('Halaman_admin/Templates/Footer');
                } else {
                    $hasil     = $this->upload->data();
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_admin'  => $id_admin,
                        'nama_galeri'       => $nama,
                        'foto_galeri'       => $hasil['file_name'],
                        'keterangan'  => $deskripsi
                    );
                    $this->db->insert('galeri_panti', $data);
                    redirect('admin/galeri');
                }
            } else {
                $data = array(
                    'id_profil'  => $id_profil,
                    'id_admin'  => $id_admin,
                    'nama_galeri'       => $nama,
                    'keterangan'  => $deskripsi
                );
                $this->db->insert('galeri_panti', $data);
                redirect('admin/galeri');
            }
        }
    }
    }

    public function formedit_galeri($id_galeri)
    {
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
            $data['title'] = 'Halaman Edit Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $id_profil = $this->input->post('id_profil');
            $data["tampil"] = $this->m_data->tampil_galeri_admin($id_galeri);


            $data["id_galeri"] = $this->m_data->get_id_galeri($id_galeri);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["nama_galeri"] = $this->m_data->nama_panti_galeri($id_galeri);




            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);

            $this->load->view('Halaman_admin/Admin/Edit_galeri_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $data['title'] = 'Halaman Edit Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);


            $data["id_galeri"] = $this->m_data->get_id_galeri($id_galeri);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["nama_galeri"] = $this->m_data->nama_panti_galeri($id_galeri);




            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

            $this->load->view('Halaman_admin/Pengurus/Edit_galeri_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    public function edit_galeri()
    {
        $this->form_validation->set_rules('nama_galeri', 'Nama Galeri', 'trim|required');
        $this->form_validation->set_rules('id_profil', 'Nama Panti', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Galeri Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);
            $id_galeri = $this->input->post('id_galeri');

            $data["id_galeri"] = $this->m_data->get_id_galeri($id_galeri);
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
            $data["nama_galeri"] = $this->m_data->nama_panti_galeri($id_galeri);
            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

            $this->load->view('Halaman_admin/Pengurus/Edit_galeri_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
        $nama = $this->input->post('nama_galeri');
        $id_profil = $this->input->post('id_profil');
        $deskripsi = $this->input->post('keterangan');
        $id_admin = $this->input->post('id_admin');
        if (isset($_POST['simpan'])) {
            if ($_FILES['foto']['error'] <> 4) {

                $config['upload_path'] = './application/upload/panti';
                $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                $this->load->library('upload', $config);
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 320;
                // $config['max_height']           = 370;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    // $this->index($error);
                    echo $error;
                    // echo "Upload Gagal";
                    $data['title'] = 'Halaman Edit Galeri Panti';
                    $data['admin'] = $this->db->get_where('admin', ['email' =>
                    $this->session->userdata('email')])->row_array();
                    $id_admin = $this->session->userdata('id_admin');
                    $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);
        
                    $id_galeri = $this->input->post('id_galeri');
                    $data["id_galeri"] = $this->m_data->get_id_galeri($id_galeri);
                    $data["id_admin"] = $this->m_data->id_admin($id_admin);
                    $data["data_galeri"] = $this->m_data->tampil_galeri($id_admin);
                    $data["nama_galeri"] = $this->m_data->nama_panti_galeri($id_galeri);
                    $this->load->view('Halaman_admin/Templates/Header', $data);
                    $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
        
                    $this->load->view('Halaman_admin/Pengurus/Edit_galeri_panti', $data);
                    $this->load->view('Halaman_admin/Templates/Footer');
                } else {
                    $hasil     = $this->upload->data();
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_admin'  => $id_admin,
                        'nama_galeri'       => $nama,
                        'foto_galeri'       => $hasil['file_name'],
                        'keterangan'  => $deskripsi,
                    );
                    $id_galeri = $this->input->post('id_galeri');
                    $query = $this->db->get_where('galeri_panti', array('id_galeri' => $id_galeri))->row_array();
                    unlink("./application/upload/panti" . $query['foto']);
                    $this->db->where('id_galeri', $id_galeri);
                    $this->db->update('galeri_panti', $data);
                    redirect('Admin/galeri');
                }
            } else {
                $data = array(
                    'id_profil'  => $id_profil,
                    'id_admin'  => $id_admin,
                    'nama_galeri'       => $nama,
                    'keterangan'  => $deskripsi
                );
                $id_galeri = $this->input->post('id_galeri');
                $this->db->where('id_galeri', $id_galeri);
                $this->db->update('galeri_panti', $data);
                redirect('Admin/galeri');
            }
        }
    }
    }
    function hapus_galeri($id_galeri)
    {
        $this->m_data->hapusgaleri($id_galeri);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('admin/galeri');
    }
    
     function hapus_galeri_verifikasi($id_galeri)
    {
        $this->m_data->hapusgaleri($id_galeri);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('Admin/verifikasi_galeri');
    }
    //akhir galeri

    //awal kegiatan

    public function kegiatan()
    {
      
        $user = $this->session->userdata('id_level');
        if ($user == 1) {
            
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Kegiatan Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();


            $config['base_url'] = site_url('admin/kegiatan');
            
                 
            $this->db->like('nama_kegiatan', $data['keyword']);
            $this->db->from('kegiatan');
            $this->db->where('aktifasi_kegiatan', '1');
            $config['total_rows'] = $this->db->count_all_results();
            
            // $config['total_rows'] = $this->m_data->menghitung_kegiatan();
            $config['per_page'] = 10;

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
            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->kegiatan_innerjoin($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_kegiatan"] = $this->m_data->tampil_kegiatan_byid_page_aktif($config['per_page'], $data['start'], $data['keyword']);





            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);

            $this->load->view('Halaman_admin/Admin/Kegiatan_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
             
             if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            
            $id_admin = $this->session->userdata('id_admin');
            $data['title'] = 'Halaman Kegiatan Panti';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();


            $config['base_url'] = site_url('admin/kegiatan');
            
            $this->db->like('nama_kegiatan', $data['keyword']);
            $this->db->from('kegiatan');
            $this->db->where('id_admin', $id_admin);
            $config['total_rows'] = $this->db->count_all_results();
            
            
            // $config['total_rows'] = $this->m_data->menghitung_kegiatan();
            $config['per_page'] = 10;

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
            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->kegiatan_innerjoin($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_kegiatan"] = $this->m_data->tampil_kegiatan_byid_page($id_admin, $config['per_page'], $data['start'], $data['keyword']);





            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

            $this->load->view('Halaman_admin/Pengurus/Kegiatan_panti', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
    }

    public function formkegiatan()
    {
        $id_admin = $this->session->userdata('id_admin');
        $data['title'] = 'Halaman Tambah Kegiatan Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["data_kegiatan"] = $this->m_data->tampil_kegiatan($id_admin);


        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["kegiatan"] = $this->m_data->tampil_profil_byid($id_admin);

        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

        $this->load->view('Halaman_admin/Pengurus/tambah_kegiatan', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }

    public function tambah_kegiatan()
    {
        
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Document', 'required');
        }
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_profil', 'Nama Panti', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('date', 'Tanggal', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
        $id_admin = $this->session->userdata('id_admin');
        $data['title'] = 'Halaman Tambah Kegiatan Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data["data_kegiatan"] = $this->m_data->tampil_kegiatan($id_admin);


        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["kegiatan"] = $this->m_data->tampil_profil_byid($id_admin);

        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

        $this->load->view('Halaman_admin/Pengurus/tambah_kegiatan', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
        } else {
        
        $nama = $this->input->post('nama_kegiatan');
        $tanggal = $this->input->post('date');
        $id_profil = $this->input->post('id_profil');
        $deskripsi = $this->input->post('deskripsi');
        $id_admin = $this->input->post('id_admin');
        if (isset($_POST['simpan'])) {
            if ($_FILES['foto']['error'] <> 10) {

                $config['upload_path'] = './application/upload/kegiatan';
                $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                $this->load->library('upload', $config);
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 320;
                // $config['max_height']           = 370;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    // $this->index($error);
                    echo $error;
                    // echo "Upload Gagal";
                        $id_admin = $this->session->userdata('id_admin');
                        $data['title'] = 'Halaman Tambah Kegiatan Panti';
                        $data['admin'] = $this->db->get_where('admin', ['email' =>
                        $this->session->userdata('email')])->row_array();
                        $data["data_kegiatan"] = $this->m_data->tampil_kegiatan($id_admin);
                
                
                        $data["id_admin"] = $this->m_data->id_admin($id_admin);
                        $data["kegiatan"] = $this->m_data->tampil_profil_byid($id_admin);
                
                        $this->load->view('Halaman_admin/Templates/Header', $data);
                        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
                
                        $this->load->view('Halaman_admin/Pengurus/tambah_kegiatan', $data);
                        $this->load->view('Halaman_admin/Templates/Footer');
                } else {
                    $hasil     = $this->upload->data();
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_admin'  => $id_admin,
                        'nama_kegiatan'       => $nama,
                        'tanggal'       => $tanggal,
                        'foto_kegiatan'       => $hasil['file_name'],
                        'deskripsi_k'  => $deskripsi
                    );
                    $this->db->insert('kegiatan', $data);
                    redirect('admin/kegiatan');
                }
            } else {
                $data = array(
                    'id_profil'  => $id_profil,
                    'id_admin'  => $id_admin,
                    'nama_kegiatan'       => $nama,
                     'tanggal'       => $tanggal,
                    'deskripsi_k'  => $deskripsi
                );
                $this->db->insert('kegiatan', $data);
                redirect('admin/kegiatan');
            }
        }
    }
    }

    public function formedit_kegiatan($id_kegiatan)
    {
        $data['title'] = 'Halaman Edit Kegiatan Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_admin = $this->session->userdata('id_admin');
        $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);


        $data["id_kegiatan"] = $this->m_data->get_id_kegiatan($id_kegiatan);
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["data_kegiatan"] = $this->m_data->tampil_kegiatan($id_admin);
        $data["nama_kegiatan"] = $this->m_data->nama_panti_kegiatan($id_kegiatan);




        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

        $this->load->view('Halaman_admin/Pengurus/Edit_kegiatan', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }
    public function edit_kegiatan()
    {
         $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
         $this->form_validation->set_rules('date', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('id_profil', 'Nama Panti', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_message('required', '%s Masih kosong silahkan diisi! ');
        if ($this->form_validation->run() == false) {
         $data['title'] = 'Halaman Edit Kegiatan Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $id_admin = $this->session->userdata('id_admin');
        $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);

        $id_kegiatan = $this->input->post('id_kegiatan');
        $data["id_kegiatan"] = $this->m_data->get_id_kegiatan($id_kegiatan);
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["data_kegiatan"] = $this->m_data->tampil_kegiatan($id_admin);
        $data["nama_kegiatan"] = $this->m_data->nama_panti_kegiatan($id_kegiatan);




        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

        $this->load->view('Halaman_admin/Pengurus/Edit_kegiatan', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
        } else {
        
        $nama = $this->input->post('nama_kegiatan');
        $id_profil = $this->input->post('id_profil');
        $deskripsi = $this->input->post('deskripsi');
        $id_admin = $this->input->post('id_admin');
        $tanggal = $this->input->post('date');
        if (isset($_POST['simpan'])) {
            if ($_FILES['foto']['error'] <> 4) {

                $config['upload_path'] = './application/upload/kegiatan';
                $config['allowed_types'] = 'jpg|png|gif|bmp|jpeg';
                $this->load->library('upload', $config);
                // $config['max_size']             = 1024; // 1MB
                // $config['max_width']            = 320;
                // $config['max_height']           = 370;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    // $this->index($error);
                    $this->index($error);
                    // echo "Upload Gagal";
                     $data['title'] = 'Halaman Edit Kegiatan Panti';
                    $data['admin'] = $this->db->get_where('admin', ['email' =>
                    $this->session->userdata('email')])->row_array();
                    $id_admin = $this->session->userdata('id_admin');
                    $data["tampil"] = $this->m_data->tampil_profil_byid($id_admin);
            
                     $id_kegiatan = $this->input->post('id_kegiatan');
                    $data["id_kegiatan"] = $this->m_data->get_id_kegiatan($id_kegiatan);
                    $data["id_admin"] = $this->m_data->id_admin($id_admin);
                    $data["data_kegiatan"] = $this->m_data->tampil_kegiatan($id_admin);
                    $data["nama_kegiatan"] = $this->m_data->nama_panti_kegiatan($id_kegiatan);
            
            
            
            
                    $this->load->view('Halaman_admin/Templates/Header', $data);
                    $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);
            
                    $this->load->view('Halaman_admin/Pengurus/Edit_kegiatan', $data);
                    $this->load->view('Halaman_admin/Templates/Footer');
                } else {
                    $hasil     = $this->upload->data();
                    $data = array(
                        'id_profil'  => $id_profil,
                        'id_admin'  => $id_admin,
                        'nama_kegiatan'       => $nama,
                          'tanggal'       => $tanggal,
                        'foto_kegiatan'       => $hasil['file_name'],
                        'deskripsi_k'  => $deskripsi
                    );
                    $id_kegiatan = $this->input->post('id_kegiatan');
                    $query = $this->db->get_where('kegiatan', array('id_kegiatan' => $id_kegiatan))->row_array();
                    unlink("./application/upload/kegiatan" . $query['foto']);
                    $this->db->where('id_kegiatan', $id_kegiatan);
                    $this->db->update('kegiatan', $data);
                    redirect('admin/kegiatan');
                }
            } else {
                $data = array(
                    'id_profil'  => $id_profil,
                    'id_admin'  => $id_admin,
                    'nama_kegiatan'       => $nama,
                      'tanggal'       => $tanggal,
                    'deskripsi_k'  => $deskripsi
                );
                $id_kegiatan = $this->input->post('id_kegiatan');
                $this->db->where('id_kegiatan', $id_kegiatan);
                $this->db->update('kegiatan', $data);
                redirect('Admin/kegiatan');
            }
        }
    }
    }
    function hapus_kegiatan($id_kegiatan)
    {
        $this->m_data->hapuskegiatan($id_kegiatan);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('Admin/kegiatan');
    }
      function hapus_kegiatan_verifikasi($id_kegiatan)
    {
        $this->m_data->hapuskegiatan($id_kegiatan);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('Admin/verifikasi_kegiatan');
    }

    function hapus_komen($id_komen)
    {
        $this->m_data->hapuskomen($id_komen);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert">
        Data Berhasil Di Hapus!
        </div>');
        redirect('Admin/komentar');
    }

    public function ubah_password()
    {
        $user = $this->session->userdata('id_level');

        if ($user == 1) {

            $data['title'] = 'Ubah Password';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->form_validation->set_rules('current_password', 'Current_password', 'required|trim');
            $this->form_validation->set_rules('new_password1', 'New_password1', 'required|trim|min_length[8]|max_length[30]|matches[new_password2]', [
                'matches' => 'Password Tidak Sesuai!',
                'max_length' => 'Password Terlalu Panjang',
                'min_length' => 'Password Terlalu Pendek',
            ]);
            $this->form_validation->set_rules('new_password2', 'New_password2', 'required|trim|min_length[8]|max_length[30]|matches[new_password1]', [
                'matches' => 'Password Tidak Sesuai!',
                'max_length' => 'Password Terlalu Panjang',
                'min_length' => 'Password Terlalu Pendek',
            ]);


            if ($this->form_validation->run() == false) {
                $this->load->view('Halaman_admin/Templates/Header', $data);
                $this->load->view('Halaman_admin/Admin/Sidebar', $data);

                $this->load->view('Halaman_admin/Admin/Ganti_password', $data);
                $this->load->view('Halaman_admin/Templates/Footer');
            } else {
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password1');
                if (!password_verify($current_password, $data['admin']['password'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              Salah Password
                </div>');
                    redirect('Admin/ubah_password');
                } else {
                    if ($current_password == $new_password) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Password tidak boleh sama dengan password lama!
                </div>');
                        redirect('Admin/ubah_password');
                    } else {
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('admin');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                   Password Berhasil dirubah
                      </div>');
                        redirect('Auth');
                    }
                }
            }
        } else {
            $data['title'] = 'Ubah Password';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();

            $this->form_validation->set_rules('current_password', 'Current_password', 'required|trim');
            $this->form_validation->set_rules('new_password1', 'New_password1', 'required|trim|min_length[8]|max_length[30]|matches[new_password2]');
            $this->form_validation->set_rules('new_password2', 'New_password2', 'required|trim|min_length[8]|max_length[30]|matches[new_password1]');


            if ($this->form_validation->run() == false) {
                $this->load->view('Halaman_admin/Templates/Header', $data);
                $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

                $this->load->view('Halaman_admin/Pengurus/Ganti_password', $data);
                $this->load->view('Halaman_admin/Templates/Footer');
            } else {
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password1');
                if (!password_verify($current_password, $data['admin']['password'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              Salah Password
                </div>');
                    redirect('Admin/ubah_password');
                } else {
                    if ($current_password == $new_password) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Password tidak boleh sama dengan password lama!
                </div>');
                        redirect('Admin/ubah_password');
                    } else {
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('admin');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                   Password Berhasil dirubah
                      </div>');
                        redirect('Auth');
                    }
                }
            }
        }
    }
    public function user_aktif()
    {
      
        $dataa['title'] = 'Halaman Aktifasi User';
        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        if($this->input->post('search')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        }else{
        $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('Admin/user_aktif');
        
        $this->db->like('name', $data['keyword']);
        $this->db->from('admin');
        $this->db->where('aktifasi', '1');
        $config['total_rows'] = $this->db->count_all_results();
        
        // $config['total_rows'] = $this->m_data->user_aktif_row();
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
        $dataa["user_admin"] = $this->m_data->user_aktif($config['per_page'], $dataa['start'], $data['keyword']);
        $dataa["profil"] = $this->m_data->admin();





        $this->load->view('Halaman_admin/Templates/Header', $dataa);
        $this->load->view('Halaman_admin/Admin/Sidebar', $dataa);
        $this->load->view('Halaman_admin/Admin/User_aktif', $dataa);
        $this->load->view('Halaman_admin/Templates/Footer');
    }


    public function daftar_user()
    {
         
        $dataa['title'] = 'Halaman Daftar User';
        $dataa['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        if($this->input->post('search')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        }else{
        $data['keyword'] = $this->session->userdata('keyword');
        }


        $config['base_url'] = site_url('Admin/daftar_user');
        $this->db->like('name', $data['keyword']);
        $this->db->from('admin');
        $this->db->where('aktifasi', '0');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->m_data->user_aktif_row();
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
        $dataa["user_admin"] = $this->m_data->daftar_user($config['per_page'], $dataa['start'],$data['keyword']);
        $dataa["profil"] = $this->m_data->admin();





        $this->load->view('Halaman_admin/Templates/Header', $dataa);
        $this->load->view('Halaman_admin/Admin/Sidebar', $dataa);
        $this->load->view('Halaman_admin/Admin/Daftar_user', $dataa);
        $this->load->view('Halaman_admin/Templates/Footer');
    }



    public function update_admin($id_admin)
    {
        $dataa["update"] = $this->m_data->update_admin($id_admin);
        redirect('Admin/user_aktif');
    }
    public function update_daftar($id_admin)
    {
        $dataa["update"] = $this->m_data->update_daftar($id_admin);
        redirect('Admin/daftar_user');
    }

    public function komentar()
    {

        $user = $this->session->userdata('id_level');
        if ($user == 1) {

            $id_admin = $this->session->userdata('id_admin');

            $data['title'] = 'Halaman Komentar';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            if($this->input->post('search')){
             $data['keyword'] = $this->input->post('keyword');
             $this->session->set_userdata('keyword', $data['keyword']);
            }else{
              $data['keyword'] = $this->session->userdata('keyword');
            }
            $config['base_url'] = site_url('Admin/komentar');
             $this->db->like('nama_user', $data['keyword']);
             $this->db->or_like('isi_komentar', $data['keyword']);
            $this->db->from('komentar_kirim');
            $config['total_rows'] = $this->db->count_all_results();
            // $config['total_rows'] = $this->m_data->menghitung_komentar_admin();
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

            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->komentar_innerjoin();
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_penghuni"] = $this->m_data->tampil_komentar_pengurus($config['per_page'], $data['start'],$data['keyword']);






            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Admin/Sidebar', $data);

            $this->load->view('Halaman_admin/Admin/Komentar', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        } else {
            $id_admin = $this->session->userdata('id_admin');

            $data['title'] = 'Halaman Komentar';
            $data['admin'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);

            $config['base_url'] = site_url('Admin/komentar');
            $config['total_rows'] = $this->m_data->menghitung_komentar($id_admin);
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
            $keyword = $this->input->post('keyword');
            $id_admin = $this->session->userdata('id_admin');
            $data["id_admin"] = $this->m_data->id_admin($id_admin);
            $data["profil"] = $this->m_data->komentar_innerjoin($id_admin);
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
            $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
            $data["data_penghuni"] = $this->m_data->tampil_komentar_admin($id_admin, $config['per_page'], $data['start'], $keyword);






            $this->load->view('Halaman_admin/Templates/Header', $data);
            $this->load->view('Halaman_admin/Pengurus/Sidebar', $data);

            $this->load->view('Halaman_admin/Pengurus/Komentar', $data);
            $this->load->view('Halaman_admin/Templates/Footer');
        }
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
        redirect('Admin/komentar/');
    }
    public function print_profil($id_profil)
    {
        $data['title'] = 'Cetak Profil';
        $data["id_profil"] = $this->m_data->print_profil($id_profil);
        $this->load->view('Halaman_admin/Pengurus/Print_satu_profil', $data);
    }
    public function print_profil_semua($nama)
    {
        $data['title'] = 'Cetak Profil';
        $id_admin = $this->session->userdata('id_admin');
        $data["nama"] = $this->m_data->id_admin($id_admin);
        $data["id_admin"] = $this->m_data->print_profil_semua($nama);
        $this->load->view('Halaman_admin/Pengurus/Print_semua_profil', $data);
    }
     public function print_profil_semua_admin()
    {
        $data['title'] = 'Cetak Profil';
        $id_admin = $this->session->userdata('id_admin');
        $data["nama"] = $this->m_data->id_admin($id_admin);
        $data["id_admin"] = $this->m_data->print_profil_semua_admin();
        $this->load->view('Halaman_admin/Admin/Print_semua_admin', $data);
    }
    public function print($id_penghuni)
    {
        $data['title'] = 'Cetak Penghuni';
        $data["id_penghuni"] = $this->m_data->id_penghuni($id_penghuni);
        $this->load->view('Halaman_admin/Pengurus/print_penghuni', $data);
    }

    public function print_semua($id_profil)
    {
        $data['title'] = 'Cetak Penghuni';
        $data["print"] = $this->m_data->jenis_panti($id_profil);
        $data["print1"] = $this->m_data->print_semua($id_profil);
        $this->load->view('Halaman_admin/Pengurus/Print_penghuni_semua', $data);
    }

    public function verifikasi_profil()
    {
        $data['title'] = 'Halaman Verifikasi Panti Admin';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        if($this->input->post('search')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        }else{
        $data['keyword'] = $this->session->userdata('keyword');
        }


        $data['provinsi'] = $this->m_data->provinsi();
        $data['jenis_panti'] = $this->m_data->jenis_panti_insert();


        $config['base_url'] = site_url('Admin/verifikasi_profil');
        $this->db->like('nama_panti', $data['keyword']);
        $this->db->from('profil_panti');
        $this->db->where('aktifasi_profil', '0');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->m_data->menghitung_panti_verifikasi();
        $config['per_page'] = 10;

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



        $id_admin = $this->session->userdata('id_admin');
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        // $data["data_profil1"] = $this->m_data->panti();
        $data["profil"] = $this->m_data->tampil_profil_admin($id_admin);

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["data_profil"] = $this->m_data->aktifasi_profil_panti_admin($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Admin/Sidebar', $data);
        $this->load->view('Halaman_admin/Admin/Verifikasi_profil', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }

    public function verifikasi_galeri()
    {
        
        $id_admin = $this->session->userdata('id_admin');
        $data['title'] = 'Halaman Verifikasi Galeri Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        if($this->input->post('search')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        }else{
        $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('Admin/verifikasi_galeri');
         $this->db->like('nama_galeri', $data['keyword']);
        $this->db->from('galeri_panti');
        $this->db->where('aktifasi_galeri', '0');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->m_data->tampil_galeri_rows();
        $config['per_page'] = 10;

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

        $id_admin = $this->session->userdata('id_admin');
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["profil"] = $this->m_data->galeri_innerjoin();
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["data_galeri"] = $this->m_data->galeri_semua_non($config['per_page'], $data['start'], $data['keyword']);



        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Admin/Sidebar', $data);

        $this->load->view('Halaman_admin/Admin/Verifikasi_galeri', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }
    public function verifikasi_penghuni()
    {
        
        $id_admin = $this->session->userdata('id_admin');
        if($this->input->post('search')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        }else{
        $data['keyword'] = $this->session->userdata('keyword');
        }
        $data['title'] = 'Halaman Verifikasi Penghuni Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        $config['base_url'] = site_url('Admin/verifikasi_penghuni');
        $this->db->like('nama_penghuni', $data['keyword']);
        $this->db->from('penghuni_panti');
        $this->db->where('aktifasi_penghuni', '0');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->m_data->menghitung_penghuni_verifikasi();
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
        $keyword = $this->input->post('keyword');

        $id_admin = $this->session->userdata('id_admin');
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["profil"] = $this->m_data->penghuni_innerjoin($id_admin);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data["id"] = $this->m_data->tampil_profil_byid($id_admin);
        $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["data_penghuni"] = $this->m_data->tampil_penghuni_admin_nonaktif($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Admin/Sidebar', $data);
        $this->load->view('Halaman_admin/Admin/Verifikasi_penghuni', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }

    public function verifikasi_kegiatan()
    {
         
        $id_admin = $this->session->userdata('id_admin');
        $data['title'] = 'Halaman Verifikasi Kegiatan Panti';
        $data['admin'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();
        if($this->input->post('search')){
        $data['keyword'] = $this->input->post('keyword');
        $this->session->set_userdata('keyword', $data['keyword']);
        }else{
        $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url'] = site_url('Admin/verifikasi_kegiatan');
         $this->db->like('nama_kegiatan', $data['keyword']);
        $this->db->from('kegiatan');
        $this->db->where('aktifasi_kegiatan', '0');
        $config['total_rows'] = $this->db->count_all_results();
        // $config['total_rows'] = $this->m_data->menghitung_kegiatan_verifikasi();
        $config['per_page'] = 10;

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
        $id_admin = $this->session->userdata('id_admin');
        $data["id_admin"] = $this->m_data->id_admin($id_admin);
        $data["profil"] = $this->m_data->kegiatan_innerjoin($id_admin);
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['start'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data["data_kegiatan"] = $this->m_data->tampil_kegiatan_byid_page_nonaktif($config['per_page'], $data['start'], $data['keyword']);





        $this->load->view('Halaman_admin/Templates/Header', $data);
        $this->load->view('Halaman_admin/Admin/Sidebar', $data);

        $this->load->view('Halaman_admin/Admin/Verifikasi_kegiatan', $data);
        $this->load->view('Halaman_admin/Templates/Footer');
    }
    public function update_profil_aktif($id_profil)
    {
        $dataa["update"] = $this->m_data->update_profil_aktif($id_profil);
        redirect('Admin/verifikasi_profil');
    }
    public function update_profil_nonaktif($id_profil)
    {
        $dataa["update"] = $this->m_data->update_profil_nonaktif($id_profil);
        redirect('Admin/profil_panti');
    }


    public function update_galeri_aktif($id_galeri)
    {
        $dataa["update"] = $this->m_data->update_galeri_aktif($id_galeri);
        redirect('Admin/verifikasi_galeri');
    }
    public function update_galeri_nonaktif($id_galeri)
    {
        $dataa["update"] = $this->m_data->update_galeri_nonaktif($id_galeri);
        redirect('Admin/galeri');
    }

    public function update_penghuni_aktif($id_penghuni)
    {
        $dataa["update"] = $this->m_data->update_penghuni_aktif($id_penghuni);
        redirect('Admin/verifikasi_penghuni');
    }
    public function update_penghuni_nonaktif($id_penghuni)
    {
        $dataa["update"] = $this->m_data->update_penghuni_nonaktif($id_penghuni);
        redirect('Admin/penghuni');
    }

    public function update_kegiatan_aktif($id_kegiatan)
    {
        $dataa["update"] = $this->m_data->update_kegiatan_aktif($id_kegiatan);
        redirect('Admin/verifikasi_kegiatan');
    }
    public function update_kegiatan_nonaktif($id_kegiatan)
    {
        $dataa["update"] = $this->m_data->update_kegiatan_nonaktif($id_kegiatan);
        redirect('Admin/kegiatan');
    }
}
