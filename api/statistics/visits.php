<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/VisitsCount.php';

$database = new Database();
$db = $database->connect();

try{
  if(isset($_GET['website'])){
    $website_name = $_GET['website'];
    $count = new VisitsCount($db);
    $result = $count->get_visits_count($website_name);
    
    if($result){
      echo json_encode(
        array(
          'error'=> false,
          'message'=> '',
          'data'=> $result
          )
      );
    }else{
      echo json_encode(
        array(
          'error'=> true,
          'message'=> 'website not found in database',
          'data'=> null
          )
      );
    }
  }else{
    echo json_encode(
      array(
        'error'=> true,
        'message'=> 'website name not provided',
        'data'=> null
        )
    );
  }
}catch(exception $e){
  echo json_encode(
    array(
      'error'=> true,
      'message'=> $e->getMessage(),
      'data'=> null
    )
  );
}

?>