<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template for an interactive website</title>
    <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
 integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
 crossorigin="anonymous">
<script src="verify.js"></script>
</head>
<body>
    <div class="container" style="margin-top:30px;">
    <!-- Header Section -->
    <header class="jumbotron text-center row"
     style="margin-bottom:2px; background:linear-gradient(white, #00073e6); padding:20px;">
     <?php include('header.php'); ?>
    </header>

    <!-- Body Section -->
        <div class="row" style="padding-left:0px;">
    <!-- Left side Column Menu Section -->
    <nav class="col-sm-2">
        <ul class="nav nav-pills flex-column">
        <?php include('nav.php'); ?>
        </ul>
    </nav>
        
        <!-- Validate Input -->

    <?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require('process-register-page.php');
    } //end of the main submit conditional
    ?>

    <div class="col-sm-8">
        <h2 class="h2 text-center">Register</h2>    
    <form action="register-page.php" method="post" onsubmit="return checked();"> <!-- #2 -->
        <div class="form-group row">
    <label for="first_name" class="col-sm-4 col-form-label">First Name:</label>
        <div class="col-sm-8">
            <input type="text" name="first_name" class="form-control" id="fisrt_name"
            placeholder="First Name" maxlength="30" required
            value="<?php if(isset($_POST['fisrt_name'])) echo $_POST['fisrt_name']; ?>">
        </div>        
        </div>
    

    <div class="form-group row">
        <label for="last_name" class="col-sm-4 col-form-label">Last Name</label>
        <div class="col-sm-8">
            <input type="text" name="last_name" id="last_name" class="form-control"
            placeholder="Last Name" maxlength="40" required
            value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
        <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email"
            placeholder="E-mail" maxlength="60" required
            value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
        </div>
    </div>

    <div class="form-group row">
        <label for="password1" class="col-sm-4 col-form-label">Password:</label>
        <div class="col-sm-8">
            <input type="password" class="form-control" id="password1" name="password1"
            placeholder="Password" minlength="8" maxlength="12"
            required value="<?php if (isset($_POST['password1'])) echo $_POST['password1']; ?>">
            <span id='message'>Between 8 and 12 characters.</span>
        </div>
    </div>

    <div class="form-group row">
        <label for="password2" class="col-sm-4 col-form-label">Confirm Password:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password2" name="password2"
                placeholder="Confirm Password" minlength="8" maxlength="12" required
                value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
            </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <input id="submit" class="btn btn-primary" type="submit" name="submit"
            value="Register">
        </div>
 
    </div> 
    </form>
    
    </div>

    <!-- Right side column content section              #3 -->
    <?php
    if(!isset($errorstring)){
        echo '<aside class="col-sm-2">';
        include('info-col.php');
        echo '</aside>';
        echo '</div>';
        echo '<footer class="jumbotron text-center row col-sm-14"
            style="padding-bottom:1px;padding-top:8px;">';
    }
    else
    {
        echo '<footer class="jumbotron text-center row col-sm-14"
        style="padding-bottom:1px;padding-top:8px;">';
    }

    include('footer.php');
    
    ?> 
    
    </div>

</body>
</html>