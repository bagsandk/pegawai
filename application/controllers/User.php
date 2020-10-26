<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        authcek();
    }
    public function index()
    {
        admincek();
        $val = array();
        $users = $this->fb->auth()->listUsers(1000, 1000);
        foreach ($users as $user) {
            $val[] = obj_to_arr($user);
        }
        $u = $this->fb->db()->getReference('users')->getValue();
        $data['users'] = $u;
        $data['tittle'] = 'User';
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        admincek();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');
        $this->form_validation->set_rules('phone', 'Phone', 'max_length[13]|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('verif', 'Verif', 'required');

        if ($this->form_validation->run()) {
            $userProperties = [
                'email' => $this->input->post('email'),
                'emailVerified' => false,
                'password' => $this->input->post('password'),
                'displayName' => $this->input->post('name'),
                'phoneNumber' => '+62' . $this->input->post('phone'),
                'photoUrl' => 'default.png',
                'disabled' => false,
            ];
            $params = array(
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
                'nama' => $this->input->post('name'),
                'verif' => $this->input->post('verif'),
                'phonenumber' =>  $this->input->post('phone'),
                'photourl' =>  'default.png',
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
                redirect('user');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data' . $this->input->post('name') . ' berhasil ditambahkan! </div>');
            redirect('user');
        } else {
            $data['tittle'] = 'Tambah Data User';
            $data['_view'] = 'user/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($uid)
    {
        admincek();
        $data['user'] = $this->fb->db()->getReference('users/' . $uid)->getValue();
        if (isset($data['user'])) {
            $this->load->library('form_validation');
            if ($this->input->post('password') !== "") {
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            }
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]');
            $this->form_validation->set_rules('phone', 'Phone', 'max_length[13]|numeric');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('role', 'Role', 'required');
            $this->form_validation->set_rules('verif', 'Verif', 'required');
            if ($this->form_validation->run()) {
                if (isset($data['user']['photourl'])) {
                    $foto = $data['user']['photourl'];
                } else {
                    $foto = 'default.png';
                }
                $userProperties = [
                    'email' => $this->input->post('email'),
                    'emailVerified' => false,
                    'displayName' => $this->input->post('name'),
                    'photoUrl' => $foto,
                    'phoneNumber' => '+62' . $this->input->post('phone'),
                    'disabled' => false,
                ];
                $params = array(
                    'email' => $this->input->post('email'),
                    'role' => $this->input->post('role'),
                    'nama' => $this->input->post('name'),
                    'verif' => $this->input->post('verif'),
                    'phonenumber' => $this->input->post('phone'),
                    'photourl' => $foto,
                );
                $updates = [
                    'users/' . $uid => $params
                ];
                try {
                    if ($this->input->post('password') !== "") {
                        $this->fb->auth()->changeUserPassword($uid, $this->input->post('password'));
                    }
                    $post = $this->fb->auth()->updateUser($uid, $userProperties);
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('name') . ' berhasil di ubah! </div>');
                redirect('user');
            } else {
                $data['uid'] = $uid;
                $data['tittle'] = 'Edit Data User';
                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function profil()
    {
        if ($this->session->userdata('verif') === '2') {
            redirect('auth/registerlanjut');
        }
        $this->load->library('form_validation');
        $uid = $this->session->userdata('id');
        if (isset($_POST['bpassword'])) {
            $this->form_validation->set_rules('newpass', 'Newpass', 'required|min_length[6]|trim');
            try {
                $this->fb->auth()->changeUserPassword($uid, $this->input->post('newpass'));
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('user/profil');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil di ubah! </div>');
            redirect('user/profil');
        } else if (isset($_POST['bprofil'])) {
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[100]');
            $this->form_validation->set_rules('phone', 'Phone', 'max_length[13]|numeric');
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run()) {
                $userProperties = [
                    'email' => $this->input->post('email'),
                    'phoneNumber' => '+62' . $this->input->post('phone'),
                    'displayName' => $this->input->post('name'),
                ];
                try {
                    $this->fb->auth()->updateUser($uid, $userProperties);
                    $this->fb->db()->getReference('users/' . $uid)->getChild('phonenumber')->set($this->input->post('phone'));
                    $this->fb->db()->getReference('users/' . $uid)->getChild('email')->set($this->input->post('email'));
                    $this->fb->db()->getReference('users/' . $uid)->getChild('nama')->set($this->input->post('name'));
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user/profil');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('name') . ' berhasil di ubah! </div>');
                redirect('user/profil');
            } else {
                redirect('user/profil');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data tidak ada </div>');
            }
        } else if (isset($_POST['bfoto'])) {
            if (isset($_FILES["photo"])) {
                $config['upload_path'] = './assets/img/profil/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2000';
                $this->load->library('upload', $config);
                $data = $this->fb->db()->getReference('users/' . $uid)->getValue();
                if ($this->upload->do_upload('photo')) {
                    $new = $this->upload->data('file_name');
                    $foto_lama = $data['photourl'];
                    if ($foto_lama != 'default.png') {
                        unlink(FCPATH . 'assets/img/profil/' . $foto_lama);
                    }
                    try {
                        $this->fb->db()->getReference('users/' . $uid)->getChild('photourl')->set($new);
                    } catch (Exception $e) {
                        $m = $e->getMessage();
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                        redirect('user/profil');
                    }
                    $this->session->set_userdata('foto', $new);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Foto berhasil diperbarui!</div>');
                    redirect('user/profil');
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                redirect('user/profil');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data foto tidak ada </div>');
            }
        } else {
            $ref = 'users/' . $uid;
            $data['user'] = $this->fb->db()->getReference($ref)->getValue();
            $data['tittle'] = 'Profil';
            $data['_view'] = 'user/profil';
            $this->load->view('layouts/main', $data);
        }
    }
    function verif()
    {
        admincek();
        $uid = $this->uri->segment(3);
        if ($uid) {
            if ($usr = $this->fb->db()->getReference('users/' . $uid)->getValue()) {
                $this->fb->db()->getReference('users/' . $uid)->getChild('verif')->set('1');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di verifikasi! </div>');
                redirect('user/verif');
            } else {
                show_error('Data tidak ada!.');
            }
        }
        $data['users'] = $this->fb->db()->getReference('users')->orderByChild('verif')->equalTo('0')->getValue();
        $data['tittle'] = 'Verifikasi User';
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }
    function tolak($uid)
    {
        admincek();
        if ($usr = $this->fb->db()->getReference('users/' . $uid)->getValue()) {
            try {
                $this->fb->db()->getReference('users/' . $uid)->remove();
                $this->fb->db()->getReference('karyawan/' . $uid)->remove();
                $this->fb->auth()->deleteUser($uid);
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('user');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di tolak! </div>');
            redirect('user/verif');
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($uid)
    {
        admincek();
        if ($usr = $this->fb->db()->getReference('users/' . $uid)->getValue()) {
            try {
                $this->fb->db()->getReference('users/' . $uid)->remove();
                $this->fb->db()->getReference('karyawan/' . $uid)->remove();
                $this->fb->auth()->deleteUser($uid);
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('user');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di hapus! </div>');
            redirect('user');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
