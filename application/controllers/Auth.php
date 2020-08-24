<?php
class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->has_userdata('id')) {
            redirect('dashboard');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            try {
                $auth = $this->fb->auth()->signInWithEmailAndPassword($email, $password);
                $user = obj_to_arr($auth);
                $data = $user['data'];
                $u = $this->fb->db()->getReference('users/' . $data['localId'])->getValue();
                if ($u == null) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Tidak di Temukan </div>');
                    redirect('auth');
                } else {
                    $d_session = [
                        'token' => $data['idToken'],
                        'name' => $data['displayName'],
                        'email' => $data['email'],
                        'id' => $data['localId'],
                        'verif' => $u['verif'],
                        'role' => $u['role']
                    ];
                    $this->session->set_userdata($d_session);
                    if ($u['verif'] == false) {
                        redirect('user/profil');
                    } else {
                        redirect('Dashboard');
                    }
                }
            } catch (Exception $e) {
                echo $m = $e->getMessage();
                if ($m == "USER_DISABLED") {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Anda Belum Aktif! </div>');
                    redirect('auth');
                } else if ($m == "INVALID_PASSWORD") {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah </div>');
                    redirect('auth');
                } else if ($m == "EMAIL_NOT_FOUND") {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar! </div>');
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('auth');
                }
            }
        } else {
            $data['tittle'] = 'Selamat datang silahkan login';
            $data['_view'] = 'auth/index';
            $this->load->view('layouts/auth', $data);
        }
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[13]|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required');

        if ($this->form_validation->run()) {

            $userProperties = [
                'email' => $this->input->post('email'),
                'emailVerified' => false,
                'phoneNumber' => '+62' . $this->input->post('phone'),
                'password' => $this->input->post('password'),
                'displayName' => $this->input->post('name'),
                'photoUrl' => base_url('assets/img/profile/default.png'),
                'disabled' => true,
            ];
            $params = array(
                'email' => $this->input->post('email'),
                'role' => 'user',
                'nama' => $this->input->post('name'),
                'verif' => false,
            );
            try {
                //buat auth
                $post = $this->fb->auth()->createUser($userProperties);
                $t = (array)$post; //ambil uid dari auth
                $ref = 'users/' . $t['uid'];
                $this->fb->db()->getReference($ref)->set($params); //buat db users
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('auth/register');
            }
            $this->session->set_userdata(['uid' => $t['uid']]);
            redirect('auth/registerlanjut');
        } else {
            $data['tittle'] = 'Register Account';
            $data['_view'] = 'auth/register';
            $this->load->view('layouts/auth', $data);
        }
    }
    public function registerlanjut()
    {
        if (!$this->session->has_userdata('uid')) {
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pers_no', 'ers_no', 'required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('position', 'Position', 'required');
        $this->form_validation->set_rules('unit', 'Unit', 'required');
        $this->form_validation->set_rules('pers_area', 'Pers_area', 'required');
        $this->form_validation->set_rules('pers_subarea', 'Pers_subarea', 'required');
        $this->form_validation->set_rules('ps_group', 'Ps_group', 'required');
        $this->form_validation->set_rules('lv', 'Lv', 'required');
        $this->form_validation->set_rules('strata', 'Strata', 'required');
        $this->form_validation->set_rules('emp_group', 'Emp_group', 'required');
        $this->form_validation->set_rules('education', 'Education', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('dd', 'DD', 'required|numeric');
        $this->form_validation->set_rules('mm', 'MM', 'required|numeric');
        $this->form_validation->set_rules('yyyy', 'YYYY', 'required|numeric');
        if ($this->form_validation->run()) {
            $data = [
                'Pers_No' => $this->input->post('pers_no'),
                'Personnel_Number' => $this->input->post('name'),
                'Position' => $this->input->post('position'),
                'Organizational_Unit' => $this->input->post('unit'),
                'Personnel_Area' => $this->input->post('pers_area'),
                'Personnel_Subarea' => $this->input->post('pers_subarea'),
                'PS_group' => $this->input->post('ps_group'),
                'Lv' => $this->input->post('lv'),
                'Strata' => $this->input->post('strata'),
                'Employee_Group' => $this->input->post('emp_group'),
                'Education' => $this->input->post('education'),
                'Gender_Key' => $this->input->post('gender'),
                'Birth_date' => $this->input->post('dd') . '/' . $this->input->post('mm') . '/' . $this->input->post('yyyy'),
            ];
            try {
                //buat auth
                $ref = 'karyawan/' . $this->session->userdata('uid');
                $this->fb->db()->getReference($ref)->set($data); //buat db users
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('auth/registerlanjut');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil membuat akun </div>');
            $this->session->unset_userdata('uid');
            redirect('auth');
        } else {
            $data['position']  = $this->fb->db()->getReference('position')->getValue();
            $data['unit']  = $this->fb->db()->getReference('unit')->getValue();
            $data['strata']  = $this->fb->db()->getReference('strata')->getValue();
            $data['ps_group']  = $this->fb->db()->getReference('ps_group')->getValue();
            $data['tittle'] = 'Register Account';
            $data['_view'] = 'auth/lanjut';
            $this->load->view('layouts/auth', $data);
        }
    }
    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('token');
        // $this->session->unset_userdata('foto');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('verif');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout! </div>');
        redirect('auth');
    }
}
