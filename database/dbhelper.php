<?php
    require_once('config.php');

    // insert, update, delete, select
    // SQL: insert, update, delete
    function execute($sql) {
        // open connection
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');

        // query
        mysqli_query($conn, $sql);

        // close connection
        mysqli_close($conn);
        echo($sql);
        Echo $fullname.'<br/>'.$email.'<br/>'.$pwd;
    }

    // SQL: select -> lay du lieu dau ra
    function executeResult($sql, $isSingle = false) {
        $data = null;

        // open connection
        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_set_charset($conn, 'utf8');

        // query
        $resultset = mysqli_query($conn, $sql);
        if($isSingle) {
            $data = mysqli_fetch_array($resultset, 1);
        } else {
            $data = [];
            while(($row = mysqli_fetch_array($resultset, 1)) != null) {
                $data[] = $row;
            }
        }
        echo($sql);
        // close connection
        mysqli_close($conn);

        return $data;
    }
?>