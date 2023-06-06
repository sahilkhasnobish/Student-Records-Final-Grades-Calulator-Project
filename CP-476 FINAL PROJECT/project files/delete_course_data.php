<?php
include __DIR__ . '/Helper/DotEnv.php';
(new DotEnv(__DIR__ . '/.env'))->load();
    $host = 'db';
    $user = "root";
    $pass = getenv('MYSQL_ROOT_PASSWORD');

    // Connect to database
    $conn = new mysqli($host, $user, $pass, 'InternetComputing');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check inputs
    if (empty($_POST['sid'])) {
        $_SESSION['status'] = "Student ID cannot be empty";
        header('Location: delete_course.php');
    } elseif (!(is_numeric($_POST['sid']) && strlen(strval($_POST['sid'])) == 9)) {
        $_SESSION['status'] = "Student ID must be an integer with 9 characters";
        header('Location: delete_course.php');
    } elseif (empty($_POST['cid'])) {
        $_SESSION['status'] = "Course ID cannot be empty";
        header('Location: delete_course.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare("DELETE FROM course_table WHERE `student_id` = ? AND `course_id` = ?");
            $stmt->bind_param("ss", $_POST["sid"], $_POST["cid"]);
            $stmt->execute();
?>

<html>
    <head>
        <title>Course Deleted</title>

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
        <h1>Course Deleted</h1>

        <div class="button">
            <button onclick="location.href = 'delete_course.php';">Back</button>
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