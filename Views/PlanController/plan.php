<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\..\Public\css\plan.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
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
         require_once __DIR__.'//..//..//Conntrollers//PlanConntroller.php';
         $remove = new PlanController();

            echo'<div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Poniedziałek</label></div>';
                if(count($_SESSION['lessonsMONDAY'])>0)
                {   $flag = false; 
                    foreach($_SESSION['lessonsMONDAY'] as $lesson)
                    {
                        if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                    
                            echo '<div class="button" onclick="document.write('<?php $remove->removeLesson($lesson->getDay(),$lesson->getStartHour(),$lesson->getStartMinute(),$lesson->getWeekNumber()) ?>');"" 
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
                    
            echo'</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Wtorek</label></div>';
                    if(count($_SESSION['lessonsTUESDAY'])>0)
                {   $flag = false; 
                    foreach($_SESSION['lessonsTUESDAY'] as $lesson)
                    {
                        if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                    
                            echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
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

            echo '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Środa</label></div>';
                    if(count($_SESSION['lessonsWEDNESDAY'])>0)
                {   $flag = false; 
                    foreach($_SESSION['lessonsWEDNESDAY'] as $lesson)
                    {
                        if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                    
                            echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
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

            echo  '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Czwartek</label></div>';
                    if(count($_SESSION['lessonsTHURSDAY'])>0)
                {   $flag = false; 
                    foreach($_SESSION['lessonsTHURSDAY'] as $lesson)
                    {
                        if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                    
                            echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
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

            echo '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Piątek</label></div>';
                    if(count($_SESSION['lessonsFRIDAY'])>0)
                    {   $flag = false; 
                        foreach($_SESSION['lessonsFRIDAY'] as $lesson)
                        {
                            if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                    
                                echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
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

            echo  '</div><div class="col-md-3 col-lg-1">
                    <div class="buttonstart"><label class="labelday">Sobota</label></div>';
                    if(count($_SESSION['lessonsSATURDAY'])>0)
                {   $flag = false; 
                    foreach($_SESSION['lessonsSATURDAY'] as $lesson)
                    {
                        if($lesson->getWeekNumber() == $_SESSION['weekNumber']){
                    
                            echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
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

            echo  '</div><div class="col-md-3  col-lg-1">
                    <div class="buttonstart"><label class="labelday">Niedziela</label></div>';
                    if(count($_SESSION['lessonsSUNDAY'])>0)
                    {   $flag = false; 
                        foreach($_SESSION['lessonsSUNDAY'] as $lesson)
                        {
                            if( $lesson->getWeekNumber() == $_SESSION['weekNumber']){
                                echo '<div class="button" style="background-color:'.$lesson->getColor().'; border: 3px solid '.$lesson->getBorderColor().'">
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
            echo  '</div>';
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