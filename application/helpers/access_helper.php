<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect(base_url());
    }
}
function is_admin()
{
    $ci = get_instance();

    if ($ci->session->userdata('role_id') != 1) {
        redirect(base_url());
    }
}
