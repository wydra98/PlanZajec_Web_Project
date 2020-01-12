<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Public\bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\Public\css\plan.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
<?php include(dirname(__DIR__).'\Views\navbar.php'); ?>    
    <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
    </div>

    <div class="container">
        <div class="row seven-cols">
        <?php
        require_once __DIR__.'/../Connection/PlanConnection.php';
        $connection = new PlanConnection();

            echo'<div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Poniedziałek</label></div>';
                    write("1",$connection);

              
            echo'</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Wtorek</label></div>';
                    write("2",$connection);


            echo '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Środa</label></div>';
                    write("3",$connection);


            echo  '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Czwartek</label></div>';
                    write("4",$connection);


            echo '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Piątek</label></div>';
                    write("5",$connection);


            echo  '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Sobota</label></div>';
                    write("6",$connection);


            echo  '</div><div class="col-md-3  col-lg-1">
                    <div class="buttonstart"><label class="labelday">Niedziela</label></div>';
                    write("7",$connection);


        function cmp($a, $b) {
            return strcmp($a->getStartTime(), $b->getStartTime());
        }  

        function write($number,$connection){
            $array = $connection->read($number);
            if(count($array)>0)
            {   $flag = false; 
                if(count($array) >= 2) usort($array, "cmp");

                foreach($array as $lesson)
                {
                    if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                        if(strlen($lesson->getStartHour())==1) $lesson->setStartHour(sprintf("%02d", $lesson->getStartHour()));
                        if(strlen($lesson->getStartMinute())==1) $lesson->setStartMinute(sprintf("%02d", $lesson->getStartMinute()));
                        if(strlen($lesson->getEndHour())==1) $lesson->setEndHour(sprintf("%02d", $lesson->getEndHour()));
                        if(strlen($lesson->getEndMinute())==1) $lesson->setEndMinute(sprintf("%02d", $lesson->getEndMinute()));
                        echo '<div class="button" 
                        onclick="hideLesson(\''.$lesson->getLessonId().'\')"
                        id="'.$lesson->getLessonId().'"
                        onmouseover="mouseOver(\''.$lesson->getLessonId().'\')" 
                        onmouseout="mouseOut(\''.$lesson->getLessonId().'\',
                        \''.$lesson->getColor().'\',\''.$lesson->getBorderColor().'\',
                        \''.$lesson->getName().'\',\''.$lesson->getStartHour().'\',
                        \''.$lesson->getStartMinute().'\',\''.$lesson->getEndHour().'\',\''.$lesson->getEndMinute().'\')"
                        style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
                            <div class="text">
                                <label>'.$lesson->getName().'</label>
                                <label>'.$lesson->getStartHour().':'.$lesson->getStartMinute().'-'.$lesson->getEndHour().':'.$lesson->getEndMinute().'</label>
                            </div></div>';
                        $flag = true;
                    }
                }
        }
        echo '<div class="button"><a href="?page=choice&day_id='.$number.'"><button class = "addButton"><i class="fa fa-plus-circle fa-2x"></i></button></a></div>';
    }
        ?>

        </div>
    </div>
    <script  type="text/JavaScript" src="..\Public\js\js_controll.js"></script>
</body>
</html>