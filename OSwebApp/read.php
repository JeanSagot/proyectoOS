<?php include "templates/header.php"; ?>
<?php include "templates/footer.php"; ?>

<head>
    <title>OS management web app</title>
</head>

<?php

/**
 * Function to query information based on 
 * a parameter: in this case, lastName.
 *
 */

if (isset($_POST['submit'])) {
    try {	
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
						FROM users
						WHERE lastName = :lastName";

        $lastName = $_POST['lastName'];

        $statement = $connection->prepare($sql);
        $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) { ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["mail"]); ?></td>
            <td><?php echo escape($row["phone"]); ?></td>
            <td><?php echo escape($row["role"]); ?></td>
            <td><?php echo escape($row["date"]); ?> </td>
        </tr>
        <?php } ?> 
    </tbody>
</table>
<?php } else { ?>
<blockquote>No results found for <?php echo escape($_POST['lastName']); ?>.</blockquote>
<?php } 
} ?> 

<h2 id="readTitle">Encuentra el usuario por apellido</h2>

<div class="searchBar">
    <form method="post">
        <label for="lastName">Apellido</label>
        <input type="text" id="lastName" name="lastName">
        <input type="submit" name="submit" value="View Results">
    </form>
</div>

<a href="index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
