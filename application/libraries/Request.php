<?php

class Request{

    public function input($index){
        $input = ci()->input->post($index);
        return html_escape($input);
    }
}