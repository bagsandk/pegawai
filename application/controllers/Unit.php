<?php

class Unit extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {
        $data['unit'] = $this->fb->db()->getReference('unit')->getValue();
        $data['tittle'] = 'Unit';
        $data['_view'] = 'unit/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('unit_name', 'Unit_name', 'required');
        if ($this->form_validation->run()) {
            $data = [
                'unit_name' => $this->input->post('unit_name'),
            ];
            try {
                //buat unit 
                $ref = 'unit';
                $this->fb->db()->getReference($ref)->push($data); //buat unit verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('unit/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data unit </div>');
            redirect('unit/');
        } else {
            $data['tittle'] = 'Tambah Data Unit';
            $data['_view'] = 'unit/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($id)
    {
        if ($data['unit'] = $this->fb->db()->getReference('unit/' . $id)->getValue()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('unit_name', 'Unit_name', 'required');
            if ($this->form_validation->run()) {
                $params = [
                    'unit_name' => $this->input->post('unit_name'),
                ];
                try {
                    $updates = [
                        'unit/' . $id => $params
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('unit_name') . ' berhasil di ubah! </div>');
                redirect('unit');
            } else {
                $data['tittle'] = 'Edit Data Unit';
                $data['data'] = $this->fb->db()->getReference('unit/' . $id)->getValue();
                $data['id'] = $id;
                $data['_view'] = 'unit/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($id)
    {
        admincek();
        if ($dt = $this->fb->db()->getReference('unit/' . $id)->getValue()) {
            try {
                $this->fb->db()->getReference('unit/' . $id)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('unit');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $dt['unit_name'] . ' berhasil di hapus! </div>');
            redirect('unit');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
