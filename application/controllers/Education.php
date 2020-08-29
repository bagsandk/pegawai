<?php

class Education extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {
        $data['education'] = $this->fb->db()->getReference('education')->getValue();
        $data['tittle'] = 'Education';
        $data['_view'] = 'education/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('education_name', 'Education_name', 'required');
        if ($this->form_validation->run()) {
            $data = [
                'education_name' => $this->input->post('education_name'),
            ];
            try {
                //buat education 
                $ref = 'education';
                $this->fb->db()->getReference($ref)->push($data); //buat education verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('education/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data education </div>');
            redirect('education/');
        } else {
            $data['tittle'] = 'Tambah Data Education';
            $data['_view'] = 'education/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($id)
    {
        if ($data['education'] = $this->fb->db()->getReference('education/' . $id)->getValue()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('education_name', 'Education_name', 'required');
            if ($this->form_validation->run()) {
                $params = [
                    'education_name' => $this->input->post('education_name'),
                ];
                try {
                    $updates = [
                        'education/' . $id => $params
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('education_name') . ' berhasil di ubah! </div>');
                redirect('education');
            } else {
                $data['tittle'] = 'Edit Data Education';
                $data['data'] = $this->fb->db()->getReference('education/' . $id)->getValue();
                $data['id'] = $id;
                $data['_view'] = 'education/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($id)
    {
        admincek();
        if ($dt = $this->fb->db()->getReference('education/' . $id)->getValue()) {
            try {
                $this->fb->db()->getReference('education/' . $id)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('education');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $dt['education_name'] . ' berhasil di hapus! </div>');
            redirect('education');
        } else {
            show_error('Data tidak ada!.');
        }
    }
}
