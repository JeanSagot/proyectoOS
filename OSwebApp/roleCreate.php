<?php include "templates/footer.php"; ?>

<link rel="stylesheet" href="css/Style.css">

<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

if (isset($_POST['submit'])) {
	require "../config.php";
	require "../common.php";

	try {
		$connection = new PDO($dsn, $username, $password, $options);
		
		$new_user = array(
			"role" => $_POST['role'],
			"description"  => $_POST['description'],
		);

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"roles",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);
		
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
	
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
	<blockquote><?php echo $_POST['name']; ?> successfully added.</blockquote>
<?php } ?>


<h2>Añade un rol</h2>

<section id="formularioSection">
    <div class="container">

        <div class="formularioDiv">
            <form method="post" class="formulario">
                <br>
                <input type="text" name="role" class="formularioInput" required>
                <labelFormulario class="formularioLabel">Rol</labelFormulario>

                <input type="text" name="description" class="formularioInput" required>
                <labelFormulario class="formularioLabel">Descripcion</labelFormulario>

                <input type="submit" value="ENVIAR" class="formularioSubmit">
            </form>
        </div>

        <a href="index.php">Back to home</a>

        <script src="js/form.js"></script>
        <?php include "templates/footer.php"; ?>