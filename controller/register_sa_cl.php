<?php
include("../config/config.inc.php");
include('../config/connectdb.php');
session_start();
if (isset($_POST['key']) && $_POST['key'] == 'form-register') {
    $input = $_POST['data'];

    $username_sa = $input['username_sa'];
    $password_sa = $input['password_sa'];
    $natitle_sa = $input['natitle_sa'];
    $name_sa = $input['name_sa'];
    $birthday_sa = $input['birthday_sa'];
    $email_sa = $input['email_sa'];
    $addresr_sa = $input['addresr_sa'];
    $zipcode_sa = $input['zipcode_sa'];
    $phone_sa = $input['phone_sa'];

    $sql = "INSERT INTO `systemsanalyst` (`id_sa`, `username_sa`, `password_sa`, `natitle_sa`, `name_sa`, `birthday_sa`, `email_sa`, `addresr_sa`, `zipcode_sa`, `phone_sa`) VALUES 
                                            (NULL, '$username_sa', '$password_sa', '$natitle_sa', '$name_sa', '$birthday_sa', '$email_sa', '$addresr_sa', '$zipcode_sa', '$phone_sa');";
    try {
        if(Database::query($sql)){
            echo "success";
        }else{
            echo "error";
        }
    } catch (Exception $e) {
        echo "error->".$e->getMessage()."\n";
    }

}

// form-login
if (isset($_POST['key']) && $_POST['key'] == 'form-login') {
    $input = $_POST['data'];

    $username_sa = $input['username_sa'];
    $password_sa = $input['password_sa'];


    $sql = "SELECT * FROM `systemsanalyst` WHERE username_sa='$username_sa' AND password_sa ='$password_sa'";
    try {
        $row = Database::query($sql,PDO::FETCH_ASSOC)->fetch(PDO::FETCH_ASSOC);
        if($row['username_sa'] == $username_sa && $row['password_sa'] == $password_sa){
            $_SESSION['key'] = 'sa';
            $_SESSION['id_sa'] = $row['id_sa'];
            echo "success";
        }else{
            echo "error";
            session_destroy();
        }
    } catch (Exception $e) {
        echo "error->".$e->getMessage()."\n";
    }

}