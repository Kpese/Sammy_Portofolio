<?php
// Create connection
$conn = mysqli_connect('localhost', 'sam', '07063137059', 'users_info');

// Check connection
if (!$conn) {
    "Connection failed: " . mysqli_connect_error();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$name = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (!empty($name) && !empty($email) && !empty($password) && !is_numeric($email) && !is_numeric($name)) {
// saving to the database
        $query = "INSERT INTO users(username,email,password) VALUES('$name', '$email', '$password')";
      if(mysqli_query($conn, $query)){
        header("location: signin.php");
      }  else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    } 
    }else {
      echo 'please enter some valid information';
}
}
$conn->close();

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
    <title>Sign up</title>
</head>
<body>
<div class="container mt-5 py-4">
    
    <h2 class="text-center mb-5">SIGN UP</h2>
    <form action="signup.php" method="POST">
   
    <label class="fs-5" >Username</label>
    <div class="form-floating mb-4">
<input type="text" class="form-control fs-5" name="username" placeholder="username">
</div>

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
   <p class="mt-4 text-center">Already have an account?<span ><a class="text-warning text-decoration-none fs-5"  href="signup.php"> LOGIN</a></span></p>
      </form>
  </div>

</body>
</html>







  <!-- <div class="container d-flex justify-content-center align-items-center mt-5 flex-column border w-25 p-4 shadow">
    <h2 class="mb-4 fw-light fs-1">Sign Up</h2>
    <form method="post" action="signup.php">

    <div class="form-floating mb-3">
      <input
        type="text"
        class="form-control" name="username" id="formId1" placeholder="">
      <label for="formId1">Name</label>
    </div>

    <div class="form-floating mb-3">
      <input
        type="email"
        class="form-control" name="email" id="formId1" placeholder="">
      <label for="formId1">Email</label>
    </div>

    <div class="form-floating mb-3">
      <input
        type="password"
        class="form-control" name="password" id="formId1" placeholder="">
      <label for="formId1">Password</label>
    </div>

    <div class="text-center">
    <input type="submit" name="submit" class="px-5 py-2 bg-primary border-0 text-light rounded-3" value="Sign Up">
    </div>
    </form>
    </div> -->