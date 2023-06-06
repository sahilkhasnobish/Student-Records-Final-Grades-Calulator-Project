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
        header('Location: insert_name.php');
    } elseif (!(is_numeric($_POST['sid']) && strlen(strval($_POST['sid'])) == 9)) {
        $_SESSION['status'] = "Student ID must be an integer with 9 characters";
        header('Location: insert_name.php');
    } elseif (empty($_POST['sname'])) {
        $_SESSION['status'] = "Student name cannot be empty";
        header('Location: insert_name.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare('INSERT INTO Name (StudentID, StudentName) VALUES (?, ?)');
            $stmt->bind_param("ss", $sid, $name);
            $sid = $_POST['sid'];
            $name = $_POST['sname'];
            $stmt->execute();
?>

<html>
    <head>
        <title>Student Inserted</title>

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
        <h1>Student Inserted</h1>

        <div class="button">
            <button onclick="location.href = 'insert_name.php';">Back</button>
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
        <title>Insert Error</title>

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
        <h1>Insert Error or Student already exists</h1>

        <div class="button">
            <button onclick="location.href = 'insert_name.php';">Try Again</button>
        </div>
    </body>
</html>
<?php
        }
?>

<?php
    }
    // Close connection
    $conn->close();
?>