<?php
    include __DIR__ . '/Helper/DotEnv.php';
    (new DotEnv(__DIR__ . '/.env'))->load();
    $host = 'db';
    $user = "root";
    $pass = getenv('MYSQL_ROOT_PASSWORD');
    
    // check the MySQL connection status
    $conn = new mysqli($host, $user, $pass, 'InternetComputing');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check inputs
    if (empty($_POST['username'])) {
        // Not empty
        header('Location: loginpage.php');
    } elseif (!(is_numeric($_POST['username']) && strlen(strval($_POST['username'])) == 9)) {
        // 9 characters
        header('Location: loginpage.php');
    } elseif (empty($_POST['user_pass'])) {
        // Not empty
        header('Location: loginpage.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare("UPDATE login_table SET `user_name` = ? WHERE `user_password`= ?");
            $stmt->bind_param("ss", $_POST['sname'], $_POST['sid']);
            $stmt->execute();
?>

<html>
    <head>
        <title>Login Successful</title>

        <style>
            h1 {
                text-align: center;
            }

            .button {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Login Successful</h1>

        <div class="button">
            <button onclick="location.href = 'home.php';">Continue</button>
        </div>
    </body>
</html>

<?php
        } catch (Exception $e) {
?>
<html>
    <head>
        <title>Incorrect Password</title>

        <style>
            h1 {
                text-align: center;
            }

            .button {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Incorrect Password</h1>

        <div class="button">
            <button onclick="location.href = 'loginpage.php';">Try Again</button>
        </div>
    </body>
</html>
<?php
    echo $conn->error;
        }
?>

<?php
    }
    // Close connection
    $conn->close();
?>