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
?>

<html>
    <head>
        <title>Student Information</title>

       

        <style>

            body{
                background-color:  #003366;
            }

            .top_banner{
                /*background-color: #6666ff;*/
                background-color: #00264d;
            }
            h1 {
                padding: 50px 30px;
                text-align: center;
                color: white;
            }

            table {
                color: white;
                table-layout: fixed;
                margin-left: auto;
                margin-right: auto;
            }

            th {
                text-align: center;
                padding: 10px;
            }

            td {
                text-align: center;
                padding: 10px;
            }

            .button {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="top_banner">
        <h1>Final Grades</h1>
        </div>

        <div class="button">
            <button onclick="location.href = 'view_records.php';">Back</button>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>

        <table>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Course Code</th>
                <th>Test 1</th>
                <th>Test 2</th>
                <th>Test 3</th>
                <th>Final Exam</th>
            </tr>

            <?php
                // Extract the info
                
                $sql = "SELECT n.StudentID, n.StudentName, c.CourseCode, c.Test1, c.Test2, c.Test3, c.FinalExam 
                    FROM Name n, Course c
                    WHERE n.StudentID = c.StudentID";
                /*
                $sql = "SELECT StudentID, StudentName, CourseCode, Test1, Test2, Test3, FinalExam 
                FROM Course;*/
                $result = $conn->query($sql);

                // Iterate through info
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                // Print out student info and final grade
            ?>

            <tr>
                <td><?php echo $row['StudentID']; ?> </td>
                <td><?php echo $row['StudentName']; ?> </td>
                <td><?php echo $row['CourseCode']; ?> </td>
                <td><?php echo $row['Test1'];?> </td>
                <td><?php echo $row['Test2'];?> </td>
                <td><?php echo $row['Test3'];?> </td>
                <td><?php echo $row['FinalExam'];}?> </td>
            </tr>
        </table>

        <?php
            // Close connection
            }
            $conn->close();
        ?>
    </body>
</html>