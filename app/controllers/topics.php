<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleWare.php");

include(ROOT_PATH . "/app/helpers/validateTopic.php");

$table = 'topics';
$id='';
$name='';
$description='';
$errors = array();
$topics = selectAll($table);


if(isset($_POST['add-topic']))
{
    adminsOnly();

    $errors = validateTopic($_POST);
    if(count($errors)===0)
    {
    unset($_POST['add-topic']);
    $_POST['description'] = htmlentities($_POST['description']);
    $topic_id = create($table  , $_POST);
    $_SESSION['message'] = 'topic created successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . 'admin/topics/index.php');
    exit();
    }
    else
    {
        $name = $_POST['name'];
        $description = $_POST['description'];
    }
}

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $topic = selectOne($table , ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];

}

if(isset($_POST['update-topic']))
{
    adminsOnly();

    $id = $_POST['id'];
    unset($_POST['update-topic'] , $_POST['id']);
    $topic_id = update($table , $id ,$_POST) ;
    $_SESSION['message'] = 'topic updated successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . 'admin/topics/index.php');
    exit();
}

if(isset($_GET['del_id']))
{
    adminsOnly();

    $id = $_GET['del_id'];
    $count = delete($table , $id);
    $_SESSION['message'] = 'topic deleted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . 'admin/topics/index.php');
    exit();

}