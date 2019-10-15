<?php 
//This file provides the information for acessing the databse and connecting to MySQL.
//Primeiro define as constantes

Define('DB_USER', 'root');
Define('DB_PASSWORD',"");
Define('DB_HOST', 'localhost');
Define('DB_NAME', 'simpledb');

try
{

    $dbcon = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    mysqli_set_charset($dbcon, 'utf8');

    //codigo aqui

}
catch(Exception $e)
{
    //print "An excepetion ocurred. Message: " . $e->getMessage();
    print"The system is busy please try later";
}
catch(Error $er )
{
    //print "An error ocurred. Message: " . $er->getMessage();
    print"The system is busy please try again later";
}

?>