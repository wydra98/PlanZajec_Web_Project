<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="..\..\Public\css\style.css" />
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,500" rel="stylesheet">
    <title>PlanZajec</title>
</head>
<body>
    <div class="container">
        <img src="../Public/img/Group 23.png">
        <form action="?page=login" method="POST" onsubmit="return loginValidation();" name="login"> 
            <div class="messages" style="text-align:center;">
                <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                ?>
            </div>
            <label for="first">Email lub nick:</label>
            <input name="emailNick" type="text" id="first">
            <label for="second">Hasło:</label>
            <input name="password" type="password" id="second">
            <button id="login" type="submit">Zaloguj</button>
        </form>
        <a href="?page=registration" id="register">Zarejestruj</a>
    </div>
    <script src="..\Public\js\jquery-3.4.1.js"></script>
    <script  type="text/JavaScript" src="..\Public\js\js_controll.js"></script>
</body>
</html>