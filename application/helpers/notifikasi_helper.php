<?php

function alert_success(string $msg){
    $msg_class = "<div class='alert alert-success'>$msg</div>";
    ci()->session->set_flashdata('msg', $msg_class);
}

function alert_error(string $msg){
    $msg_class = "<div class='alert alert-danger'>$msg</div>";
    ci()->session->set_flashdata('msg', $msg_class);
}