<html>
    <head>
        <title>Insert Name</title>

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
        <h1>Insert Name</h1>
        </div>

        <div class="button">
            <button onclick="location.href = 'modify_data.php';">Back</button>
        </div>

        <div class="button">
            <button onclick="location.href = 'home.php';">Home</button>
        </div>

        <form id="insert student" method="post" action="insert_name_data.php">
            <label for="sid">Student ID:</label>
            <input type="text" id="sid" name="sid"><br><br>
            <label for="sname">Student name:</label>
            <input type="text" id="sname" name="sname"><br><br>
            <button id="insert_s" name="insert_s" type="submit">Insert Name</button>
        </form>
    </body>
</html>