<?php include "templates/header.php"; ?>
<?php include "templates/footer.php"; ?>

<head>
    <title>OS management web app</title>
</head>

<?php

/**
 * Function to query information based on 
 * a parameter: in this case, role.
 *
 */

/*FROM roles se agarra de la tabla de roles en sql*/

if (isset($_POST['submit'])) {
    try {	
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
						FROM roles 
						WHERE role = :role";

        $role = $_POST['role'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':role', $role, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php  
if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
<h2>Results</h2>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Role</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) { ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["role"]); ?></td>
            <td><?php echo escape($row["description"]); ?></td>
            <td><?php echo escape($row["date"]); ?> </td>
        </tr>
        <?php } ?> 
    </tbody>
</table>
<?php } else { ?>
<blockquote>No results found for <?php echo escape($_POST['role']); ?>.</blockquote>
<?php } 
} ?> 

<h2 id="readTitle">Encuentra informacion por rol</h2>

<div class="searchBar">
    <form method="post">
        <label for="lastName">Rol</label>
        <input type="text" id="role" name="role">
        <input type="submit" name="submit" value="View Results">
    </form>
</div>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
