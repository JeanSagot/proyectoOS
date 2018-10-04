<?php include "templates/header.php"; ?>
<?php

/**
 * List all users with a link to edit
 */

try {
  require "../config.php";
  require "../common.php";

  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
        
<h2>Modificar usuarios</h2>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Address</th>
      <th>Phone</th>
      <th>Role</th>
      <th>Date</th>
      <th>Edit</th>
    </tr>
  </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["id"]); ?></td>
        <td><?php echo escape($row["name"]); ?></td>
        <td><?php echo escape($row["lastName"]); ?></td>
        <td><?php echo escape($row["mail"]); ?></td>
        <td><?php echo escape($row["phone"]); ?></td>
        <td><?php echo escape($row["role"]); ?></td>
        <td><?php echo escape($row["date"]); ?> </td>
        <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>