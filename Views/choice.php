<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Public\bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\Public\css\choice.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
<?php include(dirname(__DIR__).'\Views\navbar.php'); ?>    
   
 <form action="?page=verifylesson" method="POST" onsubmit="return newLessonValidation();" name='newLesson'>
    <div class="container"> 
        <div class="row">
        
            <div class="col-8 offset-2 col-md-6 offset-md-3" id="choiceMesagges">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>

            <div class="col-8 offset-2 col-md-4 offset-md-5">
                <label id="addLessonLabel">Dodaj lekcję:</label>
            </div>
            
            <div class="col-8 offset-2 col-md-6 offset-md-3">
                <label class="labels "for="usr">Nazwa przedmiotu:</label>
                <input name="lessonName" type="text" class="form-control" id="usr">
            </div>

            <div class="col-8 offset-2 col-md-4 offset-md-1" class="allDivFinishStart">
                <label id="start" class="start_finish">Rozpoczęcie:</label>
                <label for="usr" class="labels">Godzina:</label>
                <input name="startHour" type="text" class="form-control" id="usr">
                <label for="usr" class="labels">Minuta:</label>
                <input name="startMinute" type="text" class="form-control" id="usr">
            </div>

            <div class="col-8 offset-2 col-md-4" class="allDivFinishStart">
                <label id="finish" class="start_finish">Zakończenie:</label>
                <label for="usr" class="labels">Godzina:</label>
                <input name="endHour" type="text" class="form-control" id="usr">
                <label for="usr" class="labels">Minuta:</label>
                <input name="endMinute" type="text" class="form-control" id="usr">
            </div>

            <div class="col-8 offset-2 col-md-6 offset-md-3">
                    <label for="sel1" id="checkColor">Wybierz kolor:</label>
                    <select name="color" class="form-control" id="sel1">
                        <option value="#2E4053">Szaro-niebieski</option>
                        <option value="#8E0000">Bordowy</option>
                        <option value="#85144b">Fuksja</option>
                        <option value="#006213">Zielony</option>
                        <option value="#3c0044">Fioletowy</option>
                    </select>
            </div>

            <button class="btn btn-primary offset-4 col-4 col-lg-4 offset-lg-4" type="submit" id="submitButton">Dodaj</button>
            <button class="offset-4 col-4 col-lg-4 offset-lg-4" id = "returnToPlan"><a href="?page=plan" ><label id = "return">Powrót do planu</label></a></div>      
        </div>
    </div>
 </form>
    <script src="..\Public\js\jquery-3.4.1.js"></script>
    <script  type="text/JavaScript" src="..\Public\js\js_validation.js"></script>
</body>
</html>