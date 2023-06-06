<html>
    <head>
        <title>Delete Name</title>

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
        <h1>Delete Name</h1>
        </div>

        <div class="button">
            <button onclick="location.href = 'modify_data.php';">Back</button>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>

        <form id="delete student" method="post" action="delete_name_data.php">
            <label for="sid">Student ID:</label>
            <input type="text" id="sid" name="sid"><br><br>
            <button id="delete_s" name="delete_s" type="submit">Delete Name</button>
        </form>
    </body>
</html>