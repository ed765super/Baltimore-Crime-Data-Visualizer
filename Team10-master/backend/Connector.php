<?php

/*
 * Connector.php
 * Author: Team 10
 * This file obtains the connection with the database via PDO.
 */

class Connector {

    /**
     * @var PDO
     */
    private $conn;
    private $dsn = 'mysql:host=localhost;dbname=team10;port=3306';

    private $username = 'root';
    private $password = '';
    private $ec2keyPath = 'C:/';
    private $ec2key = 'Team10.pem';
    private $ssh = 'ec2-user@54.166.56.44';
    private $ec2Username = 'ec2user';

    public function connect() {
        $this->conn = null;
        //Below is only needed when trying to run locally rather than on the server
        //shell_exec("ssh -i $this->ec2keyPath$this->ec2key -L 33060:localhost:22 $this->ssh");

        try{
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            //echo "Connected! \n\n";
        } catch (PDOException $error) {
            echo 'Error. ' . $error;
        }

        return $this->conn;
    }


}