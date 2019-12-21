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
    /*
1.-----------------------------------------------------------------------------------------------------
    $zapytanieM = slect * from ID_PLANU where id_planu ='1';
    $monday = @polaczenie->query($zapytanieM);
    $monday -> fetch_assoc();

    $zapytanieM = slect * from ID_PLANU where id_planu ='2';
    $monday = @polaczenie->query($zapytanieM);
    $tuesday -> fetch_assoc();

    $zapytanieM = slect * from ID_PLANU where id_planu ='3';
    $monday = @polaczenie->query($zapytanieM);
    $wednesday -> fetch_assoc();

    $zapytanieM = slect * from ID_PLANU where id_planu ='4';
    $monday = @polaczenie->query($zapytanieM);
    $thursday -> fetch_assoc();

    $zapytanieM = slect * from ID_PLANU where id_planu ='5';
    $monday = @polaczenie->query($zapytanieM);
    $friday -> fetch_assoc();

    $zapytanieM = slect * from ID_PLANU where id_planu ='6';
    $monday = @polaczenie->query($zapytanieM);
    $saturday -> fetch_assoc();

    $zapytanieM = slect * from ID_PLANU where id_planu ='7';
    $monday = @polaczenie->query($zapytanieM);
    $sunday -> fetch_assoc();
    
    namesM=monday["NAME"];

2.---------------------------------------------------------------------------------------------------------------
    for($x = 0; $x<7; $x++)
        { 
           $zapytanie[x] = slect * from ID_PLANU where id_planu ='x';
           $day[x] = @polaczenie->query($zapytanie[x]);
           $day[x] -> fetch_assoc();
        }
 
        namesM = day[0]["NAME"];
 */    
    $namesM[] = "Polski";
    $namesM[] = "Matematyka";
    $namesM[] = "Wf";
    $namesM[] = "Polski";
    $namesM[] = "Matematyka";
    $namesM[] = "Wf";
    $colorsM[] = "#2E4053";  //dd
    $colorsM[] = "#3c0044";//dd
    $colorsM[] = "#8E0000"; //ss
    $colorsM[] = "#3c0044"; //** 
    $colorsM[] = "#85144b";//ss
    $colorsM[] = "#006213"; //**
    $startHoursM[] = "10:45";
    $startHoursM[] = "12:55";
    $startHoursM[] = "15:00";
    $startHoursM[] = "10:45";
    $startHoursM[] = "12:55";
    $startHoursM[] = "15:00";
    $endHoursM[] = "13:00";
    $endHoursM[] = "11:00";
    $endHoursM[] = "19:00";
    $endHoursM[] = "13:00";
    $endHoursM[] = "11:00";
    $endHoursM[] = "19:00";

    $namesT[] = "Polski";
    $namesT[] = "Matematyka";
    $namesT[] = "Wf";
    $namesT[] = "Polski";
    $namesT[] = "Matematyka";
    $namesT[] = "Wf";
    $namesT[] = "Matematyka";
    $colorsT[] = "#8E0000"; //ss
    $colorsT[] = "#2E4053"; //dd
    $colorsT[] = "#85144b"; //**
    $colorsT[] = "#006213"; //ss
    $colorsT[] = "#3c0044"; //ss
    $colorsT[] = "#2E4053"; //k
    $colorsT[] = "#8E0000"; //ss
    $startHoursT[] = "10:45";
    $startHoursT[] = "12:55";
    $startHoursT[] = "15:00";
    $startHoursT[] = "10:45";
    $startHoursT[] = "12:55";
    $startHoursT[] = "15:00";
    $startHoursT[] = "12:55";
    $endHoursT[] = "13:00";
    $endHoursT[] = "11:00";
    $endHoursT[] = "19:00";
    $endHoursT[] = "13:00";
    $endHoursT[] = "11:00";
    $endHoursT[] = "19:00";
    $endHoursT[] = "11:00";

    $namesW[] = "Polski";
    $colorsW[] = "#85144b"; //** 
    $startHoursW[] = "19:00";
    $endHoursW[] = "20:00";
    $namesW[] = "Polski";
    $colorsW[] = "#3c0044"; //** 
    $startHoursW[] = "19:00";
    $endHoursW[] = "20:00";
    $namesW[] = "Polski";
    $colorsW[] = "#2E4053"; //** 
    $startHoursW[] = "19:00";
    $endHoursW[] = "20:00";

    $namesTh[] = "Polski";
    $namesTh[] = "Matematyka";
    $namesTh[] = "Wf";
    $namesTh[] = "Polski";
    $namesTh[] = "Matematyka";
    $namesTh[] = "Wf";
    $namesTh[] = "Matematyka";
    $colorsTh[] = "#8E0000"; //ss
    $colorsTh[] = "#006213"; //dd
    $colorsTh[] = "#85144b"; //**
    $colorsTh[] = "#2E4053"; //ss
    $colorsTh[] = "#3c0044"; //ss
    $colorsTh[] = "#2E4053"; //k
    $colorsTh[] = "#8E0000"; //ss
    $startHoursTh[] = "10:45";
    $startHoursTh[] = "12:55";
    $startHoursTh[] = "15:00";
    $startHoursTh[] = "10:45";
    $startHoursTh[] = "12:55";
    $startHoursTh[] = "15:00";
    $startHoursTh[] = "12:55";
    $endHoursTh[] = "13:00";
    $endHoursTh[] = "11:00";
    $endHoursTh[] = "19:00";
    $endHoursTh[] = "13:00";
    $endHoursTh[] = "11:00";
    $endHoursTh[] = "19:00";
    $endHoursTh[] = "11:00";


    $namesF[] = "J.polski";
    $namesF[] = "Matematyka";
    $namesF[] = "J.polski";
    $namesF[] = "Matematyka";
    $colorsF[] = "#2E4053";//ss
    $colorsF[] = "#85144b"; //55
    $colorsF[] = "#8E0000";//ss
    $colorsF[] = "#006213"; //55
    $startHoursF[] = "10:45";
    $startHoursF[] = "12:55";
    $startHoursF[] = "10:45";
    $startHoursF[] = "12:55";
    $endHoursF[] = "13:00";
    $endHoursF[] = "18:00";
    $endHoursF[] = "13:00";
    $endHoursF[] = "18:00";

    $sizeM = 6;
    $sizeT = 7;
    $sizeW = 3;
    $sizeTh = 7;
    $sizeF = 4;
    $sizeS = 0;
    $sizeSu = 0;

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