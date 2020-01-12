<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="..\Public\css\registration.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
    <div class="container">
        <label id="registration">REJESTRACJA</label>
        
        <div class="messages" id="registrationMessages">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
        </div>
       
        <form action="?page=verifyregistration" method="POST" onsubmit="return registrationValidation();" name="registration">  
            <label for="first">E-mail:</label>
            <input name="email" type="text" id="first">
            <label for="second">Nick:</label>
            <input name="nick" type="text" id="second">
            <label for="third">Hasło:</label>
            <input name="password1" type="password" id="third">
            <label for="fourth">Powtórz hasło:</label>
            <input name="password2" type="password" id="fourth">
            <button id="register" type="submit">Zarejestruj</button>
        </form>
        <a href="?page=login" ><label>Powrót do logowania</label></a>
    </div>
    <script src="..\Public\js\jquery-3.4.1.js"></script>
    <script  type="text/JavaScript" src="..\Public\js\js_controll.js"></script>
</body>
</html>