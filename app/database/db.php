<?php
session_start();
//connect with database
require("connect.php");
//select
function db($value) // function to be deleting just for testing
{
    echo "<pre>" , print_r($value , true) , "</pre>" ; //true to prevent 1 from appearing
    die(); // to stop function
}
function executeQuery ($sql , $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s',count($values));
    $stmt->bind_param($types , ...$values);
    $stmt->execute();
    return $stmt;

}
function selectAll($table , $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table ";
    if(empty($conditions))
    {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
    }
    else
    {
        // return records that matches conditions ...
        //$sql = "SELECT * FROM $users WHERE username = 'ahmed nagiub' AND admin=1"

        $i=0;
        foreach($conditions as $key=>$value)
        {
        if($i===0)
        {
            $sql = $sql . " WHERE $key=? "; // ? is a placeholder
        }
        else
        {
            $sql = $sql." AND $key=? ";
        }
        $i++;
        }
        $stmt = executeQuery($sql,$conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}
function selectOne($table , $conditions )
{
        global $conn;
        $sql = "SELECT * FROM $table ";

        $i=0;
        foreach($conditions as $key=>$value)
        {
        if($i===0)
        {
            $sql = $sql . " WHERE $key=? "; // ? is a placeholder
        }
        else
        {
            $sql = $sql." AND $key=? ";
        }
        $i++;
        }
        //$sql = "SELECT * FROM USERS WHERE admin=0 AND username ='ahmed nagiub' LIMIT 1"
        $sql = $sql . " LIMIT 1";
        $stmt = executeQuery($sql,$conditions);
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    
}

// $conditions = 
// [
//     'admin'    => 0,
//     'username' => 'ahmed nagiub'
// ];
// $users = selectOne('users' , $conditions);
// db($users);


// create
//$sql = "INSERT INTO users(username , admin , email , password) VALUES (?,?,?,?)"
//$sql = "INSERT INTO users SET username = ? , admin = ? , email =? , password=?"
function create($table , $data)
{
    global $conn;
    $sql = "INSERT INTO $table SET";
    $i=0;
    foreach($data as $key=>$value)
    {
        if($i===0)
        {
            $sql = $sql . " $key = ?";
        }
        else
        {
            $sql = $sql . ", $key = ?";

        }
        $i++;
    }
    $stmt = executeQuery($sql,$data);
    $id = $stmt->insert_id;
    return $id;
    
}

// $data = 
// [
//     'username' => 'A nagiub',
//     'admin'    => 1,
//     'email'    =>'amnagiub.27@mail.com',
//     'password' =>'mnagiub1999'
// ];
// $id = create('users' , $data);
// db($id);


//Update
//$sql = "UPDATA users SET username = ? , admin = ? , email =? , password=? WHERE $id =?"
function update($table,$id , $data)
{
    global $conn;
    $sql = "UPDATE $table SET";
    $i=0;
    foreach($data as $key=>$value)
    {
        if($i===0)
        {
            $sql = $sql . " $key = ?";
        }
        else
        {
            $sql = $sql . ", $key = ?";

        }
        $i++;
    }
    $sql = $sql . ' WHERE id =?';
    $data['id'] = $id;
    $stmt = executeQuery($sql,$data);
    return $stmt->affected_rows; // return -1 if not updated 1 if updated   
}

// $data = 
// [
//     'username' => 'nagiub',
//     'admin'    => 1,
//     'email'    =>'amnagiub.27@mail.com',
//     'password' =>'mnagiub1999'
// ];
// $id = update('users', 2 , $data);
// db($id);

//Delete

//$sql = "DELETE FROM users  WHERE $id =?"
function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id=?";
    $stmt = executeQuery($sql,['id'=>$id]);
    return $stmt->affected_rows; // return -1 if not updated 1 if updated   
}
// $id = delete('users' , 2);
// db($id);

// now i have done 5 functions 
// 1- selectAll 2-selectOne 3-create 4-delete 5-update

function getPublishedPosts()
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?";

    $stmt = executeQuery($sql,['published'=>1]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}

function searchPosts($term)
{
    $match = '%' . $term . '%';
    global $conn;
    $sql = "SELECT p.*, u.username
            FROM posts AS p 
            JOIN users AS u 
            ON p.user_id=u.id 
            WHERE p.published=?
            AND p.title LIKE ? OR p.body LIKE ? ";

            $stmt = executeQuery($sql,['published'=>1 , 'title'=>$match, 'body'=>$match]);
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;

}

function getPostsByTopicId($topic_id)
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?";

    $stmt = executeQuery($sql,['published'=>1 , 'topic_id'=>$topic_id] );
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;

}