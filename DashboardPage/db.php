<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'SAKU';

    $con = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung dengan database!')
?>