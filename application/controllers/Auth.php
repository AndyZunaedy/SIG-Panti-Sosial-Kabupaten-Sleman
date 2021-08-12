<?php
ob_start();
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()

    {
        parent::__construct();
        // $this->load->library('upload');
    
        $this->load->model('M_data');
        $this->load->helper('form');
		$this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('library_email');
        
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Menu Login';
            $this->load->view('Halaman_web/Templates/kepala', $data);
            $this->load->view('Halaman_web/Login');
            $this->load->view('Halaman_web/Templates/kaki');
        } else {
            //validasi sukses
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('admin', ['email' => $email])->row_array();
        //usernya ada
        if ($user) {
            if ($user['aktifasi'] == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Melakukan Aktifasi!
                </div>');
                redirect('Auth');
            
            } else {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_level' => $user['id_level'],
                        'id_admin' => $user['id_admin']

                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_level'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect(site_url('Admin'));
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password Salah!
                        </div>');
                    redirect('Auth');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Ter Registrasi!
                </div>');
             redirect('Auth');
        } $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('admin', ['email' => $email])->row_array();
        //usernya ada
        if ($user) {
            if ($user['aktifasi'] == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Melakukan Aktifasi!
                </div>');
                redirect('Auth');
            
            } else {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_level' => $user['id_level'],
                        'id_admin' => $user['id_admin']

                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_level'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('Admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password Salah!
                        </div>');
                    redirect('Auth');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Ter Registrasi!
                </div>');
             redirect('Auth');
        }
        }
    }

    private function login()
    {

       
    }
    public function tambah()
    {
        $data['title'] = 'Menu Registrasi';
        $this->load->view('Halaman_web/Templates/kepala', $data);
        $this->load->view('Halaman_web/Register');
        $this->load->view('Halaman_web/Templates/kaki');
    }



    public function registrasi()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_identitas', 'NIK', 'required|trim|is_unique[admin.no_identitas]', [
            'is_unique' => 'NIK sudah tersedia'
        ]);



        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Document', 'required');
        }


        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
            'is_unique' => 'Email Ini Sudah Tersedia'
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[30]|matches[password2]', [
            'matches' => 'Password Tidak Sesuai!',
            'min_length' => 'Password Terlalu Pendek',
            'max_length' => 'Password Terlalu Panjang',

        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if (!$this->form_validation->run()) {
            $data['title'] = 'Menu Registrasi';
            $this->load->view('Halaman_web/Templates/kepala', $data);
            $this->load->view('Halaman_web/Register');
            $this->load->view('Halaman_web/Templates/kaki');
        } else {
            $data['title'] = 'Menu Login';
            $name  = htmlspecialchars($this->input->post('name', true));
            $nik  = htmlspecialchars($this->input->post('no_identitas', true));
            $password =  password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = htmlspecialchars($this->input->post('email', true));

            if (isset($_POST['simpan'])) {
                if ($_FILES['foto']['error'] <> 10) {

                    $config['upload_path'] = './application/upload/admin';
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
                    } else {
                        $hasil     = $this->upload->data();
                        $data = array(
                            'name'       => $name,
                            'no_identitas'       => $nik,
                            'foto'       => $hasil['file_name'],
                            'password'     => $password,
                            'id_level'     => '2',
                            'email'     => $email,
                            'aktifasi' => '0'
                        );
                        $this->db->insert('admin', $data);
                        $email =$this->input->post('email');
                        $token = base64_encode(random_bytes(32));
                        $user_token = [
                            'email' => $email,
                            'token' => $token,
                            'tanggal' => time()
                        ];

                        $this->db->insert('admin_token', $user_token);
                       $this->sendEmail($email, $name, $token);
                       $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  >' . $email . 'Cek Email untuk aktifikasi akun !
                       </div>');
                          redirect('Auth');
              
            
                        
                    }
                } else {
                    $data = array(
                        'name'       => $name,
                        'no_identitas'       => $nik,
                        'password'     => $password,
                        'id_level'     => '2',
                        'email'     => $email,
                        'aktifasi' => '0'
                    );
                    $this->db->insert('admin', $data);
                    $token = base64_encode(random_bytes(32));
                        $user_token = [
                            'email' => $email,
                            'token' => $token,
                            'tanggal' => time()
                        ];
                        
                        $this->db->insert('admin_token', $user_token);
                        $this->sendEmail($email, $name, $token);
                        // $this->_sendEmail($token, 'verify');
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  >' . $email . '
                      Cek Email untuk aktifikasi akun !
                           </div>');
                        redirect('Auth');
                   
                }
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_level');
        $this->session->unset_userdata('id_admin');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
               Kamu Berhasil Logout!
                </div>');
        redirect('Dashboard');
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            $admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();

            if ($admin_token) {
                if (time() - $admin_token['tanggal'] < (60 * 60 * 24)) {
                    $this->db->set('aktifasi', 1);
                    $this->db->where('email', $email);
                    $this->db->update('admin');

                    $this->db->delete('admin_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  >' . $email . '
                   Akun telah diaktifasi.
                      </div>');
                    redirect('Auth');
                } else {
                    $this->db->delete('admin', ['email' => $email]);
                    $this->db->delete('admin_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Akun gagal diaktifasi, token expired.
                      </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Akun gagal diaktifasi, salah token.
                  </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Akun gagal diaktifasi, salah email.
            </div>');
            redirect('Auth');
        }
    }
    
   

    public function sendEmail($email,$name, $token)
    {
     
        try {
            // phpmailer object
            $mail =  $mail = $this->library_email->ambil();

            $mail->setFrom('junetpokemon@gmail.com', 'Admin GIS');

            //add receipent
            $mail->addAddress($email);
            $url = base_url() . 'auth/verify?email=' . $email . '&token=' . urldecode(($token));
            //add subject
            $mail->Subject = "Register Confirmation";

            $mailContent = " <b> Verifikasi Email</b>
            <br>
            <p>Hai, $name </p>
           
            <p>Klik di bawah untuk mem-validasi email anda.</p>
            <a href='$url'> Aktifkan Akun</a>";

            $mail->Body = $mailContent;
            $mail->send();
        } catch (Exception $e) {
            echo $mail->ErrorInfo;
          
        }
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'junetpokemon@gmail.com',
        //     'smtp_pass' => '27071997Andy',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];
        // $this->email->initialize($config);
        // $this->email->from('junetpokemon@gmail.com', 'Sosial Sesama Admin');
        // $this->email->to($this->input->post('email'));

        // if ($type == 'verify') {
        //     $this->email->subject('Verifikasi Akun Anda');
        //     $this->email->message('Klik link ini untuk mengaktifkan akun anda : <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifasi</a>');
        // } else {
        //     $this->email->subject('Reset Password');
        //     $this->email->message('Klik link ini untuk reset password anda : <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        // }
        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }


         public function sendPassword($email, $token)
            {
                try {
                    // phpmailer object
                    $mail =  $mail = $this->library_email->ambil();
        
                    $mail->setFrom('junetpokemon@gmail.com', 'Admin GIS');
        
                    //add receipent
                    $mail->addAddress($email);
                     $url = base_url() . 'auth/resetpassword?email=' . $email . '&token=' . urldecode(($token));
                    //add subject
    
                    $mail->Subject = "Reset Password";

                    $mailContent = " <b> Reset Password Anda</b>
                    <br>
           
                    <p>Klik di bawah untuk melakukan reset password anda.</p>
                    <a href='$url'> Reset Password</a>";
        
                   $mail->Body = $mailContent;
                   if ($mail->send()) {
                   echo '<script language="javascript">';
                   echo 'alert("Reset Password Berhasil, Cek Email Anda")';
                   echo '</script>';
                redirect('auth', 'refresh');
            }
                } catch (Exception $e) {
                    echo $mail->ErrorInfo;
                  
                }
            }



     
    public function lupapassword()
    {
        
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email'
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('Halaman_web/Templates/kepala', $data);
            $this->load->view('Halaman_web/lupa_password');
            $this->load->view('Halaman_web/Templates/kaki');
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $admin =  $this->db->get_where('admin', ['email' => $email, 'aktifasi' => 1])->row_array();
            if ($admin) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'tanggal' => time()
                ];
                $this->db->insert('admin_token', $user_token);
                $this->sendPassword($email, $token);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
              Cek email untuk reset password
                </div>');
                redirect('Auth/lupapassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Belum Terdaftar atau teregistrasi!
                </div>');
                redirect('Auth/lupapassword');
            }
        }
    }
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            $admin_token = $this->db->get_where('admin_token', ['token' => $token])->row_array();
            if ($admin_token) {
                $this->session->set_userdata('reset_email', $email);
                 $this->db->delete('admin_token', ['email' => $email]);
                $this->changepassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset password gagal! Salah token.
                  </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Reset password gagal! Salah email.
            </div>');
            redirect('Auth');
        }
    }
    public function changepassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[30]|matches[password2]', [
            'matches' => 'Password Tidak Sesuai!',
            'max_length' => 'Password Terlalu Panjang',
            'min_length' => 'Password Terlalu Pendek',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[8]|max_length[30]|matches[password1]', [
            'matches' => 'Password Tidak Sesuai!',
            'max_length' => 'Password Terlalu Panjang',
            'min_length' => 'Password Terlalu Pendek',
        ]);
        if (!$this->form_validation->run()) {
            $data['title'] = 'Rubah Password';
            $this->load->view('Halaman_web/Templates/kepala', $data);
            $this->load->view('Halaman_web/rubah_password');
            $this->load->view('Halaman_web/Templates/kaki');
        } else {
            $password =  password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('admin');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password berhasil dirubah
              </div>');
            redirect('Auth');
        }
    }
}
