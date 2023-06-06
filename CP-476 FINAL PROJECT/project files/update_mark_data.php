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
        header('Location: update_mark.php');
    } elseif (!(is_numeric($_POST['sid']) && strlen(strval($_POST['sid'])) == 9)) {
        $_SESSION['status'] = "Student ID must be an integer with 9 characters";
        header('Location: update_mark.php');
    } elseif (empty($_POST['cid'])) {
        $_SESSION['status'] = "Course ID cannot be empty";
        header('Location: update_mark.php');
    } elseif (!(ctype_alpha(substr($_POST['cid'], 0, 2)) && is_numeric(substr($_POST['cid'], 2)))) {
        $_SESSION['status'] = "Course ID must have 2 letters";
        header('Location: update_mark.php');
    }
    // Check test 1 scores
    elseif (empty($_POST['t1']) and $_POST['t1'] !== '0') {
        $_SESSION['status'] = "Updated grade cannot be empty";
        header('Location: update_mark.php');
    } elseif (!(is_numeric($_POST['t1']))) {
        $_SESSION['status'] = "Updated grade must be a number";
        header('Location: update_mark.php');
    } elseif ((float)$_POST['t1'] < 0 or (float)$_POST['t1'] > 100) {
        $_SESSION['status'] = "Updated grade must be between 0 and 100";
        header('Location: update_mark.php');
    }
    // Check test 2 scores
    elseif (empty($_POST['t2']) and $_POST['t2'] !== '0') {
        $_SESSION['status'] = "Updated grade cannot be empty";
        header('Location: update_mark.php');
    } elseif (!(is_numeric($_POST['t2']))) {
        $_SESSION['status'] = "Updated grade must be a number";
        header('Location: update_mark.php');
    } elseif ((float)$_POST['t2'] < 0 or (float)$_POST['t2'] > 100) {
        $_SESSION['status'] = "Updated grade must be between 0 and 100";
        header('Location: update_mark.php');
    }
    // Check test 3 scores
    elseif (empty($_POST['t3']) and $_POST['t3'] !== '0') {
        $_SESSION['status'] = "Updated grade cannot be empty";
        header('Location: update_mark.php');
    } elseif (!(is_numeric($_POST['t3']))) {
        $_SESSION['status'] = "Updated grade must be a number";
        header('Location: update_mark.php');
    } elseif ((float)$_POST['t3'] < 0 or (float)$_POST['t3'] > 100) {
        $_SESSION['status'] = "Updated grade must be between 0 and 100";
        header('Location: update_mark.php');
    }
    // Check final scores
    elseif (empty($_POST['fexam']) and $_POST['fexam'] !== '0') {
        $_SESSION['status'] = "Updated grade cannot be empty";
        header('Location: update_mark.php');
    } elseif (!(is_numeric($_POST['fexam']))) {
        $_SESSION['status'] = "Updated grade must be a number";
        header('Location: update_mark.php');
    } elseif ((float)$_POST['fexam'] < 0 or (float)$_POST['fexam'] > 100) {
        $_SESSION['status'] = "Updated grade must be between 0 and 100";
        header('Location: update_mark.php');
    } else {
        // Fill in tables
        try {
            $stmt = $conn->prepare("UPDATE course_table SET `test_1` = ?, `test_2` = ?, `test_3` = ?, `final_exam` = ? WHERE `student_id` = ? AND `course_id` = ?");
            $stmt->bind_param("ssssss", $_POST['t1'], $_POST['t2'], $_POST['t3'], $_POST['fexam'], $_POST['sid'], $_POST['cid']);
            $stmt->execute();
?>

<html>
    <head>
        <title>Updated Mark</title>

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
        <h1>Update Mark</h1>

        <div class="button">
            <button onclick="location.href = 'update_mark.php';">Back</button>
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
        <h1>Update Error</h1>

        <div class="button">
            <button onclick="location.href = 'update_mark.php';">Try Again</button>
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