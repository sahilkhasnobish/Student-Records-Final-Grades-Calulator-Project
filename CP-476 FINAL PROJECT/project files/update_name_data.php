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
    if (empty($_POST['sid'])) {
        // Not empty
        header('Location: update_name.php');
    } elseif (!(is_numeric($_POST['sid']) && strlen(strval($_POST['sid'])) == 9)) {
        // 9 characters
        header('Location: update_name.php');
    } elseif (empty($_POST['sname'])) {
        // Not empty
        header('Location: update_name.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare("UPDATE name_table SET `student_name` = ? WHERE `student_id`= ?");
            $stmt->bind_param("ss", $_POST['sname'], $_POST['sid']);
            $stmt->execute();
?>

<html>
    <head>
        <title>Name Updated</title>

        <style>

            body{
                background-color:  #003366;
            }
            h1 {
                padding: 50px 30px;
                text-align: center;
                color: white;
            }

            .button {
                text-align: center;
                background-color: white;
            }
        </style>
    </head>

    <body>
        <h1>Name Updated</h1>

        <div class="button">
            <button onclick="location.href = 'update_name.php';">Back</button>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>
    </body>
</html>

<?php
        } catch (Exception $e) {
?>
<html>
    <head>
        <title>Update Error</title>

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
        <h1>Update Error</h1>

        <div class="button">
            <button onclick="location.href = 'update_name.php';">Try Again</button>
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