<?php

function __output_header__($__success = true, $__message = null, $_dados = array()){
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(array(
        'status' => $__success,
        'message' => $__message,
        'dados' => $_dados
    ));
    exit();
}

?>