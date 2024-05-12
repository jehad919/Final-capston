
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dynamic page example </title>
  <link rel="stylesheet" href="style.css">
  <!-- Google Fonts Links For Icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-GLhlTQ8iNl7l5iDRY3Of1P4QK/D5TPi5FvZ/fY5u73T4" crossorigin="anonymous">

</head>
<body>
   <header>
    <nav class="navbar">
      <a class="logo" href="#">Camera<span>.</span></a>
      <div class="user-info">
     <i class="fas fa-user"></i>

    </div>
      <ul class="menu-links">
        <!-- <span id="close-menu-btn" class="material-symbols-outlined">close</span> -->
        <li><a href="./HomePage/HomePage.php">Home</a></li>
        <!-- <li><a href="../Gear List/mylist.php">Gear List</a></li> -->
      <li><a href="?page=join-us">Join Us</a></li>
<li><a href="?page=contact-us">Contact Us</a></li>
<li><a href="?page=about">About</a></li>

        <li><a href="./">Logout</a></li>
        <!-- Display username here -->
        <li id="username-container"></li>
      </ul>
      
      <!-- <span id="hamburger-btn" class="material-symbols-outlined">menu</span> -->
    </nav>
  </header>
      <?php
$page = isset($_GET['page']) ? $_GET['page'] : 'default';

if ($page !== 'default') {
    echo "<p style='margin: 100px;'>You are now on the " . ucfirst(str_replace('-', ' ', $page)) . " page.</p>";
} else {
    echo "<p style='margin: 100px;'>Welcome to our site.</p>";
}
switch ($page) {
    case 'contact-us':
        echo '<h1 style="margin: 50px;">Contact Us Page</h1>';
        break;
    case 'join-us':
        echo '<h1 style="margin: 50px;">Join Us Page</h1>';
        break;
    case 'about':
        echo '<h1 style="margin: 50px;">About Page</h1>';
        break;
    default:
        echo '<h1 style="margin: 50px;">Home Page</h1>';
        break;
}
?>


</body>
</html>
