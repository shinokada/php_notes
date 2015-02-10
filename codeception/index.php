<?php
    $conn = new PDO('mysql:host=localhost;dbname=codeception-learning', 'root', 'sokada' );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    function getUsers($conn)
    {
      return $conn->query('SELECT * FROM users')->fetchAll(PDO::FETCH_OBJ);
    }
    
    function addUser($user, $conn)
    {
      $stmt = $conn->prepare('INSERT INTO users (email) VALUES( :email)');
      $stmt->execute(array(
        ':email' => $user['email']
      ));
    }
    if(isset($_POST['submit']))
    {
      addUser(['email' => $_POST['email']], $conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  welcome
  <ul>     
<?php foreach(getUsers($conn) as $user) :?>
      <li> <?= $user->email; ?></li>
    <?php endforeach; ?>
  </ul>    
<form method="post">
      <input type="email" name="email"> 
     <input type="submit" name="submit" value="Add User">
    </form>
</body>
</html>
