<?php 
include("../../config/config.inc.php");
include('../../config/connectdb.php');

if (isset($_POST['key']) && $_POST['key'] == 'ed-form') {
    $t=time();
    $input = $_POST['data'];
    $id = $_POST['id'];
// 
    $id_sa  = htmlspecialchars($input['id_sa-'.$id]);
    $model_pj  = htmlspecialchars($input['model_pj-'.$id]);
    $title_pj = htmlspecialchars($input['title_pj-'.$id]);
    $introduction_con =$input['introduction_con-'.$id];
    $need_con = $input['need_con-'.$id];
    $description_con = $input['description_con-'.$id];
    
    $date_pj = date("Y-m-d H:i:s",$t);
    // echo $date_pj;


    $sql_update = "UPDATE `project` SET `date_pj` = '$date_pj',
                                        `model_pj` = '$model_pj',
                                        `title_pj` = '$title_pj', 
                                        `id_sa` = '$id_sa', 
                                        `introduction_con` = '$introduction_con', 
                                        `description_con` = '$description_con', 
                                        `need_con` = '$need_con' 
                                        WHERE `project`.`id_pj` = '$id';";

    if(Database::query($sql_update,PDO::FETCH_ASSOC)){
        echo 'success';
    }else{
        echo 'error';
    }


}
if(isset($_POST['key']) && $_POST['key'] == 'dd-form'){
    $id = $_POST['id_pj'];
    $sql = "DELETE FROM `project` WHERE `project`.`id_pj` = '$id'";

    if(Database::query($sql)){
        echo 'success';
    }else{
        echo 'error';
    }

}
// INSERT INTO `project` (`id_pj`, `date_pj`, `model_pj`, `title_pj`, `id_sa`, `introduction_con`, `description_con`, `need_con`) VALUES (NULL, current_timestamp(), '3', 'sdf', '8', 'sdf', 'adsf', 'adf');
if(isset($_POST['key']) && $_POST['key'] == 'form-add_pj'){
    $t=time();
    $input = $_POST['data'];

    $id_sa  = $input['id_sa'];
    $model_pj  = $input['model_pj'];
    $title_pj = $input['title_pj'];
    $introduction_con = $input['introduction_con'];
    $need_con = $input['need_con'];
    $description_con = $input['description_con'];
    
    $date_pj = date("Y-m-d H:i:s",$t);
    // echo $date_pj;

    $sql_add = "INSERT INTO `project` (`id_pj`, `date_pj`, `model_pj`, `title_pj`, `id_sa`, `introduction_con`, `description_con`, `need_con`) VALUES 
                                        (NULL, current_timestamp(), '$model_pj', '$title_pj', '$id_sa', '$introduction_con', '$description_con', '$need_con');";

    if(Database::query($sql_add)){
        echo "success";
    }else{
        echo "error";
    }
}
//add_pro_sa
if (isset($_POST['key']) && $_POST['key'] == 'add_pro_sa') {
    $input = $_POST['data'];

    $id_sa = htmlspecialchars($input['id_sa']);
    $username_sa = htmlspecialchars($input['username_sa']);
    $password_sa = htmlspecialchars($input['password_sa']);
    $natitle_sa = htmlspecialchars($input['natitle_sa']);
    $name_sa = htmlspecialchars($input['name_sa']);
    $birthday_sa = htmlspecialchars($input['birthday_sa']);
    $email_sa = htmlspecialchars($input['email_sa']);
    $addresr_sa = htmlspecialchars($input['addresr_sa']);
    $zipcode_sa = htmlspecialchars($input['zipcode_sa']);
    $phone_sa = htmlspecialchars($input['phone_sa']);

    $sql = "UPDATE `systemsanalyst` SET `username_sa` = '$username_sa', 
                                        `password_sa` = '$password_sa', 
                                        `natitle_sa` = '$natitle_sa', 
                                        `name_sa` = '$name_sa', 
                                        `birthday_sa` = '$birthday_sa', 
                                        `email_sa` = '$email_sa', 
                                        `addresr_sa` = '$addresr_sa', 
                                        `zipcode_sa` = '$zipcode_sa', 
                                        `phone_sa` = '$phone_sa'
                                         WHERE `systemsanalyst`.`id_sa` = '$id_sa';";
    try {
        if(Database::query($sql,PDO::FETCH_ASSOC)){
            echo "success";
        }else{
            echo "error";
        }
    } catch (Exception $e) {
        echo "error->".$e->getMessage()."\n";
    }

}