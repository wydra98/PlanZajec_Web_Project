<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="../css/bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <a href="#" class="btn btn-info btn-lg" role="button" style="background-color: #8E0000; border:3px solid rgb(58, 0, 0)"><label>O APLIKACJI</label></a>
            </div>

            <div class="col-12 col-md-6">
                <a href="#" class="btn btn-info btn-lg" role="button" style="background-color: #000066; border:3px solid rgb(0, 1, 58)"><label>GENERUJ PLAN</label></a>
            </div>

            <div class="col-12 col-md-6">
                <label class="mainlabel" id="thefirst"  style="background-color: #006213; border:3px solid rgb(0, 58, 0)">
                    <label class="labelhigh">WYBIERZ PLAN</label>
                    <form>
                        <div class="form-group">
                            <select class="form-control">
                                <?php
                                $size = 2;
                                $name[]= "2016/2017";
                                $name[]= "2017/2018";
                                    for($x=0;$x<$size;$x++){
                                        echo'<option>'.$name[$x].'</option>';}
                                ?>    
                            </select>
                        <input id="confirm" type="submit" class="btn" value="Zatwierdź">
                    </div>
                </form>
                </label>
            </div>

            <div class="col-12 col-md-6">
            <label class="mainlabel" id="thelastone" style="background-color: #3c0044; border:3px solid rgb(51, 0, 38)">
                <label class="labelhigh" style="margin-top:0px">WCZYTAJ PLAN</label>
                <form>
                    <div class="form-group">
                        <label for="usr">Nick lub e-mail:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                    <div class="form-group">
                        <label for="usr">Nazwa planu:</label>
                        <input type="text" class="form-control" id="usr">
                    </div>
                    <input id="confirm" type="submit" class="btn" value="Zatwierdź">
                </form>
            </label>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
     integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
     crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>

    <script src ="../js/bootstrap.min.js"></script>
</body>
</html>