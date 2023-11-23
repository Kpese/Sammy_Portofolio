<?php 
// Create connection
$conn = mysqli_connect('localhost', 'sam', '07063137059', 'users_info');

// Check connection
if (!$conn) {
    "Connection failed: " . mysqli_connect_error();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = htmlspecialchars($_POST['email']);
    $password =htmlspecialchars($_POST['password']);

    if(!empty($email) && !empty($password) && !is_numeric($email)){
// saving to the database
$query = "SELECT  email, password FROM users where email = '$email'";
 $result = mysqli_query($conn, $query);

 if (mysqli_num_rows($result)> 0) {
    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {
     session_start();
     $_SESSION['email'] = $user['email'];

      header("location: dashboard.php");
    } else {
      echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}
} else {
        echo  'please enter some valid information';
    }
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- favicon -->
   <link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon">
   
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="work.css">
  <title>Sign in</title>
</head>

<body>
 
<div class="container mt-5 py-4">
    
    <h2 class="text-center mb-5">LOGIN</h2>
    <form action="signin.php" method="POST">
   
   <label class="fs-5" >Email</label>
    <div class="form-floating mb-4">
<input type="email" class="form-control fs-5" name="email" placeholder="name@example.com" value="<?php $email ?>">
</div>

<label class="fs-5">Password</label>
<div class="form-floating mb-4">
  <input type="password" class="form-control fs-5" name="password" placeholder="Password" value="<?php $password ?>">
</div>

<div class="text-center">
        <input type="submit" name="submit" class="px-5 py-2 bg-primary border-0 text-light rounded-3" value="Sign In">
      </div>
   <p class="mt-4 text-center">Don't have an account?<span ><a class="text-warning text-decoration-none fs-5"  href="signup.php"> REGISTER</a></span></p>
      </form>
  </div>
</body>
</html>


  <!-- <div class="container d-flex justify-content-center align-items-center mt-5 flex-column border w-25 p-4 shadow">
    <h2 class="mb-4 fw-light fs-1">Sign In</h2>
    <form method="POST" action="signin.php">


      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="" value="<?php $email ?>">
        <label>Email</label>

      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password" id="formId1" placeholder=""
          value="<?php $password ?>">
        <label>Password</label>

      </div>

      <div class="text-center">
        <input type="submit" name="submit" class="px-5 py-2 bg-primary border-0 text-light rounded-3" value="Sign In">
      </div>
    </form>
  </div> -->