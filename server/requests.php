<?php
session_start();
include("../common/db.php");

if (isset($_POST['signup'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];


    $user = $conn->prepare("Insert into `users`
    (`id`,`username`,`email`,`password`,`address`)
    values(1,'$username','$email','$password','$address');

    ");
    $result = $user->execute();
    echo $user->insert_id;

    if ($result) {
        //echo "new user registered";
        $_SESSSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location: /project");// for go to page direcly discuss home pagr after sign up
    } else {
        echo "new user not registered";
    }
} else if (isset($_POST['login'])) {
    // print_r($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;
    $query = "select * from users where email ='$email' and password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        foreach ($result as $row) {
            $username = $row['username'];
            $user_id = $row['id'];
        }
        echo $username;
        $_SESSSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location: /project");

    } else {
        echo "new user not registered";
    }
} else if (isset($_GET['logout'])) {
    session_unset();
    header("location: /discuss");
} else if (isset($_POST["ask"])) {
    // print_r($_POST);
    // print_r($_SESSION);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];


    $question = $conn->prepare("Insert into `questions`
    (`id`,`title`,`description`,`category_id`,`user_id`)
    values(NULL,'$title','$decription','$category_id','$user_id');

    ");
    $result = $question->execute();
    $question->insert_id;

    if ($result) {
        //echo "new user registered";
        //$_SESSSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location: /project");// for go to page direcly discuss home pagr after sign up
    } else {
        echo "Question not added to web";
    }

}else if(isset($_POST['answer'])){
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];


    $query = $conn->prepare("Insert into `answers`
    (`id`,`answer`,`question_id`,`user_id`)
    values(NULL,'$answer','$question_id','$user_id');

    ");
    $result = $query->execute();
   

    if ($result) {
        //echo "new user registered";
        //$_SESSSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location: /project?q-id=$question_id");// for go to page direcly discuss home pagr after sign up
    } else {
        echo "Answer is not submitted";
    }

}else if(isset($_GET['delete'])){
    $qid = $_GET['delete']; 
    $query = $conn->prepare("delete fron questions where id=$qid");
    $result = $query->execute();
    if($result){
        header("location: /project");
    }else{
        echo "Questions not deleted";
    }

}



//print_r($_POST);
?>