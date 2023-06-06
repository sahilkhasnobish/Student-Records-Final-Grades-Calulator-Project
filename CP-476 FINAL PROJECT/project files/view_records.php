<html>
    <head>
        <title>Student Records</title>

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

            h3{
                text-align: center;
            }

            form {
                text-align: center;
            }

            input[type=button] {
                margin: 50px;
                width: 30%;
                padding: 10px 30px;
            }
            .button {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="top_banner">
        <h1>View Student Records</h1>
        </div>
        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>
        <form>
            <input type="button" onclick="location.href = 'info.php';" value = "View Student Info"><br>
            <input type="button" onclick="location.href = 'view_name.php';" value = "View Name Table"><br>
            <input type="button" onclick="location.href = 'view_course.php';" value = "View Course Table"><br>
            <input type="button" onclick="location.href = 'final_grade.php';" value = "Calculate Final Grades"><br>
        </form>

    </body>
</html>