<?php

if(isset($_POST['login'])){

    if($_POST['login'] == "true"){

        $username = mysql_real_escape_string($_POST['username']);
        $pass = mysql_real_escape_string($_POST['password']);
        $password = md5($pass);

        //db query
        $sql = "SELECT id from users
                WHERE username='{$username}' AND password = '{$password}' LIMIT 1";

        $query = mysql_query($sql);

        $exists = mysql_num_rows($query);

        if($exists == 1){
            while($row = mysql_fetch_array($query)){
                $id = $row['id'];
                //$username = $row['username'];
                //$password = $row['pass'];
            }

            session_start();

            $_SESSION['id'] = $id;
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;
            header("Location: index.php");
            exit();
        }else{
        	$message = "User does not exist or You have entered your username or password Incorrectly.";
        }
    }
    elseif($_POST['login'] == "false"){

        $username = mysql_real_escape_string($_POST['username']);
        $pass = mysql_real_escape_string($_POST['password']);
        $password = md5($pass);
        $email = mysql_real_escape_string($_POST['email']);
        $date = date(DATE_RFC822);

        $sql = "INSERT INTO users (username, password, email, date_reg)
                VALUES ('{$username}', '{$password}', '{$email}', '{$date}')";

        $query = mysql_query($sql);

        if(!$query){
            $message = "Problem: " . mysql_errno() . mysql_error();
            die($message);
        }
        else{
            $message = "Your account has been created!";
            $dir = "uploads/".$id;
            mkdir($dir, 777);
        }
    }
}

?>
