<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS' ,'admin');
    define('DB_NAME', 'ITCC-DB');
    class DB_con
    {
        function __construct()
        {
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
            $this->dbh=$con;
            // Check connection
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }
        public function insert($name, $nperson, $timeres, $dateres)
        {
            $ret=mysqli_query($this->dbh,"insert into reservations(cust_name,num_person,time_of_reservation,date_of_reservation,status)
            values('$name', '$nperson', '$timeres', '$dateres', 'Reserved')");
            return $ret;
        }
    }
?>