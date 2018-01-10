<?php

$act = isset($_GET['act'])?$_GET['act']:'';

function sendsave($flag='') {
    $data = isset($_POST['data'])?$_POST['data']:'';
    if (!empty($data)) {
        if ($flag=='add') {
            file_put_contents('/tmp/sendsave', $data . "\n" , FILE_APPEND);
        } else {
            file_put_contents('/tmp/sendsave', $data . "\n");
        }
    }
    exit('ok');
}

$run_map = [
    'send' => function() {
        sendsave();
    },

    'sendadd' => function() {
        sendsave('add');
    }
];

if (isset($run_map[$act])) {
    $run_map[$act]();

} else {
    exit('error: unknow handle');
}

