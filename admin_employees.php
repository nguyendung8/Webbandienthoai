<?php

   include 'config.php';

   session_start();

   $admin_id = $_SESSION['admin_id']; //tạo session admin

   if(!isset($admin_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_POST['add_employee'])){//thêm sách mới từ submit form name='add_employee'

      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $gender = mysqli_real_escape_string($conn, $_POST['gender']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone']);
      $address = mysqli_real_escape_string($conn, $_POST['address']);

      $select_employee_name = mysqli_query($conn, "SELECT name FROM `employees` WHERE name = '$name'") or die('query failed');//truy vấn kiểm tra nhân viên đã tồn tại chưa

      if(mysqli_num_rows($select_employee_name) > 0){
         $message[] = 'Nhân viên đã tồn tại.';
      }else{//chưa thì thêm mới
         $add_employee_query = mysqli_query($conn, "INSERT INTO `employees`(name, gender, email, phone, address ) VALUES('$name', '$gender', '$email', '$phone', '$address' )") or die('query failed');
               $message[] = 'Thêm nhân viên thành công!';
      }
   }

   if(isset($_GET['delete'])){//xóa nhân viên từ onclick href='delete'
      $delete_id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM `employees` WHERE id = '$delete_id'") or die('query failed');
      header('location:admin_employees.php');
   }

   if(isset($_POST['update_employee'])){//cập nhật nhân viên từ form submit name='update_employee'

      $update_employee_id = $_POST['update_employee_id'];
      $update_name = $_POST['update_name'];
      $update_gender = $_POST['update_gender'];
      $update_email = $_POST['update_email'];
      $update_phone = $_POST['update_phone'];
      $update_address = $_POST['update_address'];

      mysqli_query($conn, "UPDATE `employees` SET name = '$update_name',  gender = '$update_gender', email = '$update_email', phone = '$update_phone', address = '$update_address'   WHERE id = '$update_employee_id'") or die('query failed');

      header('location:admin_employees.php');

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nhân viên</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">
   <link rel="stylesheet" href="./css/admin.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="add-products">

   <h1 class="title">Nhân viên</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>Thêm nhân viên</h3>
      <input type="text" name="name" class="box" placeholder="Tên nhân viên" required>
      <input type="text" name="gender" class="box" placeholder="Giới tính" required>
      <input type="email" name="email" class="box" placeholder="Email" required>
      <input type="text" name="phone" class="box" placeholder="Số điện thoại" required>
      <input type="text" name="address" class="box" placeholder="Địa chỉ" required>
      <input type="submit" value="Thêm" name="add_employee" class="btn">
   </form>

</section>
<section class="users">
   <div class="box-container">
      <?php
         $select_employees = mysqli_query($conn, "SELECT * FROM `employees`") or die('query failed');
         while($fetch_employees = mysqli_fetch_assoc($select_employees)){
      ?>
      <div class="box">
         <p> Tên nhân viên : <span><?php echo $fetch_employees['name']; ?></span> </p>
         <p> Giới tính : <span><?php echo $fetch_employees['gender']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_employees['email']; ?></span> </p>
         <p> SDT : <span><?php echo $fetch_employees['phone']; ?></span> </p>
         <p> Địa chỉ : <span><?php echo $fetch_employees['address']; ?></span> </p>
         <a href="admin_employees.php?update=<?php echo $fetch_employees['id']; ?>" class="option-btn">Cập nhật</a>
         <a href="admin_employees.php?delete=<?php echo $fetch_employees['id']; ?>" onclick="return confirm('Xóa nhân viên này?');" class="delete-btn">Xóa</a>
      </div>
      <?php
         }
      ?>
   </div>
</section>

<section class="edit-product-form">

   <?php
      if(isset($_GET['update'])){//hiện form update từ onclick <a></a> href='update'
         $update_id = $_GET['update'];
         $update_query = mysqli_query($conn, "SELECT * FROM `employees` WHERE id = '$update_id'") or die('query failed');
         if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
   ?>
               <form action="" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="update_employee_id" value="<?php echo $fetch_update['id']; ?>">
                  <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="Tên nhân viên">
                  <input type="text" name="update_gender" value="<?php echo $fetch_update['gender']; ?>" class="box" required placeholder="Giới tính">
                  <input type="email" name="update_email" value="<?php echo $fetch_update['email']; ?>" class="box" required placeholder="Email">
                  <input type="text" name="update_phone" value="<?php echo $fetch_update['phone']; ?>" class="box" required placeholder="Số điện thoại">
                  <input type="text" name="update_address" value="<?php echo $fetch_update['address']; ?>" class="box" required placeholder="Địa chỉ">
                  <input type="submit" value="update" name="update_employee" class="btn">
                  <a href="./admin_employees.php"> <p class="option-btn">Cancel</p></a>
               </form>
   <?php
            }
         }
      }else{
         echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
      }
   ?>

</section>
<script src="js/admin_script.js"></script>

</body>
</html>