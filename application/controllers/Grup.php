<?php

class Grup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {
        $data['ps_group'] = $this->fb->db()->getReference('ps_group')->getValue();
        $data['tittle'] = 'PS Grup';
        $data['_view'] = 'grup/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('group_name', 'Group_name', 'required');
        if ($this->form_validation->run()) {
            $data = [
                'group_name' => $this->input->post('group_name'),
            ];
            try {
                //buat ps_group 
                $ref = 'ps_group/';
                $this->fb->db()->getReference($ref)->set($data); //buat ps_group verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('grup/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data ps_group </div>');
            redirect('ps_group/');
        } else {
            $data['tittle'] = 'Tambah Data ps_group';
            $data['_view'] = 'grup/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($uid)
    {
        if ($data['ps_group'] = $this->fb->db()->getReference('ps_group/' . $uid)->getValue()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'required');
            if ($this->form_validation->run()) {
                $params = [];
                try {
                    $updates = [
                        'ps_group/' . $uid => $params
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('name') . ' berhasil di ubah! </div>');
                redirect('ps_group');
            } else {
                $data['tittle'] = 'Edit Data ps_group';
                $data['_view'] = 'grup/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($uid)
    {
        admincek();
        if ($usr = $this->fb->db()->getReference('ps_group/' . $uid)->getValue()) {
            try {
                $this->fb->db()->getReference('ps_group/' . $uid)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('ps_group');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di hapus! </div>');
            redirect('ps_group');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
