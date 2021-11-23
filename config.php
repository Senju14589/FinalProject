<?php
/*ข้อมูลรับรองฐานข้อมูล สมมติว่าคุณใช้งาน MySQL
เซิร์ฟเวอร์ที่มีการตั้งค่าเริ่มต้น (ผู้ใช้ 'root' โดยไม่มีรหัสผ่าน) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'crud_oop');
 
/* พยายามเชื่อมต่อกับฐานข้อมูล MySQL */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// ตรวจสอบการเชื่อมต่อ
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>