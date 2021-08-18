<?php
    // GET - POST - http request
    // Test GET\
    // https://coccoc.com/search?query=123   -> phương thức GET, trường ở đây là query, giá trị của trường query là 123
    /*
    if ( !isset($_GET['value']) || !isset($_GET['value2']) )
        return;

    $a = intval($_GET['value']);
    $b = intval($_GET['value2']);
    echo $a + $b;
    */
    // Test POST
    // POST giống GET nhưng gửi dữ liệu dạng ẩn
    /*
    if ( !isset($_POST['value']) || !isset($_POST['value2']))
        return;
    
    $a = intval($_POST['value']);
    $b = intval($_POST['value2']);
    echo $a + $b;
    */
    $input = file_get_contents('php://input');
    if ($input=="")
        return;
    $json = json_decode($input, true);
    echo $json["input1"];

?>