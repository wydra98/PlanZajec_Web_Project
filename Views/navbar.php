<head>
    <script src="..\Public\js\jquery-3.4.1.js"></script>
    <link rel="Stylesheet" type="text/css" href="..\Public\css\navbar.css" />
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light navbar-expand-md">
            <a href ="?page=main" ><img src="../Public/img/Repeat Grid 3.png" width="130" height="50" id="logo"></a>
        
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
                 
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#code">KOD PLANU</a>
                        <div class="modal fade" id="code" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" id="codes">
                                        Kod planu
                                    </div>
                                    <div class="modal-body">
                                        Twój kod planu to : <?php echo $_SESSION['code'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  data-href="?page=delete" data-toggle="modal" data-target="#confirm-delete">USUŃ PLAN</a>
                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header" id="delete">
                                        Czy na pewno chcesz usunąć plan?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                                        <a class="btn btn-danger btn-ok">Usuń</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous"></script>
    <script src ="..\Public\bootstrap\js\bootstrap.min.js"></script>
    <script  type="text/JavaScript" src="..\Public\js\js_plan.js"></script>
</body>
