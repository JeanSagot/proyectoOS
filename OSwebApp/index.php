<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Database management</title>

        <link rel="stylesheet" href="css/style.css">
    </head>

    <body id="indexBody">

        <!--Seccion de php para que en todas las paginas este-->
        <!--Modificar  hrefs cuando paginas esten listas-->

        <div class="logoContainer"><h1 class="logo">Aplicacion Web OS</h1></div>


        <section id="menu">
            <h3>Usuarios</h3>

            <div class="userCRUD">
                <a class="hexagonB" href = "create.php">
                    <span>
                        <h2 id="title">- Crear -</h2>
                        <h1 id="info">- añade un usuario</h1></span>
                </a>

                <a class="hexagonG" href = "read.php">
                    <span>
                        <h2 id="title">- Buscar -</h2>
                        <h1 id = "info" >- Encuentra un usuario por apellido</h1>
                    </span>  
                </a>

                <a class="hexagonB" href = "update.php">
                    <span> <h2 id="title">- Modificar -</h2>
                        <h1 id = "info">- Actualiza la informacion de un usuario</h1>
                    </span>
                </a>

                <a class="hexagonG" href = "delete.php">
                    <span>
                        <h2 id="title">- Borrar -</h2>
                        <h1 id = "info">- Borrar a un usuario</h1>
                    </span>
                </a>
            </div>

            <h3>Roles</h3>
            <div class="roleCRUD">

                <a class="hexagonB" href = "roleCreate.php">
                    <span><h2 id="title">- Añadir -</h2>
                        <h1 id = "info">- Añadir un rol</h1>
                    </span>
                </a>
                
                <a class="hexagonG" href = "roleRead.php">
                    <span><h2 id="title">- Buscar -</h2>
                        <h1 id = "info">- Buscar un usuario por rol</h1>
                    </span>
                </a>

                <a class="hexagonB" href = "roleUpdate.php">
                    <span><h2 id="title">- Modificar -</h2>
                        <h1 id = "info">- Modificar un rol</h1>
                    </span>
                </a>

                <a class="hexagonG" href = "roleDelete.php">
                    <span><h2 id="title">- Borrar -</h2>
                        <h1 id = "info">- Borrar un rol</h1>
                    </span>
                </a>
            </div>
        </section>

        <?php include "templates/footer.php"; ?>

    </body>
</html>