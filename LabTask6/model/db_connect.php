<?php 
    function connect() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "labtask";
        $ezl = new mysqli($server, $username, $password, $database);

        if ($ezl->connect_error) {
            die("Data base Connection failed: " . $ezl->connect_error);
        }

        return $ezl;
    }
?>