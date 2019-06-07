<?php
  include 'db.php';
  require '../vendor/autoload.php';

  Flight::route('/', function(){
    echo 'Hello world';
  });

  Flight::route('GET /events', function(){
    $sql = "";
    $sql = "SELECT * FROM reservation";

    try{
      $db = new db();
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
        'date' => $request->data->date,
        'guest' => $request->data->guest,
        'section'=> $request->data->section,
        'club'=> $request->data->club
      ];
$sql = "INSERT INTO reservation (name, email, phone, date, guest, section, club) VALUES (:name,:email,:phone,:date,:guest,:section,:club)";
    //}

    try{
      $db = new db();
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
