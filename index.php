<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>



<body>
    </div>
    </style>
    </head>

    <body style="margin-top:20px;">
        <div class="container">
            <ul class="nav nav-pills" id="header">
                <li role="presentation"><a href="welcome.php">ออกจากระบบ</a></li>
            </ul>
        </div>
    </body>

    <div class="container">
        <h1 class="my-5"> สวัสดี Admin <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></h1>
        <h1 class="mt-5">หน้าแก้ไขชื่อพนักงาน</h1>
        <a href="insert.php" class="btn btn-success">เพิ่มรายชื่อพนักงาน</a>
        <hr>
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ตำแหน่งงาน</th>
                <th>Email</th>
                <th>เบอร์โทร</th>
                <th>ที่อยู่</th>
                <th>Posting Date</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </thead>

            <tbody>
                <?php 

                include_once('functions.php');
                $fetchdata = new DB_con();
                $sql = $fetchdata->fetchdata();
                while($row = mysqli_fetch_array($sql)) {

            ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phonenumber']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['postingdate']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a></td>
                    <td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ</a></td>
                </tr>

                <?php 

                }
            ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
</body>


</html>