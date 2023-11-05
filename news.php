<?php
   include 'config.php';

   session_start();

   $user_id = $_SESSION['user_id']; //tạo session người dùng thường

   if(!isset($user_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tin tức</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <style>
    .new-item {
        display: flex;
        gap: 39px;
        padding: 17px;
        border-bottom: 1px solid #ddd;
    }
    .new-item-img {
        border-radius: 5px;
    }
    .new-item-content {
        font-size: 22px;
        font-weight: 600;
    }
   </style>
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <p> <a href="home.php">Trang chủ</a> / Tin tức </p>
</div>

<section class="news">
    <?php  
         $select_news = mysqli_query($conn, "SELECT * FROM `news`") or die('query failed');
         if(mysqli_num_rows($select_news) > 0){
            while($fetch_news = mysqli_fetch_assoc($select_news)){
    ?>
    <div class="new-item">
        <div>
            <img class="new-item-img" width="370px" height="200px" src="./uploaded_img/<?php echo($fetch_news['image'])  ?>" alt="">
        </div>
        <div>
            <p class="new-item-content"><?php echo($fetch_news['content'])  ?></p>
        </div>
    </div>
    <?php
            }
         }else{
            echo '<p class="empty">Chưa có tin tức được đăng!</p>';
         }
      ?>
</section>

<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>