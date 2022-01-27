<?php
function usesrOnly($redirect = 'index.php')
{   
    if(empty($_SESSION['id']))
    {
        $_SESSION['message'] = 'You need to Log In First';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect); 
        exit(0);
    }

}

function adminsOnly($redirect = 'index.php')
{
    if(empty($_SESSION['id']) || empty($_SESSION['admin']))
    {
        $_SESSION['message'] = 'You are not Authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect); 
        exit(0);
    }
}

function guestsOnly( $redirect = 'index.php')
{    if(isset($_SESSION['id']))
    {

        header('location: ' . BASE_URL . $redirect); 
        exit(0);
    }

}