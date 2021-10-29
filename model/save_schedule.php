<?php
  session_start();
  
  if(!(isset($_SESSION['is_admin'])))
  {
    header("location: ../index.php");
  }


  if (isset($_POST['data']))
  {
    $data = $_POST['data'];
    $success = true;

    if(true)
    {
      $targetPath = "data/course_schedule.json";
      if(file_put_contents('../' . $targetPath, $data) === false)
      {
        $success = false;
      }

      if($success === true)
      {
        echo json_encode(array('error' => false, 'msg' => 'successfully save course schedule'));
      }
      else
      {
        echo json_encode(array('error' => true, 'msg' => 'issue when saving course schedule'));
      }
    }
  }
  else
  {
    echo json_encode(array('error' => true, 'msg' => 'issue when saving course schedule, params not all set'));
  }

?>