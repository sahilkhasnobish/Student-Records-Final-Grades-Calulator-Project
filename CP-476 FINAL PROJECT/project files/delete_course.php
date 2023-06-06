<html>
    <head>
        <title>Delete Course</title>

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
        <h1>Delete Course</h1>
        </div>
        
        <div class="button">
            <button onclick="location.href = 'modify_data.php';">Back</button>
        </div>
        
        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>

        <form id="delete course" method="post" action="delete_course_data.php">
            <label for="sid">Student ID:</label>
            <input type="text" id="sid" name="sid"><br><br>
            <label for="cid">Course ID:</label>
            <input type="text" id="cid" name="cid"><br><br>
            <button id="delete_c" name="delete_c" type="submit">Delete Course</button>
        </form>
    </body>
</html>