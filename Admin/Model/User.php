<?php

include_once("DataProvider.php");
class User{
    private $da;
    function __construct()
    {
        $this->da = new DataProvider();
    }
    function getAllUser()
    {
        $sql=("Select * from user");
        return $this->da->ExecuteQuery($sql);
    }
    function getUserByID($ID)
    {
        $sql=("Select * from user where idUser=$ID");
        return $this->da->ExecuteQuery($sql);
    }
    function InsertUser($idUser, $Username, $Password, $Name, $Adderss, $Child_idChild, $TypeUser, $Album_idAlbum)
    {
        $sql=("Insert into user(idUser, Username, Password, Name, Adderss, Child_idChild, TypeUser, Album_idAlbum) VALUES 
         ($idUser, '$Username', '$Password', '$Name', '$Adderss', $Child_idChild, $TypeUser, $Album_idAlbum)");
        return $this->da->ExecuteQuery($sql);
    }
    function DeleteUser($ID)
    {
        $sql = "Delete from user where idUser=$ID ";
        return $this->da->ExecuteQuery($sql);
    }
    function CheckLoginUser($email,$password)
    {
        $sql = "Select * from user where username='$email' and password = '$password' ";

        $result = $this->da->ExecuteQuery($sql);
        if(mysqli_num_rows($result)>0){
            $json['success'] = ' Welcome '.$email;
            echo json_encode($json);
        }
    }
}
?>