<?php

function request(): Request
{
    ci()->load->library('Request');
    return new Request();
}