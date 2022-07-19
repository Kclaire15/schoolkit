<?php

    function connection(){

        //databaseconnection
        $host = "localhost";
        $username = "root";
        $password = "123456";
        $database = "student_system";

        $con = new mysqli($host, $username, $password, $database);

        if ($con->connect_error) {
            echo $con ->connect_error;
        } else{

            return $con;
        }

    }