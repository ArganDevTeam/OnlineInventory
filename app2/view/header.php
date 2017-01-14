<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= $title ?></title>


        <!-- jQuery library -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css">


    </head>
	<body>
    <section class="container">
		<header>
            <!-- Esta parte del header solo se muestra si el usuario esta autentificado -->

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toogle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php?c=dashboard&a=index">Multi Vendor</a>
                        </div>
                        <?php if ($this->auth()) { ?>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav">
                                <!-- TENGO QUE VER COMO HACER PARA QUE LA CLASS ACTIVE DEPENDA DE LA PAGINA EN LA QUE ESTOY -->
                                <li><a href="index.php?c=product&a=list_products">Inventario<span class="sr-only">(current)</span></a>
                                </li>
                                <li><a href="index.php?c=customers&a=list_customers">Clientes</a>
                                </li>
                                <li>
                                    <a href="#">Proveedores</a>
                                </li>
                                <li><a href="index.php">Ventas</a>
                                </li>
                                <li role="separator" class="divider"></li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a href="#"> <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Usuario'; ?><span style="margin-left: 5px;" class="caret"></span></a></li>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?c=dashboard&a=profile">Perfil</a></li>
                                    <li><a href="index.php?c=dashboard&a=logout">Salir</a></li>
                                </ul>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </nav>

		</header>


	