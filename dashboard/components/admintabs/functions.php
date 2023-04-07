<?php
session_start();
require_once('../../server/connect.php');

// Disable direct access
if(!isset($_SERVER['HTTP_REFERER'])){
    header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    exit;
}

/*GENERATE CODE FUNC*/
if (isset($_GET['gencode'])) {
    $id = $_GET['gencode'];
    function getName($n)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
    $codeVar = getName(20);
    mysqli_query($mysqli, "INSERT INTO `invites` (`code`) VALUES ('{$codeVar}')");
    header('location: /dashboard/admin.php?invites');
}
/*GENERATE CODE FUNC*/