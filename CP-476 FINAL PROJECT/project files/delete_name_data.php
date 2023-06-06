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
        $_SESSION['status'] = "Student ID cannot be empty";
        header('Location: delete_name.php');
    } elseif (!(is_numeric($_POST['sid']) && strlen(strval($_POST['sid'])) == 9)) {
        $_SESSION['status'] = "Student ID must be an integer with 9 characters";
        header('Location: delete_name.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare("DELETE FROM name_table WHERE `student_id` = ?");
            $stmt->bind_param("s", $_POST['sid']);
            $stmt->execute();
?>

<html>
    <head>
        <title>Student Deleted</title>

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
        <h1>Student Deleted</h1>

        <div class="button">
            <button onclick="location.href = 'delete_name.php';">Back</button>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>
    </body>
</html>

<?php
        } catch (Exception $e) {
            echo "Error: " . $conn->error;
        }
    }
    // Close connection
    $conn->close();
?>