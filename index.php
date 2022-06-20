<?php 
    session_start();

    require 'database.php';

    if(isset($_SESSION['user_id'])) {
        $records = $conn->prepare('SELECT id, email, password FROM users id = :id ');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);


        $user = null;


        if (count($results) > 0) {
            $user = $results;

        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bearanimal Veterinaria</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require '../partials/header.php ' ?>
    <?php if(!empty($user))?>
        <br>Welcome. <?= $user['email'] ?>
        <br>You are Successfully logged in 
        <a href="logout.php">Logout</a>
    
    <h1>Please Login or SignUp</h1>
    
    <a href="login.php">Login</a> or
    <a href="signup.php">Signup</a> 
    

</body>
</html>