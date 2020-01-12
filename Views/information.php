<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="Stylesheet" href="..\Public\bootstrap\css\bootstrap.min.css" />
    <link rel="Stylesheet" type="text/css" href="..\Public\css\information.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
<?php include(dirname(__DIR__).'\Views\navbarprimary.php'); ?>    
    <div class="container">
        <div class="row">
            <div class="offset-1 col-10 offset-md-2 col-md-8 ">
                <h5>Aplikacja</h5>
                 <hr></hr>
                <label>Aplikacja umożliwa tworzenie własnych planów zajęć, kopiowanie planów zajęć innych użytkowników
                , a także ich modyfikację. W aplikacji mamy dostępny panel menu i panel edycji.</label>            
                <h5>Panel menu</h5> 
                <hr></hr>
                <label>W menu są do wyboru następujące opcje:</label>           
                <label class="samlabel">O Aplikacji</label> 
                <label>W której znajdują się informacje dotyczące aplikacji.</label>           
                <label class="samlabel">Wybierz plan</label> 
                <label>W której można wybrać plan.</label>        
                <label class="samlabel">Dodaj nowy plan</label> 
                <label>W której można dodać nowy plan i nadać mu odpowiednią nazwę.</label>            
                <label class="samlabel">Dodaj udostępniony plan</label> 
                <label>W której można skopiować plan innego użytkownika, gdy zostanie wpisany odpowiedni kod udostępnionego planu.</label>      
                <h5>Panel edycji</h5> 
                <hr></hr>
                <label>W panelu edycji są do wyboru następujące opcje:</label>           
                <label class="samlabel">Wybór tygodnia</label> 
                <label>W której można wybrać tydzień pierwszy bądź drugi w zależności od potrzeby.</label>           
                <label class="samlabel">Kod planu</label> 
                <label>W której można pobrać kod planu, aby udostępnić go innemu użytkownikowi.</label>        
                <label class="samlabel">Usuń plan</label> 
                <label>Opcja ta usuwa dany plan wraz z wszystkimi lekcjami się w nim znajdującymi.</label>            
                <label class="samlabel">Usuń lekcję</label> 
                <label>Każda pojedyncza lekcja zostanie usunięta, gdy użytkownik ją wybierze.</label> 
                <label class="samlabel">Dodaj lekcję</label> 
                <label>Do każdego dnia można dodać lekcję podając jej nazwę, czas rozpoczęcia, czas zakończenia oraz kolor.</label>       
            </div>
        </div>
    </div>

</body>
</html>