<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\..\Public\css\choice.css" />
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
    <form action="?page=verifylesson" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                    <label for="sel1">Wybierz dzień:</label>
                    <select name="dayName" class="form-control" id="sel1">
                        <option value="poniedzialek">Poniedziałek</option>
                        <option value="wtorek">Wtorek</option>
                        <option value="środa">Środa</option>
                        <option value="czwartek">Czwartek</option>
                        <option value="piątek">Piątek</option>
                        <option value="sobota">Sobota</option>
                        <option value="niedziela">Niedziela</option>
                    </select>
            </div>
            <div class="col-8 offset-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                <label for="usr">Nazwa przedmiotu:</label>
                <input name="lessonName" type="text" class="form-control" id="usr">
            </div>
            <div class="col-8 offset-2 col-md-4 offset-md-1" style="display:flex; flex-direction: column;">
                <label style="color:blue; margin-bottom:-5px;  margin-top:30px">Rozpoczęcie:</label>
                <label for="usr">Godzina:</label>
                <input name="startHour" type="text" class="form-control" id="usr">
                <label for="usr">Minuta:</label>
                <input name="startMinute" type="text" class="form-control" id="usr">
            </div>
            <div class="col-8 offset-2 col-md-4" style="display:flex; flex-direction: column;">
                <label style="color:red; margin-bottom:-5px;  margin-top:30px">Zakończenie:</label>
                <label name="endHour" for="usr">Godzina:</label>
                <input type="text" class="form-control" id="usr">
                <label for="usr">Minuta:</label>
                <input name="endMinute" type="text" class="form-control" id="usr">
            </div>
            <div class="col-8 offset-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                    <label for="sel1" style="margin-top: 30px">Wybierz kolor:</label>
                    <select name="color" class="form-control" id="sel1">
                        <option value="#2E4053">Szaro-niebieski</option>
                        <option value="#8E0000">Bordowy</option>
                        <option value="#85144b">Fuksja</option>
                        <option value="#006213">Zielony</option>
                        <option value="#3c0044">Fioletowy</option>

                    </select>
            </div>
            <button class="btn btn-primary offset-4 col-4" type="submit" style="background-color:#8E0000; border: 3px solid rgb(58, 0, 0);  margin-top:30px">Dodaj</button>

        </div>
    </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
    crossorigin="anonymous"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
   
    <script src ="..\Bootstrap\js\bootstrap.min.js"></script>
</body>
</html>