<?php

 class func
 {
   public static function checkLoginState($dbh)
   {
     if (!isset($_SESSION))
     {
       session_start();
     }
     if (isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial']))
     {
       $query = "SELECT * FROM sessions WHERE sessions_userid = :userid AND sessions_token = :token AND sessions_serial = :serial;";

       $id = $_COOKIE['id'];
       $token = $_COOKIE['token'];
       $serial = $_COOKIE['serial'];

       $stmt = $dbh->prepare($query);
       $stmt->execute(array(':userid' => $userid, ':token' => $token, ':serial' => $serial));

       $row =  $stmt->fetch(PDO::FETCH_ASSOC);

       if ($row['sessions_userid'] > 0)
       {
         if (
           $row['sessions_userid'] == $_COOKIE['userid'] &&
           $row['sessions_token'] == $_COOKIE['token'] &&
           $row['sessions_serial'] == $_COOKIE['serial']
           )
          {
            if (
              $row['sessions_userid'] == $_COOKIE['userid'] &&
              $row['sessions_token'] == $_COOKIE['token'] &&
              $row['sessions_serial'] == $_COOKIE['serial']
                )
            {
              return true;
                  }
                  else {
                    func::createSession($_COOKIE['username'], $_COOKIE['userid'], $_COOKIE['token'], $_COOKIE['serial']);
                    return true;
                  }
                }
             }
           }
         }

   public static function createRecord($dbh, $users_username, $users_id)
   {
     $query = " INSERT INTO sessions (session_userid, session_token, session_serial) VALUES (:user_id,:token,:serial,'09/06/2019')";
     $dbh->prepare("DELETE FROM sessions WHERE sessions_userid= :sessions_userid;")->execute(array(':sessions'));

     $token = func::createString(30);
     $serial = func::createString(30);

     func::createCookie($user_username, $user_id, $token, $serial);
     func::createSession($user_username, $user_id, $token, $serial);

     $stmt = $dbh->prepare($query);
     $stmt->execute(array(':user_id' => $users_id, ':token' => $token, ':serial' => $serial));
   }

   public static function createCookie($user_username, $user_id, $token, $serial)
   {
     setcookie('user_id', $user_id, time() + (86400) * 30, "/");
     setcookie('user_username', $user_username, time() + (86400) * 30, "/");
     setcookie('token', $token, time() + (86400) * 30, "/");
     setcookie('serial', $serial, time() + (86400) * 30, "/");
   }

   public static function deleteCookie()
   {
     setcookie('user_id', '', time() - 1, "/");
     setcookie('user_username', '', time() - 1, "/");
     setcookie('token', '', time() - 1, "/");
     setcookie('serial', '', time() - 1, "/");
     session_destroy();
   }

   public static function createSession($user_username, $user_id, $token, $serial)
   {
     if (!isset($_SESSION))
     {
       session_start();
     }
     $_SESSION['user_username'] = $user_username;
   }

   public static function createString($len)
   {
     $string = "1qay2wsx3edc4rfv5tgb6zhn7ujm8ik9olpAQW5XEDCVFRTGBNHYZUJMKILOP";

    return substr(str_shuffle($string), 0, 30);
   }
 }

 ?>
