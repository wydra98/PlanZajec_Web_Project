
<head>
    <style>
    .nav-item{
        margin-right: 20px;
        padding-left: 5px;}
    </style>
</head>
<body>
    <header style="font-weight: bold;
    font-family: 'Quicksand', sans-serif;">
        <nav class="navbar navbar-light bg-light navbar-expand-md">
            <img src="../Public/img/Repeat Grid 3.png" width="130" height="50" style="margin-top: -22px">
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
				<span class="navbar-toggler-icon" ></span>
            </button>

            <div class="collapse navbar-collapse navbar-right" id="menu">
               <ul class="navbar-nav ml-auto" >
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button">TYDZIEŃ</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?page=weekOne" method="POST">Tydzień pierwszy</a>
                            <a class="dropdown-item" href="?page=weekTwo">Tydzień drugi</a>
                        </div>
                    </li>
                    <li class="nav-item" >
                       <a class="nav-link" href="?page=choice">DODAJ LEKCJĘ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link">UDOSTĘPNIJ PLAN</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?page=logout">WYLOGUJ</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</body>
