<?php

class Position extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {
        $data['position'] = $this->fb->db()->getReference('position')->getValue();
        $data['tittle'] = 'Position';
        $data['_view'] = 'position/index';
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
                $ref = 'position';
                $this->fb->db()->getReference($ref)->push($data); //buat position verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('position/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data position </div>');
            redirect('position/');
        } else {
            $data['tittle'] = 'Tambah Data Position';
            $data['_view'] = 'position/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($id)
    {
        if ($data['position'] = $this->fb->db()->getReference('position/' . $id)->getValue()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('position_name', 'Position_name', 'required');
            if ($this->form_validation->run()) {
                $params = [
                    'position_name' => $this->input->post('position_name'),
                ];
                try {
                    $updates = [
                        'position/' . $id => $params
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('position_name') . ' berhasil di ubah! </div>');
                redirect('position');
            } else {
                $data['tittle'] = 'Edit Data Position';
                $data['data'] = $this->fb->db()->getReference('position/' . $id)->getValue();
                $data['id'] = $id;
                $data['_view'] = 'position/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($id)
    {
        admincek();
        if ($dt = $this->fb->db()->getReference('position/' . $id)->getValue()) {
            try {
                $this->fb->db()->getReference('position/' . $id)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('position');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $dt['position_name'] . ' berhasil di hapus! </div>');
            redirect('position');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
