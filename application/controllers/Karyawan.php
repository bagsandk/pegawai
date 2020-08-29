<?php

class Karyawan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        authcek();
    }
    public function index()
    {
        admincek();
        $data['karyawan'] = $this->fb->db()->getReference('karyawan')->getValue();
        $data['tittle'] = 'Karyawan';
        $data['_view'] = 'karyawan/index';
        $this->load->view('layouts/main', $data);
    }
    public function add()
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('pers_no', 'Pers_no', 'required|numeric');
        $this->form_validation->set_rules('userid', 'Userid', 'required');
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
                'Birth_date' => $this->input->post('mm') . '/' . $this->input->post('dd') . '/' . $this->input->post('yyyy'),
            ];
            try {
                //buat karyawan 
                $ref = 'karyawan/' . $this->input->post('userid');
                $users = 'users/' . $this->input->post('userid');
                $this->fb->db()->getReference($ref)->set($data); //buat karyawan
                $this->fb->db()->getReference($users)->getChild('verif')->set(false); //ubah verif
            } catch (Exception $e) {
                $m = $e->getMessage();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                redirect('karyawan/add');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menambahkan data karyawan </div>');
            redirect('karyawan/');
        } else {
            $data['position']  = $this->fb->db()->getReference('position')->getValue();
            $data['user'] = $this->fb->db()->getReference('users')->orderByChild('verif')->equalTo('2')->getValue();
            $data['unit']  = $this->fb->db()->getReference('unit')->getValue();
            $data['strata']  = $this->fb->db()->getReference('strata')->getValue();
            $data['education']  = $this->fb->db()->getReference('education')->getValue();
            $data['tittle'] = 'Tambah Data Karyawan';
            $data['_view'] = 'karyawan/add';
            $this->load->view('layouts/main', $data);
        }
    }
    public function edit($uid)
    {
        if ($data['karyawan'] = $this->fb->db()->getReference('karyawan/' . $uid)->getValue()) {
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
                $params = [
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
                    'Birth_date' => $this->input->post('mm') . '/' . $this->input->post('dd') . '/' . $this->input->post('yyyy'),
                ];
                try {
                    $updates = [
                        'karyawan/' . $uid => $params
                    ];
                    $this->fb->db()->getReference()->update($updates);
                } catch (Exception $e) {
                    $m = $e->getMessage();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $m . ' </div>');
                    redirect('user');
                }
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ' . $this->input->post('name') . ' berhasil di ubah! </div>');
                redirect('karyawan');
            } else {
                $data['position']  = $this->fb->db()->getReference('position')->getValue();
                $data['unit']  = $this->fb->db()->getReference('unit')->getValue();
                $data['strata']  = $this->fb->db()->getReference('strata')->getValue();
                $data['education']  = $this->fb->db()->getReference('education')->getValue();
                $ref = 'karyawan/' . $uid;
                $data['karyawan'] = $this->fb->db()->getReference($ref)->getValue();
                $data['uid'] = $uid;
                $data['tittle'] = 'Edit Data Karyawan';
                $data['_view'] = 'karyawan/edit';
                $this->load->view('layouts/main', $data);
            }
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function delete($uid)
    {
        admincek();
        if ($usr = $this->fb->db()->getReference('karyawan/' . $uid)->getValue()) {
            try {
                $this->fb->db()->getReference('karyawan/' . $uid)->remove();
            } catch (Exception $e) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Failed' . $e->getMessage() . ' </div>');
                redirect('karyawan');
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $usr['nama'] . ' berhasil di hapus! </div>');
            redirect('karyawan');
        } else {
            show_error('Data tidak ada!.');
        }
    }
    function cetak($uid)
    {
        if ($data['karyawan'] = $this->fb->db()->getReference('karyawan/' . $uid)->getValue()) {
            $data['user'] = $this->fb->db()->getReference('users/' . $uid)->getValue();
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->filename = "laporan-petanikode.pdf";
            $this->pdf->load_view('cetak/pdf', $data);
        } else {
            redirect('karyawan');
        }
    }
}
