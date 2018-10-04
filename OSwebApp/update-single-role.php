<?php
/**
 * Use an HTML form to edit an entry in the
 * roles table.
 *
 */
require "../config.php";
require "../common.php";
if (isset($_POST['submit'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $role =[
      "id"        => $_POST['id'],
      "role" => $_POST['role'],
      "description"  => $_POST['description'],
      "date"      => $_POST['date']
    ];

    $sql = "UPDATE roles 
            SET id = :id, 
              role = :role, 
              description = :description, 
              date = :date 
            WHERE id = :id";
  
  $statement = $connection->prepare($sql);
  $statement->execute($role);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
  
if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM roles WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    
    $role = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo escape($_POST['role']); ?> successfully updated.</blockquote>
<?php endif; ?>

<h2>Edit a role</h2>

<form method="post">
    <?php foreach ($role as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?> 
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>