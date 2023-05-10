<?php /*<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <form method="POST" action="dashboard.php">
        <label for="Username">Nombre: </label>
        <input type="text" name="Username" value="<?php echo $username['Username'];?>">

        <label for="email">Correo: </label>
        <input type="email" value="<?php echo $username["email"];?>">

        <label for="password">Contraseña Actual:</label>
        <input type="password" name="password">

        <label for="newPassword">Nueva Contraseña: </label>
        <input type="password" name="newPassword">

        <input type="submit" name="submit" value="Update">
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>*/?>

<?php
    $expenses               = $this->d['expenses'];
    $totalThisMonth         = $this->d['totalAmountThisMonth'];
    $maxExpensesThisMonth   = $this->d['maxExpensesThisMonth'];
    $username                   = $this->d['username'];
    $categories             = $this->d['categories'];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>ProyectoMVC</title>
        <link href="assets/css/ollie.css" rel="stylesheet" />    
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <img src="public/img/logo.png" alt="" width="35" height="35" class="ml-1">
            <a class="navbar-brand" href="dashboard">GASTOS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="text-light"><?php echo $username->getName(); ?></div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
            
                <div class="text-light"> <?php $this->showMessages();?> </div>
                
                <li class="nav-item dropdown">
                    
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-username fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        
                        <a class="dropdown-item" href="username">Ver Perfil</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout">Exit</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Principal</div>
                            <a class="nav-link" href="dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Operaciones</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Acciones 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <button class="btn-main btn btn-info" id="new-expense">
                            
                            <span>Nuevo gasto</span>
                        </button>
                                    <a class="nav-link" id="new-expenses" href="expenses/create">Nuevo gasto</a>
                                    <a class="nav-link" href="username#budget-username-container">Definir presupuesto</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Gastos</div>
                           
                            <a class="nav-link" href="expenses">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Historial
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $username->getName() ?>
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Principal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Bienvenido</li>
                            <?php $this->showMessages();?>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Balance General del Mes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    
                                        <?php
                                            if($totalThisMonth === NULL){
                                                showError('Hubo un problema al cargar la información');
                                            }else{?>
                                                <span class="<?php echo ($username->getBudget() < $totalThisMonth)? 'broken': '' ?>">$<?php
                                                    echo number_format($totalThisMonth, 2);?>
                                                </span>
                                        <?php }?>
                                
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">de
                                    $<?php 
                                        echo number_format($username->getBudget(),2) . ' mensuales te restan';
                                    ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    if($totalThisMonth === NULL){
                                        showError('Hubo un problema al cargar la información');
                                    }else{?>
                                        <span>
                                            <?php
                                                $gap = $username->getBudget() - $totalThisMonth;
                                                if($gap < 0){
                                                    echo "-$" . number_format(abs($username->getBudget() - $totalThisMonth), 2);
                                                }else{
                                                    echo "$" . number_format($username->getBudget() - $totalThisMonth, 2);
                                                }    
                                        ?>
                                        </span>
                                <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Gasto más grande del mes</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php
                                    if($totalThisMonth === NULL){
                                        showError('Hubo un problema al cargar la información');
                                    }else{?>
                                        <span>$<?php
                                        echo number_format($maxExpensesThisMonth, 2);?>
                                        </span>
                                <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Gastos del Mes por categoria
                                    </div>
                                    <div class="card-body"><?php
                            if($categories === NULL){
                                showError('Datos no disponibles por el momento.');
                            }else{
                                foreach ($categories as $category ) { ?>
                                    <div class="card w-30 bs-1" style="background-color: <?php echo $category['category']->getColor() ?>">
                                        <div class="content category-name">
                                            <?php echo $category['category']->getName() ?>
                                        </div>
                                        <div class="title category-total">$<?php echo $category['total'] ?></div>
                                        <div class="content category-count">
                                            <p><?php
                                                $count = $category['count'];
                                                if($count == 1){
                                                    echo $count . " transacción";
                                                }else{
                                                    echo $count . " transacciones";
                                                }
                                            ?></p>
                                        </div>
                                    </div>
                        <?php   }
                            }
                        ?></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Registros más recientes
                                    </div>
                                    <div class="card-body"><?php
                         if($expenses === NULL){
                            showError('Error al cargar los datos');
                        }else if(count($expenses) == 0){
                            showInfo('No hay transacciones');
                        }else{
                            foreach ($expenses as $expense) { ?>
                            <div class='preview-expense'>
                                <div class="left">
                                    <div class="expense-date"><?php echo $expense->getDate(); ?></div>
                                    <div class="expense-title"><?php echo $expense->getTitle(); ?></div>
                                </div>
                                <div class="right">
                                    <div class="expense-amount">$<?php echo number_format($expense->getAmount(), 2);?></div>
                                </div>
                            </div>
                            
                            <?php
                            }
                            echo '<div class="more-container"><a href="expenses">Ver todos los gastos<i class="material-icons"> - > </i></a></div>';
                        } 
                     ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
        <script src="public/js/scripts.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="public/js/dashboard.js"></script>
        
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
        <script src="public/assets/demo/datatables-demo.js"></script>
    </body>
</html>
