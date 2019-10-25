<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect(base_url());
    } else {
        // if($ci->session->userdata('role_id'))  //cek role id apakah user atau admin pake segment uri
    }
}
