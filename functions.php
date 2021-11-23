<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'crud_oop');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }
        //หน้าเพิ่มข้อมูล
        public function insert($firstname, $lastname, $position, $email, $phonenumber,	$address) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tblusers(firstname, lastname, position, email, phonenumber, address) VALUES('$firstname', '$lastname', '$position', '$email', '$phonenumber', '$address')");
            return $result;
        }
        
        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }
        //อัพเดตข้อมูล
        public function update($firstname, $lastname, $position, $email, $phonenumber,	$address, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                firstname = '$firstname',
                lastname = '$lastname',
                position = '$position',
                email = '$email',
                phonenumber = '$phonenumber',
                address = '$address'
                WHERE id = '$userid'
            ");
            return $result;
        }
        //ลบข้อมูล
        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

    }
    

?>