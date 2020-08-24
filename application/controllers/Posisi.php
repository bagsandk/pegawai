<?php

class Posisi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {

        $data['posisi'] = $this->fb->db()->getReference('position')->getValue();
        $data['tittle'] = 'Posisi';
        $data['_view'] = 'posisi/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('position_name', 'Position_name', 'required');
        if ($this->form_validation->run()) {
            $data = [
                'position_name' => $this->input->post('position_name'),
            ];
            try {
                //buat position 
                $ref = 'position/';
                $this->fb->db()->getReference($ref)->set($data); //buat position verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('position/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data position </div>');
            redirect('position/');
        } else {
            $data['tittle'] = 'Tambah Data position';
            $data['_view'] = 'posisi/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($uid)
    {
        if ($data['position'] = $this->fb->db()->getReference('position/' . $uid)->getValue()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('position_name', 'Position_name', 'required');
            if ($this->form_validation->run()) {
                $data = [
                    'position_name' => $this->input->post('position_name'),
                ];
                try {
                    $updates = [
                        'position/' . $uid => $data
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('name') . ' berhasil di ubah! </div>');
                redirect('position');
            } else {
                $data['tittle'] = 'Edit Data position';
                $data['_view'] = 'posisi/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($uid)
    {
        admincek();
        if ($usr = $this->fb->db()->getReference('position/' . $uid)->getValue()) {
            try {
                $this->fb->db()->getReference('position/' . $uid)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('position');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di hapus! </div>');
            redirect('position');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
