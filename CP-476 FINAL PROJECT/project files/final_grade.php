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
        <title>Final Grades</title>

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
                <th>Final Grade</th>
            </tr>

            <?php
                // Extract the info and calculate final grade
                $sql = "SELECT n.student_id, n.student_name, c.course_id, 
                    (c.test_1*0.2 + c.test_2*0.2 + c.test_3*0.2 + c.final_exam*0.4) as final_grade 
                    FROM name_table n, course_table c 
                    WHERE n.student_id = c.student_id";
                $result = $conn->query($sql);

                // Iterate through info
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                // Print out student info and final grade
            ?>

            <tr>
                <td><?php echo $row['student_id']; ?> </td>
                <td><?php echo $row['student_name']; ?> </td>
                <td><?php echo $row['course_id']; ?> </td>
                <td><?php echo number_format($row['final_grade'], 1);}?> </td>
            </tr>
        </table>

        <?php
            // Close connection
            }
            $conn->close();
        ?>
    </body>
</html>