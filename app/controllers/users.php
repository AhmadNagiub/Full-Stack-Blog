<?php
/* include header from app/database/db */
include(ROOT_PATH . "/app/database/db.php");
/* include header from app/database/db */
include(ROOT_PATH . "/app/helpers/middleWare.php");

/* include header from app/helpers/validation */
include(ROOT_PATH . "/app/helpers/validation.php");
/* include header from app/helpers/validation */
// تعريف متغيرات لاستقبالها من الصفحه و كذلك لاستخدامها في قيمه الادخال
$errors = array();
$admin='';
$id='';
$username = '';
$email = '';
$password = '';
$passwordConf = '';
$table = 'users';
$admin_users = selectAll($table );
function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'you are logged in';
    $_SESSION['type'] = 'success';

    if($_SESSION['admin'])
    {
        header('location:' . BASE_URL . 'admin/dashboard.php');
    }
    else
    {
    header('location:' . BASE_URL . 'index.php');
    }
    exit();
}

if(isset($_POST['register-btn']) || isset($_POST['create-admin']) )
{
    $errors = validateRegister($_POST); // validation from validation page 

    if(count($errors)===0)
    {
        unset($_POST['passwordConf'] ,$_POST['register-btn'] , $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'] , PASSWORD_DEFAULT );

        if(isset($_POST['admin']))
        {
            $_POST['admin'] = 1;
            $user_id = create($table , $_POST);
            $_SESSION['message'] = 'Admin user is created successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . 'admin/users/index.php'); 
            exit();
        }
        else
        {
            $_POST['admin'] = 0;
            $user_id = create($table , $_POST);
            $user = selectOne($table, ['id'=>$user_id]);
            //log user in
            loginUser($user);
        }


    }
    else
    {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1:0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }



}
if(isset($_POST['login-btn']))
{
    $errors = validateLogin($_POST); // validation from validation page 
    if(count($errors)===0)
    {
        $user = selectOne($table , ['username' => $_POST['username']]);
        if($user && password_verify($_POST['password'] , $user['password']))
        {
            loginUser($user);
        }
        else
        {
            array_push($errors , "wrong credentials");
        }
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

}

if(isset($_GET['delete_id']))
{
    adminsOnly();

    $count= delete($table , $_GET['delete_id']) ;
    $_SESSION['message'] = 'Admin User deleted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . 'admin/users/index.php');
    exit();

}
if(isset($_GET['id']))
{
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $admin = $user['admin'] ==1 ? 1:0;
    $email = $user['email'];
}
if(isset($_POST['update-user']))
{
    adminsOnly();

    $errors = validateRegister($_POST); // validation from validation page 
    if(count($errors)===0)
    {
        $id = $_POST['id'];
        unset($_POST['passwordConf'] , $_POST['update-user'] , $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'] , PASSWORD_DEFAULT );       
        $_POST['admin'] = isset($_POST['admin']) ? 1:0;
        $count = update($table , $id , $_POST);
        $_SESSION['message'] = 'Admin user is Updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . 'admin/users/index.php'); 
         exit();
    }
    else
    {
        $username = $_POST['username'];
        $admin = isset($_POST['admin']) ? 1:0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
    }

}

?>