
<?php
if (!function_exists('admincek')) {

    function admincek()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if (!$CI->session->has_userdata('id')) {
            redirect('auth');
        }
        if ($CI->session->userdata('role') == 'user') {
            show_404();
        }
    }
    function authcek()
    {
        $CI = &get_instance();
        $CI->load->library('session');
        if (!$CI->session->has_userdata('token')) {
            redirect('auth');
        }
    }
}
