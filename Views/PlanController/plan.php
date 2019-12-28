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
    
    echo'<div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Poniedziałek</label></div>';
            if($sizeM == 0)
            {
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeM; $x++)
            {
                if($colorsM[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsM[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsM[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsM[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";

                echo '<div class="button" style="background-color:'.$colorsM[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames">'.$namesM[$x].'</label>
                <label class="labelhours">'.$startHoursM[$x].'-'.$endHoursM[$x].'</label></div>';
            }
        }
    echo'</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Wtorek</label></div>';
            if($sizeT == 0)
            {
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeT; $x++)
            { 
                if($colorsT[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsT[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsT[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsT[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";

                echo '<div class="button" style="background-color:'.$colorsT[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames">'.$namesT[$x].'</label>
                <label class="labelhours">'.$startHoursT[$x].'-'.$endHoursT[$x].'</label></div>';
            }
        }
    echo '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Środa</label></div>';
            if($sizeW == 0)
            {
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeW; $x++)
            { 
                if($colorsW[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsW[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsW[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsW[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";

                echo '<div class="button" style="background-color:'.$colorsW[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames">'.$namesW[$x].'</label>
                <label class="labelhours">'.$startHoursW[$x].'-'.$endHoursW[$x].'</label></div>';
            }
        }
    echo  '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Czwartek</label></div>';
            if($sizeTh == 0)
            {
                echo'<label class="labelnempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeTh; $x++)
            { 
                if($colorsTh[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsTh[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsTh[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsTh[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";
                
                echo '<div class="button" style="background-color:'.$colorsTh[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames">'.$namesT[$x].'</label>
                <label class="labelhours">'.$startHoursT[$x].'-'.$endHoursT[$x].'</label></div>';
            }
        }
     echo '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Piątek</label></div>';
            if($sizeF == 0)
            {
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeF; $x++)
            { 
                if($colorsF[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsF[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsF[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsF[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";
                
                echo '<div class="button" style="background-color:'.$colorsF[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames">'.$namesF[$x].'</label>
                <label class="labelhours">'.$startHoursF[$x].'-'.$endHoursF[$x].'</label></div>';
            }
        }
    echo  '</div><div class="col-md-3 col-lg-1">
            <div class="buttonstart"><label class="labelday">Sobota</label></div>';
            if($sizeS == 0)
            {
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeS; $x++)
            { 
                if($colorsS[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsS[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsS[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsS[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";
                
                echo '<div class="button" style="background-color:'.$colorsS[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames">'.$namesS[$x].'</label>
                <label class="labelhours">'.$startHoursS[$x].'-'.$endHoursS[$x].'</label></div>';
            }
        }
    echo  '</div><div class="col-md-3  col-lg-1">
            <div class="buttonstart"><label class="labelday">Niedziela</label></div>';
            if($sizeSu == 0)
            {
                echo'<label class="labelempty">Brak lekcji!</label>';
            }
            else{
            for($x = 0; $x<$sizeSu; $x++)
            { 
                if($colorsSu[$x] == "#2E4053") $borderColor = "#002633";
                else if($colorsSu[$x] == "#3c0044") $borderColor = "rgb(51, 0, 38)";
                else if($colorsSu[$x] == "#85144b") $borderColor = "#80002a";
                else if($colorsSu[$x] == "#006213") $borderColor = "rgb(0, 58, 0)";
                else  $borderColor = "rgb(58, 0, 0)";
                
                echo '<div class="button" style="background-color:'.$colorsSu[$x].'; border: 3px solid '.$borderColor.'">
                <label class="labelnames>'.$namesSu[$x].'</label>
                <label class="labelhours">'.$startHoursSu[$x].'-'.$endHoursSu[$x].'</label></div>';
            }
        }
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