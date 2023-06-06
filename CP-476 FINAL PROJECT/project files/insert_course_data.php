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
        header('Location: insert_course.php');
    } elseif (!(is_numeric($_POST['sid']) && strlen(strval($_POST['sid'])) == 9)) {
        $_SESSION['status'] = "Student ID must be an integer with 9 characters";
        header('Location: insert_course.php');
    } elseif (empty($_POST['cid'])) {
        $_SESSION['status'] = "Course ID cannot be empty";
        header('Location: insert_course.php');
    } elseif (!(ctype_alpha(substr($_POST['cid'], 0, 2)) && is_numeric(substr($_POST['cid'], 2)))) {
        $_SESSION['status'] = "Course ID must have 2 letters";
        header('Location: insert_course.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare('INSERT INTO Course (StudentID, CourseCode, Test1, Test2, Test3, FinalExam) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->bind_param("ssssss", $sid, $cid, $test1, $test2, $test3, $final_exam);
            $sid = $_POST['sid'];
            $cid = $_POST['cid'];
            $test1 = $_POST['t1'];
            $test2 = $_POST['t2'];
            $test3 = $_POST['t3'];
            $final_exam = $_POST['fexam'];
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
        <h1>Course Inserted</h1>

        <div class="button">
            <button onclick="location.href = 'insert_course.php';">Back</button>
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
        <h1>Insert Error</h1>

        <div class="button">
            <button onclick="location.href = 'insert_course.php';">Try Again</button>
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