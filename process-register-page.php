<?php

$errors = array();

//checando pela primeira vez

$first_name = trim($_POST['first_name']);
if (empty($first_name)){
    $errors[] = 'Você esqueceu de digitar seu primeiro nome';
}

//checkando o sobrenome

$last_name = trim($_POST['last_name']);
if(empty($last_name)){
    $errors[] = 'Você esqueceu de digitar seu sobrenome';
}

//checando o email

$email = trim($_POST['email']);
if(empty($email)){
    $errors[]= 'Você esqueceu de digitar seu email';
}

//checando senha

$password1 = trim($_POST['password1']);
$password2 = trim($_POST['password2']);
if(!empty($password1)){
    if($password1 != $password2){
        $errors[] = 'As senhas não coincidem';
    }
}
else{
    $errors[] = 'Você esqueceu de digitar a senha';
}

if(empty($errors)){

    try{
        //registro do usuário no banco de dados
        //Senha Hash está com 60 caracteres mas pode aumentar

        $hashed_passcode = password_hash($password1, PASSWORD_DEFAULT);
        require('mysqli_connect.php'); //conecta ao banco de dados

        //criando a query

        $query = "INSERT INTO users (user_id, first_name, last_name, email,password,
         registration_date) ";
        $query .="VALUES(' ', ?, ?, ?, ?, NOW())";
        $q = mysqli_stmt_init($dbcon);
        mysqli_stmt_prepare($q, $query);

        //use statement prepared para garantir que apenas textos foram inseridos
        //junte os campos para a instrução do SQL
        mysqli_stmt_bind_param($q, 'ssss', $first_name, $last_name, $email, $hashed_passcode);
        //executa a query
        mysqli_stmt_execute($q);

        if(mysqli_stmt_affected_rows($q) == 1){
            header('location: register-thanks.php');
            exit();
        }
        else{
            //mensagem publica
            $errorstring = "<p class'text-center col-sm-8' style='color:red'>";
            $errorstring .= "System Error<br />You could not be registered due ";
            $errorstring .= "to a system error. We apologize for any
                            inconvenience.</p>";
            echo "<p class=' text-center col-sm-2'
                    style='color:red'>$errorstring</p>";
        // Debugging message below do not use in production
        //echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $query . '</p>';
        mysqli_close($dbcon); // Close the database connection.
        // include footer then close program to stop execution
        echo '<footer class="jumbotron text-center col-sm-12"
            style="padding-bottom:1px; padding-top:8px;">
            include("footer.php");
            </footer>';
        exit();
        }



        
    }
    catch(Exception $e) // We finally handle any problems here #11
 {
 // print "An Exception occurred. Message: " . $e->getMessage();
 print "The system is busy please try later";
 }
 catch(Error $e)
 {
 //print "An Error occurred. Message: " . $e->getMessage();
 print "The system is busy please try again later.";
 }
 } else { // Report the errors. #12
 $errorstring = "Error! The following error(s) occurred:<br>";
 foreach ($errors as $msg) { // Print each error.
 $errorstring .= " - $msg<br>\n";
 }
 $errorstring .= "Please try again.<br>";
 echo "<p class=' text-center col-sm-2' style='color:red'>$errorstring</p>";
 }// End of if (empty($errors)) IF.
}



?>