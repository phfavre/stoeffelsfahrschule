
<?php
  session_start();
  if(!isset($_SESSION['is_admin']))
  {
    // go to login page
    header("location: login.php");
  }

  $hours = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "00");
  $minutes = array("00", "15", "30", "45");

  $dataPath = "data/course_schedule.json";
  $dataJsonStr = file_get_contents($dataPath);

  function schedule_row($course_type, $id, $hours, $minutes)
  {
      $row_html = '
        <div class="course_schedule_card '.$course_type.'_course_schedule_card" id="'.$course_type.'course_schedule_card_'.$id.'">
        <div class="course_schedule_item">Course '.$id.'</div>
        <div class="row '.$course_type.'_schedule_row" id="'.$course_type.'_schedule_row_'.$id.'">
            <div class="col-md-2 '.$course_type.'_schedule_date">
                <label for="'.$course_type.'_schedule_date_input_'.$id.'">Date</label>
                <input class="form-control" id="'.$course_type.'_schedule_date_input_'.$id.'" type="date" />
            </div>
            <div class="col-md-2 '.$course_type.'_schedule_start_hour">
                <label for="'.$course_type.'_schedule_start_hour_input_'.$id.'">Start Hour</label>
                <select class="form-control" id="'.$course_type.'_schedule_start_hour_input_'.$id.'">';
                    
                foreach ($hours as $hour) {
                    $row_html .= "<option>$hour</option>";
                }

        $row_html .= '</select>
            </div>
            <div class="col-md-2 '.$course_type.'_schedule_start_min">
                <label for="'.$course_type.'_schedule_start_min_input_'.$id.'">Start Minute</label>
                <select class="form-control" id="'.$course_type.'_schedule_start_min_input_'.$id.'">';
                    
                        foreach ($minutes as $minute) {
                            $row_html .= "<option>$minute</option>";
                        }
                    
        $row_html .= '</select>
            </div>
            <div class="col-md-2 '.$course_type.'_schedule_end_hour">
                <label for="'.$course_type.'_schedule_end_hour_input_'.$id.'">End Hour</label>
                <select class="form-control" id="'.$course_type.'_schedule_end_hour_input_'.$id.'">';
                    
                        foreach ($hours as $hour) {
                            $row_html .= "<option>$hour</option>";
                        }
                    
        $row_html .= '</select>
            </div>
            <div class="col-md-2 '.$course_type.'_schedule_end_min">
                <label for="'.$course_type.'_schedule_end_min_input_'.$id.'">End Minute</label>
                <select class="form-control" id="'.$course_type.'_schedule_end_min_input_'.$id.'">';
                    
                        foreach ($minutes as $minute) {
                            $row_html .= "<option>$minute</option>";
                        }
                    
        $row_html .= '</select>
            </div>
            <div class="col-md-2 '.$course_type.'_schedule_status">
                <div class="checkbox '.$course_type.'_schedule_status_cb">
                    &nbsp;<br />
                    <label for="'.$course_type.'_schedule_status_input_'.$id.'">
                        <input type="checkbox" class="'.$course_type.'_schedule_status_input" id="'.$course_type.'_schedule_status_input_'.$id.'" value="" />
                        Full
                    </label>                        
                </div>
            </div>
        </div>
        </div>
      ';

      return $row_html;
  }

?>
<html>
	<head>
		<title>Stoeffels Fahrschule - Course Schedule</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media
		queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file://
		-->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<link href="ext/bootstrap/bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="ext/bootflat/2.0.4/bootflat.github.io-master/bootflat/css/bootflat.css" rel="stylesheet">
		<link href="ext/material-design-icons/iconfont/material-icons.css" rel="stylesheet">
		<link href="css/general.css" rel="stylesheet">
        <link href="css/courseschedule.css" rel="stylesheet">
		<!--<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />-->
		<link rel="apple-touch-icon" sizes="57x57" href="img/icon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="img/icon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/icon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/icon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="img/icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="img/icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="img/icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/icon/favicon-16x16.png">
		<link rel="manifest" href="img/icon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/icon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
	</head>
	<body>
        <div class="container">
            <div class="course_schedule_title">Motorradgrundkurs</div>
            <?php
                for ($x = 1; $x <= 5; $x++) {
                    echo schedule_row("moto", $x, $hours, $minutes);
                }
            ?>

            <div class="course_schedule_title">VkU</div>
            <?php
                for ($x = 1; $x <= 5; $x++) {
                    echo schedule_row("vku", $x, $hours, $minutes);
                }
            ?>
            <br /><br />
            <div class="col-md-4 col-md-offset-4">
                <div class="btn btn-primary" id="save-schedule-btn">Save</div>
            </div>
        </div>
		
		<div id="json_data_div" hidden>
            <?php echo $dataJsonStr; ?>
        </div>
	</body>
	<script src="ext/jquery/1.11.1/jquery.min.js"></script>
	<script src="ext/bootstrap/bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/save_schedule.js"></script>
    <script type="text/javascript" src="js/logout.js"></script>
</html>
