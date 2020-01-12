<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Public\bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\Public\css\main.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
<?php include(dirname(__DIR__).'\Views\navbarprimary.php'); ?>    
    <div class="container">
        <div class="row">

        <div class="col-8 offset-2 col-md-6 offset-md-3" id = "messages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>

            <div class="col-12 col-lg-6">
                <a href="?page=information" class="btn btn-info btn-lg" role="button" id="applicationButton"><label id="applicationLabel">O APLIKACJI</label></a>
            </div>

            <div class="col-12 col-lg-6">
                <label class="mainlabel" id="thefirst">
                    <label class="labelhigh">WYBIERZ PLAN</label>
                    <form action="?page=plan" method="POST" onsubmit="return confirmPlanValidation();" name="confirm">
                        <div class="form-group">
                            <select name="id" class="form-control">
                                <?php
                                 foreach($_SESSION['weeks'] as $week){
                                    echo'<option value="'.$week->getId().'">'.$week->getName().'</option>';}
                                ?>    
                            </select>
                        <button id="confirm" type="submit" class="btn">Zatwierdź</button>
                    </div>
                </form>
                </label>
            </div>

            <div class="col-12 col-lg-6">
            <label class="mainlabel" id="thesecondone">
                <label class="labelhigh" id="addNewPlan">DODAJ NOWY PLAN</label>
                <form  action="?page=verifyNewPlan" method="POST"  onsubmit="return newNamePlanValidation();" name="newPlan">
                    <div class="form-group">
                        <label for="u"  class="usr">Nazwa nowego planu:</label>
                        <input name="namePlan" type="text" class="form-control" id="u">
                    </div>
                    <input id="confirm" type="submit" class="btn" value="Dodaj">
                </form>
            </label>
            </div>

            <div class="col-12 col-lg-6">
            <label class="mainlabel" id="thethirdone">
                <label class="labelhigh" id="addNewSharePlan">DODAJ UDOSTĘPNIONY PLAN</label>
                <form  action="?page=verifySharePlan" method="POST" onsubmit="return newShareNamePlanValidation();" name='newSharePlan'>
                    <div class="form-group">
                        <label for="usr">Kod planu:</label>
                        <input name="code" type="text" class="form-control" class="usr" >
                    </div>
                    <div class="form-group">
                        <label for="usr">Twoja nazwa planu:</label>
                        <input name="newPlanName" type="text" class="form-control" class="usr">
                    </div>
                    <input id="confirm" type="submit" class="btn" value="Dodaj">
                </form>
            </label>
            </div>
        </div>
    </div>

    <script src="..\Public\js\jquery-3.4.1.js"></script>
    <script  type="text/JavaScript" src="..\Public\js\js_validation.js"></script>
</body>
</html>