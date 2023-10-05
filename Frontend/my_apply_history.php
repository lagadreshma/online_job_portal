<?php

session_start();

require_once("connection.php");

if(!isset($_SESSION['IS_LOGIN'])){

  echo "<script> window.location.href = 'login.php'; </script>";
  
}

if(isset($_SESSION['id'])){

$username = $_SESSION['username'];
$user_id = $_SESSION['id'];
$user_name = $_SESSION['fullname'];
$user_email = $_SESSION['email'];
$user_mobile = $_SESSION['mobile'];


}


?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Online Job Portal Website">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP , MySQL">
    <meta name="author" content="Reshma Lagad">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit= no">

    <title> Online Job Portal </title>

    <!-- Matrial Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- CSS File Link -->
    <link rel="stylesheet" href="style.css">

    <!-- Font awesome icon link -->      
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Swipper JavaScript - swipperjs.com -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

  </head>

  <body>

    <!-- Navigation Bar -->

      <section class="header home">

        <nav>

        <div class="logo">
              <img src="images1/jobportallogo.jpg" alt="" width="50px" height="50px" style="border-radius:50%;">
              <h2>naukri<span>4U</span></h2>
        </div>

          <div class="navbar" id = "navlinks">
          
             <i class = "fa fa-times" onclick= "show();"></i>

               <ul id = "MenuItems">
                 <li><a href="home.php"> Home </a></li>
                 <li><a href="job_posts.php"> Find a Jobs </a></li>
                 <li><a href="contact_us.php"> Contact Us </a></li>
                 <li><a href=""><?php echo $username; ?><i class="fa-solid fa-caret-down"></i></a>
                 <div class="dropdown">
                 <ul>
                    <li><a href="my_profile.php">My Profile</a></li>
                    <li><a href="my_apply_history.php">Apply History</a></li>
                 </ul>
                 </div>
                 </li>
                 <li><a href="logout.php">Logout</a></li>

               </ul>

          </div>


             <i class = "fa fa-bars" onclick= "hide();"></i>

        </nav>

    </section>

        <!--  Apply History -->

        <div class="history-table">

       <table>

        <thead>

          <tr>
            <th>Sr No.</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Job Title</th>
            <th>Status</th>
            <th>Applied Date</th>
          </tr>

        </thead>

        <tbody>

        <?php

           $selectQuery = "select * from applications where js_id = {$user_id}";

           $query = mysqli_query($conn,$selectQuery);

           $rows = mysqli_num_rows($query);

           while($res=mysqli_fetch_array($query)){

            $i = 1;

            ?>

            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $res['js_name']; ?></td>
                <td><?php echo $res['js_email']; ?></td>
                <td><?php echo $res['js_mobile']; ?></td>
                <td><?php echo $res['j_title']; ?></td>
                <td><?php echo $res['status']; ?></td>
                <td><?php echo $res['applied_date']; ?></td>
                  
            </tr>

            <?php

           }


        ?>


        </tbody>

       </table>

     </div>

    


    <!-- Footer Section --> 

    <?php

        require_once("footer2.php");

    ?>

    
    <!-- Including JavaScript file link -->
    <script src="main.js"> </script>
    
  </body>
</html>