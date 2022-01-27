<?php
include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleWare.php");
include(ROOT_PATH . "/app/helpers/validatePost.php");

$table ='posts';
$id='';
$title ='';
$body  ='';
$topic_id ='';
$puplished ='';
$errors =array();
$topics =selectAll('topics');
$posts =selectAll($table);
if(isset($_POST['add-post']))
{
    adminsOnly();


    $errors = validatePost($_POST);
    if(!empty($_FILES['image']['name']))
    {
        $image_name = time() . '_' . $_FILES['image']['name'] ;
        $destenation = ROOT_PATH . '/assests/images/' . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'] , $destenation);
        if($result)
        {
            $_POST['image'] = $image_name;
        }
        else
        {
            array_push($errors , 'Falied to Upload this image');
        } 
    }
    else
    {
        array_push($errors , 'Post image is Riquired');
    }    

    
    if(count($errors)==0)
    {
        unset($_POST['add-post'] );
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] =isset($_POST['published']) ? 1:0;
        $_POST['body'] = htmlentities($_POST['body']); //XSS
        $post_id = create($table , $_POST);
        $_SESSION['message'] = 'topic created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . 'admin/posts/index.php'); 
        exit();
    }
    else
    {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $puplished =isset($_POST['published']) ? 1:0;

    }
}

if(isset($_GET['id']))
{
    $post = selectOne($table , ['id' => $_GET['id']]);
    $id=$post['id'];
    $title =$post['title'];
    $body  =$post['body'];
    $topic_id =$post['topic_id'];
    $published =$post['published'];
}

if(isset($_POST['update-post']))
{
    adminsOnly();

    $errors = validatePost($_POST);
    if(!empty($_FILES['image']['name']))
    {
        $image_name = time() . '_' . $_FILES['image']['name'] ;
        $destenation = ROOT_PATH . '/assests/images/' . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'] , $destenation);
        if($result)
        {
            $_POST['image'] = $image_name;
        }
        else
        {
            array_push($errors , 'Falied to Upload this image');
        } 
    }
    else
    {
        array_push($errors , 'Post image is Riquired');
    }    
    if(count($errors == 0))
    {
        $id=$_POST['id'];
        unset($_POST['update-post'] , $_POST['id'] );
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] =isset($_POST['published']) ? 1:0;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = update($table ,$id, $_POST);
        $_SESSION['message'] = 'topic updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . 'admin/posts/index.php'); 
        exit();

    }
    else
    {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published =isset($_POST['published']) ? 1:0;

    }
}

if(isset($_GET['delete_id']))
{
    adminsOnly();

$count=delete($table,$_GET['delete_id']);
$_SESSION['message'] = 'topic deleted successfully';
$_SESSION['type'] = 'success';
header('location: ' . BASE_URL . 'admin/posts/index.php'); 
exit();
}

if(isset($_GET['published']) && isset($_GET['p_id']))
{
    adminsOnly();

$published = $_GET['published'];
$p_id = $_GET['p_id'];
$count=update($table,$p_id , ['published' => $published]) ;
$_SESSION['message'] = 'Post Published State Change successfully';
$_SESSION['type'] = 'success';
header('location: ' . BASE_URL . 'admin/posts/index.php'); 
exit();
}