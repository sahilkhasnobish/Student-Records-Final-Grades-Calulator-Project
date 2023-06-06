<?php
    include __DIR__ . '/Helper/DotEnv.php';
    (new DotEnv(__DIR__ . '/.env'))->load();
    // Connect to database
    $host = 'db';
    $user = "root";
    $pass = getenv('MYSQL_ROOT_PASSWORD');

    // check the MySQL connection status
    $conn = new mysqli($host, $user, $pass, 'InternetComputing');

    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    // Create database
    
    try {
        $sql = "CREATE DATABASE cp476";
        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        }
        $conn->close();
    } catch (Exception $e) {
        echo "Error creating database, or already exists";
        $conn->close();
    }

    // Reconnect to database
    $dbname = 'cp476';
    $conn = new mysqli($host, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // drop tables
    try {
        $sql = "DROP TABLE IF EXISTS course_table";
        if ($conn->query($sql) === TRUE) {
            echo "\nTable course_table deleted successfully";
        }
    } catch (Exception $e) {
        echo "\nError deleting table, or already deleted";
    }

    try {
        $sql = "DROP TABLE IF EXISTS name_table";
        if ($conn->query($sql) === TRUE) {
            echo "\nTable name_table deleted successfully";
        }
    } catch (Exception $e) {
        echo "\nError deleting table, or already deleted";
    }

    // Create name_table
    try {
        $sql = "CREATE TABLE IF NOT EXISTS name_table (
            student_id VARCHAR(9) NOT NULL,
            student_name VARCHAR(50) NOT NULL,
            UNIQUE(student_id),
            PRIMARY KEY(student_id)
        )";
        if ($conn->query($sql) === TRUE) {
            echo "\nTable name_table created successfully";
        }
    } catch (Exception $e) {
        echo "\nError creating table, or already exists";
    }

    // create course_table
    try {
        $sql = "CREATE TABLE IF NOT EXISTS course_table (
            student_id VARCHAR(9) NOT NULL,
            course_id VARCHAR(10) NOT NULL,
            test_1 FLOAT DEFAULT 0,
            test_2 FLOAT DEFAULT 0,
            test_3 FLOAT DEFAULT 0,
            final_exam FLOAT DEFAULT 0
        )";
        if ($conn->query($sql) === TRUE) {
            echo "\nTable course_table created successfully";
        }
    } catch (Exception $e) {
        echo "\nError creating table, or already exists";
    }

    // make txt files into an indexed array
    function get_lines($fh) {
        while (!feof($fh)) {
            yield explode(',', fgets($fh));
        }
    }

    //create password_table
    try {
        $sql = "CREATE TABLE IF NOT EXISTS login_table (
            user_name VARCHAR(9) NOT NULL,
            user_password VARCHAR(9) NOT NULL
        )";
        if ($conn->query($sql) === TRUE) {
            echo "\nTable login_table created successfully";
        }
    } catch (Exception $e) {
        echo "\nError creating table, or already exists";
    }

    // make txt files into an indexed array
    function get_lines($fh) {
        while (!feof($fh)) {
            yield explode(',', fgets($fh));
        }
    }
    

    // Read txt files
    $course_file = fopen('CourseFile.txt', 'r');
    $name_file = fopen('NameFile.txt', 'r');

    // Fill in tables
    $stmt = $conn->prepare('INSERT INTO Name (StudentID, StudentName) VALUES (?, ?)');
    $stmt->bind_param("ss", $sid, $name);
    foreach (get_lines($name_file) as $row) {
        if (count($row) > 1) {
            $sid = $row[0];
            $name = $row[1];
            $stmt->execute();
        }
    }

    $stmt = $conn->prepare('INSERT INTO Course (StudentID, CourseCode, Test1, Test2, Test3, FinalExam) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param("ssssss", $sid, $cid, $test1, $test2, $test3, $final_exam);
    foreach(get_lines($course_file) as $row) {
        if (count($row) > 1) {
            $sid = $row[0];
            $cid = ltrim($row[1]);
            $test1 = $row[2];
            $test2 = $row[3];
            $test3 = $row[4];
            $final_exam = $row[5];
            $stmt->execute();
        }
    }

    $conn->close();
?>