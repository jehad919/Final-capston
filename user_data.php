<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'capstone');

// Check if the username parameter is set in the URL
if (isset($_GET['username'])) {
    $username = mysqli_real_escape_string($conn, $_GET['username']);

    // Fetch user data based on the username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
    } else {
        $userData = null;
    }
} else {
    // Redirect to the home page if username is not provided
    header('location: /Capstone/HomePage/HomePage.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="./My List/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 190px auto;
            background-color: #3ec04d;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        .attribute {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .form-control label {
            display: block;
            font-weight: bold;
        }

        .form-control input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-control input:disabled {
            background-color: #f4f4f4;
        }

        .button-container {
            text-align: center;
        }

        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
    <nav class="navbar">
      <a class="logo" href="#">Camera<span>.</span></a>
      <div class="user-info">
        <i class="fas fa-user"></i>
        <span><?php echo htmlspecialchars($username); ?></span>
      </div>
      <ul class="menu-links">
        <li><a href="HomePage/HomePage.php">Home</a></li>
        <li><a href="../../Dynamic.php?page=join-us">Join Us</a></li>
        <li><a href="../../Dynamic.php?page=contact-us">Contact Us</a></li>
        <li><a href="../../Dynamic.php?page=about">About</a></li>
        <li><a href="login.php">Logout</a></li>
      </ul>
    </nav>
  </header>
    <?php if ($userData): ?>
        <div class="container">
            <h2>User Data for <?php echo $userData['username']; ?></h2>
            <form action="HomePage/HomePage.php" method="post">
                <div class="form-control">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $userData['username']; ?>" disabled>
                </div>
                <div class="form-control">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>">
                </div>
                <div class="form-control">
                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" value="<?php echo $userData['gender']; ?>">
                </div>
                <div class="form-control">
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="birthday" value="<?php echo date('Y-m-d', strtotime($userData['birthday'])); ?>">
</div>

                <div class="button-container">
                    <button type="submit" class="button">Save Changes</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <p>No user data available for the specified username.</p>
    <?php endif; ?>
</body>
</html>

