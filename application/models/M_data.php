    <?php
   
    class M_data extends CI_Model
    {
        
        private $_table = "profil_panti";
        private $_table1 = "penghuni_panti";
        private $_table2 = "galeri_panti";
        private $_table3 = "kegiatan";

        //profil panti
        public function tampil_profil_byid($id_admin)
        {
            $profil = $this->db->query("SELECT * FROM profil_panti where id_admin='$id_admin' and aktifasi_profil ='1'");
            return $profil->result();
        }

        public function tampil_profil_admin()
        {
            $profil = $this->db->query("SELECT * FROM profil_panti inner join admin on profil_panti.id_admin = admin.id_admin inner join jenis_panti on profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti ");
            return $profil->result();
        }

        public function print_profil_semua($nama)
        {
            $profil = $this->db->query("SELECT * FROM profil_panti inner join admin on profil_panti.id_admin = admin.id_admin inner join jenis_panti on profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti where name ='$nama' and aktifasi_profil='1' ");
            return $profil->result();
        }
        public function print_profil_semua_admin()
        {
            $profil = $this->db->query("SELECT * FROM profil_panti inner join jenis_panti on profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti  where aktifasi_profil='1' ");
            return $profil->result();
        }
        
        public function print_profil($id_profil)
        {
            $profil = $this->db->query("SELECT * FROM profil_panti inner join admin on profil_panti.id_admin = admin.id_admin inner join jenis_panti on profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti where id_profil ='$id_profil' ");
            return $profil->result();
        }

        public function penghuni_id($id_penghuni)
        {
            $penghuni = $this->db->query("SELECT * FROM penghuni_panti where id_penghuni='$id_penghuni'");
            return $penghuni->result();
        }


        public function tampil_profil()
        {
            $profil = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN desa
            ON profil_panti.id_desa = desa.id_desa
            INNER JOIN admin
            ON profil_panti.id_admin = admin.id_admin
            INNER JOIN kecamatan
            ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti");
            return $profil->result();
        }

        public function id_admin_tg($id_profil)
        {
            $id_admin = $this->db->query("SELECT id_admin, id_profil, nama_panti FROM profil_panti where id_profil = '$id_profil' ;");
            return $id_admin->result();
        }

        public function tampil_profil_dashboard($limit, $start, $keyword = null)
        {
          
            if($keyword){
               
                $this->db->like('nama_panti', $keyword);
               
            } 
          
            $id= '1';
            return $this->db->get_where('profil_panti', array('aktifasi_profil' => $id), $limit, $start)->result_array();
            
        }

        public function kegiatan_innerjoin()
        {
             $profil = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN desa
            ON profil_panti.id_desa = desa.id_desa
            INNER JOIN admin
            ON profil_panti.id_admin = admin.id_admin
            INNER JOIN kegiatan
            ON profil_panti.id_profil = kegiatan.id_profil
        
            INNER JOIN kecamatan
            ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti");
            return $profil->result();
        }

        public function admin()
        {

            $admin = $this->db->query("SELECT * FROM admin INNER JOIN level_admin on admin.id_level = level_admin.id_level ");
            return $admin->result();
        }
        public function galeri_innerjoin()
        {
            $profil = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN desa
            ON profil_panti.id_desa = desa.id_desa
            INNER JOIN admin
            ON profil_panti.id_admin = admin.id_admin
            INNER JOIN galeri_panti
            ON profil_panti.id_profil = galeri_panti.id_profil
            INNER JOIN kecamatan
            ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti");
            return $profil->result();
        }

        public function penghuni_innerjoin()
        {
            $profil = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN desa
            ON profil_panti.id_desa = desa.id_desa
            INNER JOIN admin
            ON profil_panti.id_admin = admin.id_admin
            INNER JOIN penghuni_panti
            ON profil_panti.id_profil = penghuni_panti.id_profil
            INNER JOIN kecamatan
            ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti");
            return $profil->result();
        }

        public function komentar_innerjoin()
        {
            $profil = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN komentar_kirim
            ON profil_panti.id_profil = komentar_kirim.id_profil
            INNER JOIN admin
            ON profil_panti.id_admin = admin.id_admin
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti");
            return $profil->result();
        }


        public function id_admin($id_admin)
        {
            $admin = $this->db->query("SELECT * FROM admin where id_admin='$id_admin' ");
            return $admin->result();
        }

        public function jenis_kelamin()
        {
            return $this->db->get('jenis_kelamin')->result();
        }

        public function id_penghuni($id_penghuni)
        {
            $admin = $this->db->query("SELECT * FROM penghuni_panti inner join profil_panti on penghuni_panti.id_profil = profil_panti.id_profil inner join jenis_kelamin on penghuni_panti.id_jk = jenis_kelamin.id_jk where id_penghuni='$id_penghuni' ");
            return $admin->result();
        }

        public function print($id_penghuni)
        {
            $admin = $this->db->query("SELECT * FROM penghuni_panti 
            inner join profil_panti 
            on penghuni_panti.id_profil = profil_panti.id_profil 
            inner join jenis_kelamin 
            on penghuni_panti.id_jk = jenis_kelamin.id_jk where id_penghuni='$id_penghuni' ");
            return $admin->result();
        }
        public function print_semua($id_profil)
        {
            $admin = $this->db->query("SELECT * FROM penghuni_panti inner join jenis_kelamin 
            on penghuni_panti.id_jk = jenis_kelamin.id_jk  where  id_profil='$id_profil' ");
            return $admin->result();
        }
        public function simpanprofil($data)
        {
            return $this->db->insert($this->_table, $data);
        }

        public function hapuspanti($id_profil)
        {
            $this->db->where('id_profil', $id_profil);
            $this->db->delete('profil_panti');
        }
        public function hapuspenghuni($id_penghuni)
        {
            $this->db->where('id_penghuni', $id_penghuni);
            $this->db->delete('penghuni_panti');
        }
        public function hapusgaleri($id_galeri)
        {
            $this->db->where('id_galeri', $id_galeri);
            $this->db->delete('galeri_panti');
        }
        public function hapuskegiatan($id_kegiatan)
        {
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->delete('kegiatan');
        }
        public function hapuskomen($id_komen)
        {
            $this->db->where('id_komen', $id_komen);
            $this->db->delete('komentar_kirim');
        }


        public function edit_profil_panti($data, $id_profil)
        {
            return $this->db->update($this->_table, $data, array('id_profil' => $id_profil));
        }
        public function tampil_penghuni($id_admin)
        {
            $penghuni = $this->db->query("SELECT * FROM penghuni_panti where id_admin='$id_admin' ");
            return $penghuni->result();
        }


        public function getById($id_profil)
        {
            return $this->db->get_where($this->_table, ["id_profil" => $id_profil])->row();
        }

        public function get_id_penghuni($id_penghuni)
        {
            return $this->db->get_where($this->_table1, ["id_penghuni" => $id_penghuni])->row();
        }
        public function get_id_galeri($id_galeri)
        {
            return $this->db->get_where($this->_table2, ["id_galeri" => $id_galeri])->row();
        }
        public function get_id_kegiatan($id_kegiatan)
        {
            return $this->db->get_where($this->_table3, ["id_kegiatan" => $id_kegiatan])->row();
        }
        //input foto
        public function get_by_id($kondisi)
        {
            $this->db->from('admin');
            $this->db->where($kondisi);
            $query = $this->db->get();
            return $query->row();
        }
        public function insert($data)
        {
            $this->db->insert('admin', $data);
            return TRUE;
        }
        public function delete($where)
        {
            $this->db->where($where);
            $this->db->delete('admin');
            return TRUE;
        }
        public function update($data, $kondisi)
        {
            $this->db->update('admin', $data, $kondisi);
            return TRUE;
        }
        //akhir input

        public function provinsi()
        {
            $this->db->order_by('nama_kecamatan', 'ASC');
            $provinces = $this->db->get('kecamatan');


            return $provinces->result_array();
        }

        public function kabupaten($provId)
        {
            $kabupaten = "<option value='0'>Pilih Desa</pilih>";

            $this->db->order_by('nama_desa', 'ASC');
            $kab = $this->db->get_where('desa', array('id_kecamatan' => $provId));

            foreach ($kab->result_array() as $data) {
                $kabupaten .= "<option value='$data[id_desa]'>$data[nama_desa]</option>";
            }

            return $kabupaten;
        }
        public function jenis_panti($id_profil)
        {
            $jenis_panti = $this->db->query("SELECT *
                FROM profil_panti
                INNER JOIN desa
                ON profil_panti.id_desa = desa.id_desa
                INNER JOIN kecamatan
                ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
                INNER JOIN jenis_panti
                ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti where id_profil ='$id_profil'");
            return $jenis_panti->result();
        }


        public function jenis_panti_marker()
        {
            $jenis_panti_marker = $this->db->query("SELECT *
                FROM profil_panti
                INNER JOIN desa
                ON profil_panti.id_desa = desa.id_desa
                INNER JOIN kecamatan
                ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
                INNER JOIN jenis_panti
                ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti ");
            return $jenis_panti_marker->result();
        }
        public function nama_panti($id_penghuni)
        {
            $nama_panti = $this->db->query("SELECT * FROM penghuni_panti
            INNER JOIN profil_panti
            ON penghuni_panti.id_profil = profil_panti.id_profil
            where id_penghuni ='$id_penghuni'");
            return $nama_panti->result();
        }

        public function jenis_k($id_penghuni)
        {
            $jenis_k = $this->db->query("SELECT * FROM penghuni_panti
            INNER JOIN jenis_kelamin
            ON penghuni_panti.id_jk = jenis_kelamin.id_jk
            where id_penghuni ='$id_penghuni'");
            return $jenis_k->result();
        }

        public function google_api()
        {
            return $this->db->query("SELECT * FROM google_api")->result();
        }

        public function nama_panti_galeri($id_galeri)
        {
            $nama_panti_galeri = $this->db->query("SELECT * FROM galeri_panti
            INNER JOIN profil_panti
            ON galeri_panti.id_profil = profil_panti.id_profil
            where id_galeri ='$id_galeri'");
            return $nama_panti_galeri->result();
        }

        public function nama_panti_kegiatan($id_kegiatan)
        {
            $nama_panti_kegiatan = $this->db->query("SELECT * FROM kegiatan
            INNER JOIN profil_panti
            ON kegiatan.id_profil = profil_panti.id_profil
            where id_kegiatan ='$id_kegiatan'");
            return $nama_panti_kegiatan->result();
        }



        public function jenis_panti_insert()
        {
            // $this->db->order_by('nama_kecamatan', 'ASC');
            return   $this->db->get('jenis_panti');
        }

        function tampil_panti()
        {
            return $this->db->query("SELECT * FROM jenis_panti")->result();
        }
        public function jenis_kecamatan($id_profil)
        {
            $jenis_kecamatan = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN desa
            ON profil_panti.id_desa = desa.id_desa
            INNER JOIN kecamatan
            ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti where id_profil ='$id_profil'");
            return $jenis_kecamatan->result();
        }
        function tampil_kecamatan()
        {
            return $this->db->query("SELECT * FROM kecamatan")->result();
        }
        function tampil_penghuni_dashboard($limit, $start)
        {
            return $this->db->get('penghuni_panti', $limit, $start)->result_array();
        }

        function kegiatan($limit, $start)
        {
            return $this->db->get('kegiatan', $limit, $start)->result_array();
        }


        function tampil_kegiatan_array_profil($limit, $start, $keyword= null)
        {
          

            if($keyword){
               
                $this->db->like('nama_kegiatan', $keyword);
               
            } 
           
            $id= '1';
            return $this->db->get_where('kegiatan', array('aktifasi_kegiatan' => $id), $limit, $start)->result_array();
        }

        function tampil_kegiatan_lokasi(){
            $id= '1';
            return $this->db->get_where('kegiatan', array('aktifasi_kegiatan' => $id), 4,0)->result_array();
        }
        function kegiatan_array($limit, $start)
        {
            $jenis_desa = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN admin
            ON admin.id_admin = profil_panti.id_admin
            INNER JOIN kegiatan
            ON kegiatan.id_profil = profil_panti.id_profil
            INNER join jenis_panti
            on jenis_panti.id_jenis_panti = profil_panti.id_jenis_panti where aktifasi_kegiatan = '1' limit  $limit, $start");
            return $jenis_desa->result_array();
        }


        public function tampil_kegiatan_array($limit, $start, $keyword=null)
        {
            if($keyword){
               
                $this->db->like('nama_kegiatan', $keyword);
               
            } 
          
            $id= '1';
            return $this->db->get_where('kegiatan', array('aktifasi_kegiatan' => $id), $limit, $start)->result_array();
        }

        public function tampil_profil_byid_page($id_admin, $limit, $start, $keyword)
        {
            // $level = '0';
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('profil_panti', $limit, $start);
              
            //     $this->db->where('id_admin', $id_admin);
            //     $this->db->like('nama_panti', $keyword);
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('profil_panti', $limit, $start);
            
            //     $this->db->where('id_admin', $id_admin);
            //     $this->db->like('nama_panti', $keyword);
            // }
            // return $this->db->get()->result();
            
            
              // if (isset($_POST['search'])) {
            if($keyword){
               
                $this->db->like('nama_panti', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('profil_panti', array('id_admin' => $id_admin), $limit, $start)->result();
        }

        public function tampil_galeri_page($id_admin, $limit, $start, $keyword = null)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('profil_panti', $limit, $start);
            //     $this->db->or_like('nama_galeri', $keyword);
            //     $this->db->where('id_admin', $id_admin);
               
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('galeri_panti', $limit, $start);
            //     $this->db->or_like('nama_galeri', $keyword);
            //     $this->db->where('id_admin', $id_admin);
              
            // }
            // return $this->db->get()->result();
             if($keyword){
               
                $this->db->like('nama_galeri', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('galeri_panti', array('id_admin' => $id_admin), $limit, $start)->result();
        }

        public function tampil_penghuni_page($id_admin, $limit, $start, $keyword = null)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('penghuni_panti', $limit, $start);
            //     $this->db->or_like('nama_penghuni', $keyword);
            //     $this->db->where('id_admin', $id_admin);
            
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('penghuni_panti', $limit, $start);
            //     $this->db->or_like('nama_penghuni', $keyword);
            //     $this->db->where('id_admin', $id_admin);
           
            // }
            // return $this->db->get()->result();
            
            if($keyword){
               
                $this->db->like('nama_penghuni', $keyword);
               
            } 
          
            $id= '1';
            return $this->db->get_where('penghuni_panti', array('id_admin' => $id_admin), $limit, $start)->result();
        }

        public function tampil_penghuni_admin_aktif($limit, $start, $keyword = null)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('penghuni_panti', $limit, $start);
            //     $this->db->or_like('nama_penghuni', $keyword);

            //     $this->db->where('aktifasi_penghuni', '1');
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('penghuni_panti', $limit, $start);
            //     $this->db->or_like('nama_penghuni', $keyword);

            //     $this->db->where('aktifasi_penghuni', '1');
            // }
            // return $this->db->get()->result();
            
            
             if($keyword){
               
                $this->db->like('nama_penghuni', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('penghuni_panti', array('aktifasi_penghuni' => $id), $limit, $start)->result();
        }
        public function tampil_penghuni_admin_nonaktif($limit, $start, $keyword = null)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('penghuni_panti', $limit, $start);
            //     $this->db->or_like('nama_penghuni', $keyword);

            //     $this->db->where('aktifasi_penghuni', '0');
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('penghuni_panti', $limit, $start);
            //     $this->db->or_like('nama_penghuni', $keyword);

            //     $this->db->where('aktifasi_penghuni', '0');
            // }
            // return $this->db->get()->result();
            if($keyword){
               
                $this->db->like('nama_penghuni', $keyword);
               
            } 
            
            $id= '0';
            return $this->db->get_where('penghuni_panti', array('aktifasi_penghuni' => $id), $limit, $start)->result();
        }

        public function tampil_kegiatan_byid_page($id_admin, $limit, $start, $keyword = null)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('kegiatan', $limit, $start);
            //     $this->db->or_like('nama_kegiatan', $keyword);
            //     $this->db->where('id_admin', $id_admin);
              
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('kegiatan', $limit, $start);
            //     $this->db->or_like('nama_kegiatan', $keyword);
            //     $this->db->where('id_admin', $id_admin);
                
            // }
            // return $this->db->get()->result();
            
              if($keyword){
               
                $this->db->like('nama_kegiatan', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('kegiatan', array('id_admin' => $id_admin), $limit, $start)->result();
        }
        public function tampil_kegiatan_byid_page_aktif($limit, $start, $keyword = null)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('kegiatan', $limit, $start);
            //     $this->db->or_like('nama_kegiatan', $keyword);

            //     $this->db->where('aktifasi_kegiatan', '1');
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('kegiatan', $limit, $start);
            //     $this->db->or_like('nama_kegiatan', $keyword);

            //     $this->db->where('aktifasi_kegiatan', '1');
            // }
            // return $this->db->get()->result();
            
             if($keyword){
               
                $this->db->like('nama_kegiatan', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('kegiatan', array('aktifasi_kegiatan' => $id), $limit, $start)->result();
        }
        public function tampil_kegiatan_byid_page_nonaktif($limit, $start, $keyword)
        {
            // if (isset($_POST['search'])) {
            //     $this->db->select('*');
            //     $this->db->from('kegiatan', $limit, $start);
            //     $this->db->or_like('nama_kegiatan', $keyword);

            //     $this->db->where('aktifasi_kegiatan', '0');
            // } else {
            //     $this->db->select('*');
            //     $this->db->from('kegiatan', $limit, $start);
            //     $this->db->or_like('nama_kegiatan', $keyword);

            //     $this->db->where('aktifasi_kegiatan', '0');
            // }
            // return $this->db->get()->result();
            if($keyword){
               
                $this->db->like('nama_kegiatan', $keyword);
               
            } 
            
            $id= '0';
            return $this->db->get_where('kegiatan', array('aktifasi_kegiatan' => $id), $limit, $start)->result();
        }

        public function tampil_komentar_admin($id_admin, $limit, $start, $keyword)
        {
            if (isset($_POST['search'])) {
                $this->db->select('*');
                $this->db->from('komentar_kirim', $limit, $start);
                $this->db->or_like('nama_user', $keyword);
                $this->db->where('id_admin', $id_admin);
            } else {
                $this->db->select('*');
                $this->db->from('komentar_kirim', $limit, $start);
                $this->db->or_like('nama_user', $keyword);
                $this->db->where('id_admin', $id_admin);
            }
            return $this->db->get()->result();
        }



        function tampil_jenis_panti()
        {
            return $this->db->get('jenis_panti')->result();
        }
        function tampil_profil_array()
        {
           
              return $this->db->get_where('profil_panti', array('aktifasi_profil' => '1'), 4, 0)->result_array();
        }
         function tampil_profil_array_kegiatan()
        {
           
              return $this->db->get_where('profil_panti', array('aktifasi_profil' => '1'), 4, 0)->result_array();
        }



        function menghitung_penghuni()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM penghuni_panti where aktifasi_penghuni ='1'");
            return $jenis_profil->num_rows();
        }
        function menghitung_penghuni_verifikasi()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM penghuni_panti where aktifasi_penghuni ='0'");
            return $jenis_profil->num_rows();
        }
        function tampil_penghuni_rows($id_profil)
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM penghuni_panti where id_profil ='$id_profil'");
            return $jenis_profil->num_rows();
        }

        function menghitung_panti()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM profil_panti ");
            return $jenis_profil->num_rows();
        }
         function menghitung_panti_profil()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM profil_panti where aktifasi_profil ='1' ");
            return $jenis_profil->num_rows();
        }

        function menghitung_panti_verifikasi()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM profil_panti where aktifasi_profil ='0'");
            return $jenis_profil->num_rows();
        }

        function jenis_panti_lokasi()
        {
            return $this->db->get('jenis_panti')->result_array();
        }

        function menghitung_kegiatan()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM kegiatan where aktifasi_kegiatan ='1'");
            return $jenis_profil->num_rows();
        }

        function menghitung_kegiatan_verifikasi()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM kegiatan where aktifasi_kegiatan ='0'");
            return $jenis_profil->num_rows();
        }
        function menghitung_galeri()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM galeri_panti where aktifasi_galeri ='1'");
            return $jenis_profil->num_rows();
        }
        function tampil_galeri_rows()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM galeri_panti where aktifasi_galeri ='0'");
            return $jenis_profil->num_rows();
        }


        public function get_penghuni($limit, $start)
        {

            $jenis_desa = $this->db->query("SELECT *
            FROM penghuni_panti
            INNER JOIN profil_panti
            ON profil_panti.id_profil = penghuni_panti.id_profil limit $start, $limit");
            return $jenis_desa->result_array();
        }

        function jenis_desa($id_profil)
        {
            $jenis_desa = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN desa
            ON profil_panti.id_desa = desa.id_desa
            INNER JOIN kecamatan
            ON profil_panti.id_kecamatan = kecamatan.id_kecamatan
            INNER JOIN jenis_panti
            ON profil_panti.id_jenis_panti = jenis_panti.id_jenis_panti where id_profil ='$id_profil'");
            return $jenis_desa->result();
        }
        function tampil_desa()
        {

            // $jenis_kecamatan = $this->jenis_kecamatan($id_profil);


            return $this->db->query("SELECT * FROM desa ")->result();
        }

        public function simpanpenghuni($data)
        {
            $this->db->insert('penghuni_panti', $data);
            return TRUE;
        }

        //card
        public function jumlah_penghuni($id_admin)
        {
            $penghuni = $this->db->query("SELECT * FROM penghuni_panti where id_admin='$id_admin'");
            return $penghuni->num_rows();
        }
        public function jumlah_penghuni_admin()
        {
            $penghuni = $this->db->query("SELECT * FROM penghuni_panti where aktifasi_penghuni='1' ");
            return $penghuni->num_rows();
        }
        public function jumlah_admin()
        {
            $admin = $this->db->query("SELECT * FROM admin where id_level='2' and aktifasi = '1'");
            return $admin->num_rows();
        }
        public function jumlah_panti($id_admin)
        {
            $panti = $this->db->query("SELECT * FROM profil_panti where id_admin='$id_admin' and aktifasi_profil='1' ");
            return $panti->num_rows();
        }
        public function jumlah_panti_admin()
        {
            $panti = $this->db->query("SELECT * FROM profil_panti where aktifasi_profil='1' ");
            return $panti->num_rows();
        }

        public function panti()
        {
            $panti = $this->db->query("SELECT * FROM profil_panti ");
            return $panti->result();
        }

        public function profil_panti_admin($limit, $start, $keyword= null)
        {
            // $profil = $this->db->query("SELECT * FROM profil_panti where aktifasi_profil = '1'  limit  $start,$limit");
            // return $profil->result();
              if($keyword){
               
                $this->db->like('nama_panti', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('profil_panti', array('aktifasi_profil' => $id), $limit, $start)->result();
        }
        public function aktifasi_profil_panti_admin($limit, $start, $keyword= null)
        {
            // $profil = $this->db->query("SELECT * FROM profil_panti where aktifasi_profil = '0'  limit  $start,$limit");
            // return $profil->result();
            
             if($keyword){
               
                $this->db->like('nama_panti', $keyword);
               
            } 
            
            $id= '0';
            return $this->db->get_where('profil_panti', array('aktifasi_profil' => $id), $limit, $start)->result();
        }

        //akhir card

        //galeri
        public function tampil_galeri($id_admin)
        {
            $galeri = $this->db->query("SELECT * FROM galeri_panti where id_admin='$id_admin' ");
            return $galeri->result();
        }

        public function penghuni_panti($id_profil, $limit, $start)
        {
            $profil = $this->db->query("SELECT * FROM penghuni_panti where id_profil='$id_profil' limit  $start,$limit");
            return $profil->result();
        }

        public function galeri_semua($limit, $start, $keyword = null)
        {
            // $galeri = $this->db->query("SELECT * FROM galeri_panti where aktifasi_galeri = '1' limit  $start,$limit");
            // return $galeri->result();
            
              if($keyword){
               
                $this->db->like('nama_galeri', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get_where('galeri_panti', array('aktifasi_galeri' => $id), $limit, $start)->result();
        }
        public function galeri_semua_non($limit, $start, $keyword = null)
        {
            // $galeri = $this->db->query("SELECT * FROM galeri_panti where aktifasi_galeri = '0' limit  $start,$limit");
            // return $galeri->result();
             if($keyword){
               
                $this->db->like('nama_galeri', $keyword);
               
            } 
            
            $id= '0';
            return $this->db->get_where('galeri_panti', array('aktifasi_galeri' => $id), $limit, $start)->result();
        }

        public function tampil_galeri_admin($id_galeri)
        {
            $profil = $this->db->query("SELECT * FROM galeri_panti inner join profil_panti on  profil_panti.id_profil = galeri_panti.id_profil where id_galeri='$id_galeri'");
            return $profil->result();
        }

        //akhir galeri

        //awal kegiatan
        public function tampil_kegiatan($id_admin)
        {
            $kegiatan = $this->db->query("SELECT * FROM kegiatan where id_admin='$id_admin' ");
            return $kegiatan->result();
        }



        public function kegiatan_dashboard()
        {
            return $this->db->get('kegiatan')->result_array();
        }

        public function get_profil($id_profil)
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM profil_panti
            INNER JOIN admin
            ON admin.id_admin = profil_panti.id_admin  where id_profil ='$id_profil'");
            return $jenis_profil->result();
        }

        public function get_foto_profil($id_profil)
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM galeri_panti where id_profil ='$id_profil'");
            return $jenis_profil->result();
        }

        public function get_penghuni_lokasi($id_profil, $limit, $start)
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM penghuni_panti where id_profil ='$id_profil ' limit  $start,$limit ");
            return $jenis_profil->result();
        }
        public function get_kegiatan($id_kegiatan)
        {
            $jenis_kegiatan = $this->db->query("SELECT *
            FROM kegiatan inner join profil_panti on kegiatan.id_profil = profil_panti.id_profil where id_kegiatan ='$id_kegiatan'");
            return $jenis_kegiatan->result();
        }

        // penghuni



        public function user_aktif($limit, $start, $keyword = null)
        {
            // $user = $this->db->query("SELECT * FROM admin where aktifasi='1' and id_level = '2' limit  $start,$limit");
            // return $user->result();
              if($keyword){
               
                $this->db->like('name', $keyword);
               
            } 
           
            $id= '1';
            return $this->db->get_where('admin', array('aktifasi' => $id), $limit, $start)->result();
        }

        public function user_aktif_row()
        {
            $user = $this->db->query("SELECT * FROM admin where aktifasi='1' ");
            return $user->num_rows();
        }

        public function update_admin($id_admin)
        {
            $data = [
                'aktifasi' => '0',
            ];
            $this->db->where('id_admin', $id_admin);
            $this->db->update('admin', $data);
        }

        public function daftar_user($limit, $start, $keyword = null)
        {
            // $user = $this->db->query("SELECT * FROM admin where aktifasi='0' and id_level = '2' limit  $start,$limit");
            // return $user->result();
              if($keyword){
               
                $this->db->like('name', $keyword);
               
            } 
           
            $id= '0';
            return $this->db->get_where('admin', array('aktifasi' => $id), $limit, $start)->result();
        }

        public function daftar_user_row()
        {
            $user = $this->db->query("SELECT * FROM admin where aktifasi='0' ");
            return $user->num_rows();
        }

        public function update_daftar($id_admin)
        {
            $data = [
                'aktifasi' => '1',
            ];
            $this->db->where('id_admin', $id_admin);
            $this->db->update('admin', $data);
        }
        public function tampil_komentar($id_profil)
        {
            $query = $this->db->query("SELECT * FROM komentar_kirim WHERE komen_status= '0' and id_profil = '$id_profil'");
            return $query->result();
        }

        public function menghitung_komentar($id_admin)
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM komentar_kirim where id_admin ='$id_admin'");
            return $jenis_profil->num_rows();
        }

        public function menghitung_komentar_admin()
        {
            $jenis_profil = $this->db->query("SELECT *
            FROM komentar_kirim");
            return $jenis_profil->num_rows();
        }


        public function tampil_komentar_pengurus($limit, $start, $keyword=null)
        {
            // $user = $this->db->query("SELECT * FROM komentar_kirim limit  $start,$limit");
            // return $user->result();
            
             if($keyword){
               
                $this->db->like('nama_user', $keyword);
                $this->db->or_like('isi_komentar', $keyword);
               
            } 
            
            $id= '1';
            return $this->db->get('komentar_kirim', $limit, $start)->result();
        }
        public function update_profil_aktif($id_profil)
        {
            $data = [
                'aktifasi_profil' => '1',
            ];
            $this->db->where('id_profil', $id_profil);
            $this->db->update('profil_panti', $data);
        }
        public function update_profil_nonaktif($id_profil)
        {
            $data = [
                'aktifasi_profil' => '0',
            ];
            $this->db->where('id_profil', $id_profil);
            $this->db->update('profil_panti', $data);
        }

        public function update_galeri_aktif($id_galeri)
        {
            $data = [
                'aktifasi_galeri' => '1',
            ];
            $this->db->where('id_galeri', $id_galeri);
            $this->db->update('galeri_panti', $data);
        }
        public function update_galeri_nonaktif($id_galeri)
        {
            $data = [
                'aktifasi_galeri' => '0',
            ];
            $this->db->where('id_galeri', $id_galeri);
            $this->db->update('galeri_panti', $data);
        }

        public function update_penghuni_aktif($id_penghuni)
        {
            $data = [
                'aktifasi_penghuni' => '1',
            ];
            $this->db->where('id_penghuni', $id_penghuni);
            $this->db->update('penghuni_panti', $data);
        }

        public function update_penghuni_nonaktif($id_penghuni)
        {
            $data = [
                'aktifasi_penghuni' => '0',
            ];
            $this->db->where('id_penghuni', $id_penghuni);
            $this->db->update('penghuni_panti', $data);
        }

        public function update_kegiatan_nonaktif($id_kegiatan)
        {
            $data = [
                'aktifasi_kegiatan' => '0',
            ];
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('kegiatan', $data);
        }

        public function update_kegiatan_aktif($id_kegiatan)
        {
            $data = [
                'aktifasi_kegiatan' => '1',
            ];
            $this->db->where('id_kegiatan', $id_kegiatan);
            $this->db->update('kegiatan', $data);
        }
    }
