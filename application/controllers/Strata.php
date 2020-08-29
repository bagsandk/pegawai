<?php

class Strata extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {
        $data['strata'] = $this->fb->db()->getReference('strata')->getValue();
        $data['tittle'] = 'Strata';
        $data['_view'] = 'strata/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('strata_name', 'Strata_name', 'required');
        if ($this->form_validation->run()) {
            $data = [
                'strata_name' => $this->input->post('strata_name'),
            ];
            try {
                //buat strata 
                $ref = 'strata';
                $this->fb->db()->getReference($ref)->push($data); //buat strata verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('strata/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data strata </div>');
            redirect('strata/');
        } else {
            $data['tittle'] = 'Tambah Data strata';
            $data['_view'] = 'strata/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($id)
    {
        if ($data['strata'] = $this->fb->db()->getReference('strata/' . $id)->getValue()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('strata_name', 'Strata_name', 'required');
            if ($this->form_validation->run()) {
                $params = [
                    'strata_name' => $this->input->post('strata_name'),
                ];
                try {
                    $updates = [
                        'strata/' . $id => $params
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('strata_name') . ' berhasil di ubah! </div>');
                redirect('strata');
            } else {
                $data['tittle'] = 'Edit Data strata';
                $data['data'] = $this->fb->db()->getReference('strata/' . $id)->getValue();
                $data['id'] = $id;
                $data['_view'] = 'strata/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($id)
    {
        admincek();
        if ($dt = $this->fb->db()->getReference('strata/' . $id)->getValue()) {
            try {
                $this->fb->db()->getReference('strata/' . $id)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('strata');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $dt['strata_name'] . ' berhasil di hapus! </div>');
            redirect('strata');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
