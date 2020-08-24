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
        $k = $this->fb->db()->getReference('karyawan')->getValue();
        $pim = $this->fb->db()->getReference('karyawan')->orderByChild('Employee_Group')->equalTo('Karpim - Tetap')->getValue();
        $pel = $this->fb->db()->getReference('karyawan')->orderByChild('Employee_Group')->equalTo('Karpel - Tetap')->getValue();
        $tt = $this->fb->db()->getReference('karyawan')->orderByChild('Employee_Group')->equalTo('Tidak - Tetap')->getValue();
        $data['karyawan'] = count($k);
        $data['karpim'] = count($pim);
        $data['karpel'] = count($pel);
        $data['tt'] = count($tt);
        $data['tittle'] = 'Dashboard';
        $data['_view'] = 'dashboard/index';
        $this->load->view('layouts/main', $data);
    }
}
