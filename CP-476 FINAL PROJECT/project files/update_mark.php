<html>
    <head>
        <title>Update Mark</title>

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

            .button {
                text-align: center;
            }

            form {
                text-align: center;
                padding: 10px;
                color: white;
            }
        </style>
    </head>

    <body>
        <div class="top_banner">
        <h1>Update Mark</h1>
        </div>

        <div class="button">
            <button onclick="location.href = 'modify_data.php';">Back</button>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>

        <form id="update mark" method="post" action="update_mark_data.php">
            <label for="sid">Student ID:</label>
            <input type="text" id="sid" name="sid"><br><br>
            <label for="sname">Course ID:</label>
            <input type="text" id="cid" name="cid"><br><br>
            <label for="sname">Test 1:</label>
            <input type="text" id="t1" name="t1"><br><br>
            <label for="sname">Test 2:</label>
            <input type="text" id="t2" name="t2"><br><br>
            <label for="sname">Test 3:</label>
            <input type="text" id="t3" name="t3"><br><br>
            <label for="sname">Final Exam:</label>
            <input type="text" id="fexam" name="fexam"><br><br>
            <button id="update_m" name="update_m" type="submit">Update Mark</button>
        </form>
    </body>
</html>