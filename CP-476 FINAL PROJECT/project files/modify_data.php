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
                margin: 25px;
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
        <h1>Modify Student Records</h1>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>

        <form>
            <input type="button" onclick="location.href = 'insert_name.php';" value = "Insert Name"><br>
            <input type="button" onclick="location.href = 'insert_course.php';" value = "Insert Course"><br>
            <input type="button" onclick="location.href = 'delete_name.php';" value = "Delete Name"><br>
            <input type="button" onclick="location.href = 'delete_course.php';" value = "Delete Course"><br>
            <input type="button" onclick="location.href = 'update_mark.php';" value = "Update Mark"><br>
            <input type="button" onclick="location.href = 'update_name.php';" value = "Update Name"><br>
        </form>

    </body>
</html>