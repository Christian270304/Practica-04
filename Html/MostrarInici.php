<!-- Christian Torres Barrantes -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link href="Estilos/estilosInicio.css" rel="stylesheet">
</head>
<body>
    
    <div class="container"> 
        <div class="nav-grid">
            <nav class="nav-bar">
                <ul>
                    <li><a href="index.php?pagina=Login"><span>Iniciar Sesion</span></a></li>
                    <li><a href="index.php?pagina=SignUp"><span>Crear Cuenta</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="content">
            <form method="get" action="">
                <label for="articulosPorPagina">Artículos por página:</label>
                <?php
                $totalArticulos = totArticles(); // Obtener el total de artículos
                ?>
                <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? (int)$_GET['page'] : 1; ?>">
                <input type="hidden" name="pagina" value="<?php echo isset($_GET['pagina']) ? $_GET['pagina'] : 'Mostrar'; ?>">
                <input type="number" name="articulosPorPagina" id="articulosPorPagina" 
                    value="<?php echo isset($_GET['articulosPorPagina']) ? $_GET['articulosPorPagina'] : 5; ?>" 
                    min="1" max="<?php echo $totalArticulos; ?>">
                <button type="submit">Actualizar</button>
            </form>

            <?php
            // Obtener la página actual de la URL, por defecto es 1
            $paginaActual = validarEntero('page', 1, 1, ceil($totalArticulos / 1));
            $articulosPorPagina = validarEntero('articulosPorPagina', 5, 1, $totalArticulos); // Número de artículos por página

            echo mostrarArticulos(false, 'Mostrar' , $paginaActual, $articulosPorPagina);  // Usar el valor de artículos por página
            ?>
        </div>
    </div>
</body>
</html>