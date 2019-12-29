<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\..\Public\css\plan.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
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

    echo count($_SESSION['lessons']);

    echo'<div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Poniedziałek</label></div>';
        if(count($_SESSION['lessons'])>0)
        {   $flag = false; 
            foreach($_SESSION['lessons'] as $lesson)
            {
                //if($lesson->/getDay() == 1){
                    if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                    else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                    else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                    else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                    else  $borderColor = "rgb(58, 0, 0)";
    
                    echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                    <label class="labelnames">'.$lesson->getName().'</label>
                    <label class="labelhours">'.$lesson->getStartHour().':'.$lesson->getStartMinute().'-'.$lesson->getEndHour().':'.$lesson->getEndMinute().'</label></div>';
                    $flag = true;
                //}
            }
            if($flag != true)
            echo'<label class="labelempty">Brak lekcji!</label>';
        }
        else
            echo'<label class="labelempty">Brak lekcji!</label>';
              
    echo'</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Wtorek</label></div>';
            if(count($_SESSION['lessons'])>0)
        {   $flag = false; 
            foreach($_SESSION['lessons'] as $lesson)
            {
                if($lesson->getDay() == 2){
                    if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                    else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                    else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                    else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                    else  $borderColor = "rgb(58, 0, 0)";
    
                    echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                    <label class="labelnames">'.$lesson->getName().'</label>
                    <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
                    $flag = true;
                }
            }
            if($flag != true)
            echo'<label class="labelempty">Brak lekcji!</label>';
        }
        else
            echo'<label class="labelempty">Brak lekcji!</label>';

    echo '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Środa</label></div>';
            if(count($_SESSION['lessons'])>0)
        {   $flag = false; 
            foreach($_SESSION['lessons'] as $lesson)
            {
                if($lesson->getDay() == 3){
                    if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                    else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                    else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                    else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                    else  $borderColor = "rgb(58, 0, 0)";
    
                    echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                    <label class="labelnames">'.$lesson->getName().'</label>
                    <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
                    $flag = true;
                }
            }
            if($flag != true)
            echo'<label class="labelempty">Brak lekcji!</label>';
        }
        else
            echo'<label class="labelempty">Brak lekcji!</label>';

    echo  '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Czwartek</label></div>';
            if(count($_SESSION['lessons'])>0)
        {   $flag = false; 
            foreach($_SESSION['lessons'] as $lesson)
            {
                if($lesson->getDay() == 4){
                    if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                    else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                    else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                    else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                    else  $borderColor = "rgb(58, 0, 0)";
    
                    echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                    <label class="labelnames">'.$lesson->getName().'</label>
                    <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
                    $flag = true;
                }
            }
            if($flag != true)
            echo'<label class="labelempty">Brak lekcji!</label>';
        }
        else
            echo'<label class="labelempty">Brak lekcji!</label>';

     echo '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Piątek</label></div>';
            if(count($_SESSION['lessons'])>0)
            {   $flag = false; 
                foreach($_SESSION['lessons'] as $lesson)
                {
                    if($lesson->getDay() == 5){
                        if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                        else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                        else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                        else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                        else  $borderColor = "rgb(58, 0, 0)";
        
                        echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                        <label class="labelnames">'.$lesson->getName().'</label>
                        <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
                        $flag = true;
                    }
                }
                if($flag != true)
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else
                echo'<label class="labelempty">Brak lekcji!</label>';

    echo  '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Sobota</label></div>';
            if(count($_SESSION['lessons'])>0)
        {   $flag = false; 
            foreach($_SESSION['lessons'] as $lesson)
            {
                if($lesson->getDay() == 6){
                    if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                    else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                    else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                    else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                    else  $borderColor = "rgb(58, 0, 0)";
    
                    echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                    <label class="labelnames">'.$lesson->getName().'</label>
                    <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
                    $flag = true;
                }
            }
            if($flag != true)
            echo'<label class="labelempty">Brak lekcji!</label>';
        }
        else
            echo'<label class="labelempty">Brak lekcji!</label>';

    echo  '</div><div class="col-md-3  col-lg-1">
            <div class="buttonstart"><label class="labelday">Niedziela</label></div>';
            if(count($_SESSION['lessons'])>0)
            {   $flag = false; 
                foreach($_SESSION['lessons'] as $lesson)
                {
                    if($lesson->getDay() == 7){
                        if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                        else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                        else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                        else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                        else  $borderColor = "rgb(58, 0, 0)";
        
                        echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                        <label class="labelnames">'.$lesson->getName().'</label>
                        <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
                        $flag = true;
                    }
                }
                if($flag != true)
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else
                echo'<label class="labelempty">Brak lekcji!</label>';
        
    echo  '</div>';

    function printer($day){ 
        if(count($_SESSION['lessons'])>0)
        {   $flag = false; 
            foreach($_SESSION['lessons'] as $lesson)
            {
                if($lesson->getDay() == $day){
                    if($lesson->getColor() == "#2E4053") $borderColor = "#002633";
                    else  if($lesson->getColor() == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                    else if($lesson->getColor() == "#85144b") $borderColor = "#80002a";
                    else if($lesson->getColor() == "#006213") $borderColor = "rgb(0, 58, 0)";
                    else  $borderColor = "rgb(58, 0, 0)";
    
                    echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$borderColor.'">
                    <label class="labelnames">'.$lesson->getName().'</label>
                    <label class="labelhours">'.$lesson->getStartHour().'-'.$lesson->getEndHour().'</label></div>';
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
   
    <script src ="..\Bootstrap\js\bootstrap.min.js"></script>
</body>
</html>