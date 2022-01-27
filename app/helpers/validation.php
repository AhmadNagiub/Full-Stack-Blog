<?php
function validateRegister($users)
{
    $errors = array();
    if(empty($users['username']))
    {
        array_push($errors , "username is required");
    }
    if(empty($users['email']))
    {
        array_push($errors , "email is required");
    }
    if(empty($users['password']))
    {
        array_push($errors , "password is required");
    }
    if($users['passwordConf'] !== $users['password'] )
    {
        array_push($errors , "password Do not match");
    } 
    $emailExist = selectOne("users" , ['email' => $users['email'] ]);


    // if($emailExist)
    // {
    //     array_push($errors , "This Email is Already Exist");
    // }

    if($emailExist)
    {
        if(isset($post['udate-user']) && $emailExist['id'] !=$post['id'] )
        {
            array_push($errors , "This Email is Already Exist");

        }
        if(isset($post['create-admin']))
        {
            array_push($errors , "This Email is Already Exist");

        }
    }
    return $errors;
}

function validateLogin($users)
{
    $errors = array();
    if(empty($users['username']))
    {
        array_push($errors , "username is required");
    }

    if(empty($users['password']))
    {
        array_push($errors , "password is required");
    }

    return $errors;
}