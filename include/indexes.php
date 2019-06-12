<?php
  include 'dba.php';
  require '../vendor/autoload.php';

  Flight::route('/', function(){
    echo 'Hello world';
  });

  Flight::route('GET /events', function(){
    $sql = "";
    $sql = "SELECT * FROM contact";

    try{
      $db = new dba();
      $db = $db->connecty();
      $stmt = $db->query($sql);
      $eventJson = $stmt->fetchAll(PDO::FETCH_OBJ);
      $db = null;
      Flight::json($eventJson);
    }
    catch (PDOException $e){
      echo $e->getMessage();
    }
  });

  Flight::route('POST /add' , function(){

    $request = Flight::request();
    $data = [];
    $sql = '';

    //if($value == 'eve'){
      $data = [
        'name' => $request->data->name,
        'email' => $request->data->email,
        'phone'=> $request->data->phone,
        'message'=> $request->data->message

      ];
$sql = "INSERT INTO contact (name, email, phone, message) VALUES (:name,:email,:phone, :message)";
    //}

    try{
      $db = new dba();
      $db = $db->connecty();
      $stmt = $db->prepare($sql);
      $stmt->execute($data);
    }
    catch(PDOException $e) {
      echo $e->getMessage()."NE RADI";
    }
  });

  Flight::start();
?>
