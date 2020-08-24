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
                'photoUrl' => base_url('assets/img/profile/default.png'),
                'disabled' => false,
            ];
            $params = array(
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role'),
                'nama' => $this->input->post('name'),
                'verif' => $this->input->post('verif'),
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
                $userProperties = [
                    'email' => $this->input->post('email'),
                    'emailVerified' => false,
                    'displayName' => $this->input->post('name'),
                    'photoUrl' => base_url('assets/img/profile/default.png'),
                    'disabled' => false,
                ];
                $params = array(
                    'email' => $this->input->post('email'),
                    'role' => $this->input->post('role'),
                    'nama' => $this->input->post('name'),
                    'verif' => $this->input->post('verif'),
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
        $ref = 'users/' . $this->session->userdata('id');
        $data['user'] = $this->fb->db()->getReference($ref)->getValue();
        $data['tittle'] = 'Profil';
        $data['_view'] = 'user/profil';
        $this->load->view('layouts/main', $data);
    }
    function verif()
    {
        admincek();
        $uid = $this->uri->segment(3);
        if ($uid) {
            if ($usr = $this->fb->db()->getReference('users/' . $uid)->getValue()) {
                $this->fb->db()->getReference('users/' . $uid)->getChild('verif')->set(true);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di verifikasi! </div>');
                redirect('user/verif');
            } else {
                show_error('Data tidak ada!.');
            }
        }
        $data['users'] = $this->fb->db()->getReference('users')->orderByChild('verif')->equalTo(false)->getValue();
        $data['tittle'] = 'Verifikasi User';
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }
    function delete($uid)
    {
        admincek();
        if ($usr = $this->fb->db()->getReference('users/' . $uid)->getValue()) {
            try {
                $this->fb->db()->getReference('users/' . $uid)->remove();
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
