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
        <title>Course Table</title>

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
        <h1>Course Table</h1>
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
                <th>Course Code</th>
                <th>Test 1</th>
                <th>Test 2</th>
                <th>Test 3</th>
                <th>Final Exam</th>
            </tr>

            <?php
                // Extract the info
                $sql = "SELECT c.student_id, c.course_id, c.test_1, c.test_2, c.test_3, c.final_exam 
                    FROM course_table c";
                $result = $conn->query($sql);

                // Iterate through info
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {

                // Print out student info and final grade
            ?>

            <tr>
                <td><?php echo $row['student_id']; ?> </td>
                <td><?php echo $row['course_id']; ?> </td>
                <td><?php echo $row['test_1'];?> </td>
                <td><?php echo $row['test_2'];?> </td>
                <td><?php echo $row['test_3'];?> </td>
                <td><?php echo $row['final_exam'];}?> </td>
            </tr>
        </table>

        <?php
            // Close connection
            }
            $conn->close();
        ?>
    </body>
</html>