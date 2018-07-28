<?php
include("db.php");
$service = isset($_REQUEST['service']) ? $_REQUEST['service'] : '0';
$token   = isset($_REQUEST['token']) ? $_REQUEST['token'] : '0';

if($token != API_KEY){
  $data = array(
    "status" => array(
      'invalidToken' => '0'
    )
  );
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
  exit;
}

  switch($service){
    case listdata:
    $query = "SELECT first_name, last_name,email_id,contact_no,created_date FROM sandcastle_feedback ";
    $result=mysqli_query($link,$query) or die (mysqli_error($link)." Query=".$query);
    while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      $data["rows"][] = array(
        'id' => $rows['first_name'],
        'last_name' => $rows['last_name'],
        'email_id' => $rows['email_id'],
        'contact_no' => $rows['contact_no'],
        'created_date' => $rows['created_date']
      );
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    break;
    case insertdata:    
    $data = json_decode(file_get_contents('php://input'), true);
    $name       = mysqli_real_escape_string($link, $data['name']);
    $emailid    = mysqli_real_escape_string($link, $data['emailid']);
    $contact_no = mysqli_real_escape_string($link, $data['contact_no']);
    $fullName   = explode(" ", $name);
    
    if(empty($emailid)){
      $data = array(
        "status" => array(
          'failed' => '0'
        )
      );
    } else {
    $query      = "INSERT INTO sandcastle_feedback (first_name, last_name,email_id,contact_no)
                  VALUES ('".$fullName[0]."','".$fullName[1]."','".$emailid."','".$contact_no."')";

    $result     = mysqli_query($link,$query);
      if($result){
        $data = array(
          "status" => array(
            'success' => '1'
          )
        );
      } else {
        $data = array(
          "status" => array(
            'failed' => '0'
          )
        );
      }
    }
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    break;
}

function removeSpecialChars($string){
  return preg_replace('/[^A-Za-z0-9&\-\ "]/', '', $string);
}

function removeNewLine($string){
  return preg_replace('/[\n\r]/', '', $string);
}
?>
