<?php
function validatePost($post)
{
    $errors = array();
    if(empty($post['title']))
    {
        array_push($errors , "title is required");
    }
    if(empty($post['body']))
    {
        array_push($errors , "body is required");
    }
    if(empty($post['topic_id']))
    {
        array_push($errors , "please select a topic");
    }

    $postTitleExist = selectOne("posts" , ['title' => $post['title'] ]);
    if($postTitleExist)
    {
        if(isset($post['udate-post']) && $postTitleExist['id'] !=$post['id'] )
        {
            array_push($errors , "This Post with That Title is Already Exist");

        }
        if(isset($post['add-post']))
        {
            array_push($errors , "This Post with That Title is Already Exist");

        }
    }
    return $errors;
}
