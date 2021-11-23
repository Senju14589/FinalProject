<?php
// เริ่มต้นเซสชัน
session_start();
 
// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบแล้วถ้าใช่จากนั้นเปลี่ยนเส้นทางไปที่หน้ายินดีต้อนรับ
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
// รวมไฟล์ config
require_once "config.php";
 
// กำหนดตัวแปรและเริ่มต้นด้วยค่าว่าง
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// การประมวลผลข้อมูลแบบฟอร์มเมื่อส่งแบบฟอร์ม
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // ตรวจสอบว่าชื่อผู้ใช้ว่างเปล่า
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // ตรวจสอบว่ารหัสผ่านว่างเปล่า
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // ตรวจสอบข้อมูลรับรอง
    if(empty($username_err) && empty($password_err)){
        // เตรียมคำสั่งเลือก
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // ผูกตัวแปรกับคำสั่งที่เตรียมไว้เป็นพารามิเตอร์
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // ตั้งค่าพารามิเตอร์
            $param_username = $username;
            
            // พยายามดำเนินการตามคำสั่งที่เตรียมไว้
            if(mysqli_stmt_execute($stmt)){
                // ผลการจัดเก็บ
                mysqli_stmt_store_result($stmt);
                
                // ตรวจสอบว่ามีชื่อผู้ใช้อยู่หรือไม่ถ้าใช่จากนั้นยืนยันรหัสผ่าน
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // ผูกตัวแปรผลลัพธ์
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // รหัสผ่านถูกต้องจึงเริ่มเซสชันใหม่
                            session_start();
                            
                            // จัดเก็บข้อมูลในตัวแปรเซสชัน
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // เปลี่ยนเส้นทางผู้ใช้ไปยังหน้ายินดีต้อนรับ
                            header("location: index.php");
                        } else{
                            // รหัสผ่านไม่ถูกต้องแสดงข้อความแสดงข้อผิดพลาดทั่วไป
                            $login_err = "Username หรือ รหัสผ่านไม่ถูกต้อง";
                        }
                    }
                } else{
                    // ไม่มีชื่อผู้ใช้แสดงข้อความแสดงข้อผิดพลาดทั่วไป
                    $login_err = "Username หรือ รหัสผ่านไม่ถูกต้อง";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // ปิดคำสั่ง
            mysqli_stmt_close($stmt);
        }
    }
    
    // ปิดคำสั่ง
    mysqli_close($link);
}
?>
<center>

    <body>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <title>เข้าสู่ระบบ</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <style>
            body {
                font: 14px sans-serif;
            }

            .wrapper {
                width: 350px;
                padding: 20px;
            }
            </style>
        </head>

        <body>


            <div class="wrapper">
                <h2>เข้าสู่ระบบ</h2>
                <p>กรุณากรอกรหัสของคุณเพื่อเข้าสู่ระบบ</p>

                <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username"
                            class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                            value="<?php echo $username; ?>">
                        <span class="invalid-feedback"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password"
                            class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">

                    </div>
                    <p>สมัครบัญชีผู้ใช้ใหม่ <a href="register.php">คลิ๊ก</a>.</p>
                </form>
            </div>
        </body>

        </html>
    </body>
</center>