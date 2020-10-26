<?php

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        admincek();
    }
    public function index()
    {
        try {
            //all karyawan
            $data['karyawan'] = $this->fb->db()->getReference('karyawan')->getSnapshot()->numChildren();
            //karpim
            $data['karpim'] = $this->fb->db()->getReference('karyawan')->orderByChild('Employee_Group')->equalTo('Karpim - Tetap')->getSnapshot()->numChildren();
            //karpel
            $data['karpel'] =  $this->fb->db()->getReference('karyawan')->orderByChild('Employee_Group')->equalTo('Karpel - Tetap')->getSnapshot()->numChildren();
            //tidak tetap
            $data['tt'] = $this->fb->db()->getReference('karyawan')->orderByChild('Employee_Group')->equalTo('Tidak Tetap')->getSnapshot()->numChildren();
            //strata..................................
            //juru
            $data['juru'] = $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Juru')->getSnapshot()->numChildren();
            //pelaksana
            $data['pelaksana'] = $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Pelaksana')->getSnapshot()->numChildren();
            //pembina
            $data['pembina'] =  $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Pembina')->getSnapshot()->numChildren();
            //penata
            $data['penata'] = $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Penata')->getSnapshot()->numChildren();
            //pengatur
            $data['pengatur'] = $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Pengatur')->getSnapshot()->numChildren();
            //penyelia madya
            $data['pm'] = $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Penyelia Madya')->getSnapshot()->numChildren();
            //penyelia pratama
            $data['pp'] =  $this->fb->db()->getReference('karyawan')->orderByChild('Strata')->equalTo('Penyelia Pratama')->getSnapshot()->numChildren();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $data['tittle'] = 'Dashboard';
        $data['_view'] = 'dashboard/index';
        $this->load->view('layouts/main', $data);
    }
}
