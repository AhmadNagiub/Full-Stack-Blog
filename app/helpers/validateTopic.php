<?php
function validateTopic($topic)
{
    $errors = array();
    if(empty($topic['name']))
    {
        array_push($errors , "name is required");
    }

    $topicExist = selectOne("topics" , ['name' => $topic['name'] ]);
    if($topicExist)
    {
        if(isset($_POST['update-topic']) && $topicExist['id'] != $post['id'] )
        {
            array_push($errors , "Name Already Exist");

        }
        if(isset($_POST['add-topic']))
        {
            array_push($errors , "Name Already Exist");

        }
    }
    return $errors;
}

