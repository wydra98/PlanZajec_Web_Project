<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\..\Public\css\plan.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <script src="..\..\JQuery\jquery-3.4.1.js"></script>
    <script src = "..\..\JavaScript\plan.js"></script>
    <title>PlanZajec</title>
</head>
<body>
<?php include(dirname(__DIR__).'\NavbarControllers\navbar.php'); ?>    
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
        require_once __DIR__.'/../../Connection/PlanConnection.php';
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

        function write($number,$connection){
            $array = $connection->read($number);
            if(count($array)>0)
            {   $flag = false; 
                foreach($array as $lesson)
                {
                    if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                        echo '<div class="button" 
                        onclick="hideLesson(\''.$lesson->getLessonId().'\')"
                        id="'.$lesson->getLessonId().'"
                        style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
                        <label class="labelnames">'.$lesson->getName().'</label>
                        <label class="labelhours">'.$lesson->getStartHour().':'.$lesson->getStartMinute().'-'.$lesson->getEndHour().':'.$lesson->getEndMinute().'</label></div>';
                        $flag = true;
                    }
                }
                if($flag != true)
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else
                echo'<label class="labelempty">Brak lekcji!</label>';
        }

        ?>

        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
   
    <script src ="..\Bootstrap\js\bootstrap.min.js"></script>
</body>
</html>