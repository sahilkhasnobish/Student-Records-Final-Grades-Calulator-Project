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
                margin: 100px;
                width: 25%;
                padding: 100x 100px;
                font-size: 60px;
            }
            .button{
                padding: 50px 50px;
                background-color: white;
            }
        </style>
    </head>

    <body>
        <div class="top_banner">
        <h1>Student Records</h1>
        </div>

        <form>
            <input type="button" onclick="location.href = 'view_records.php';" value = "View Records"><br>
            <input type="button" onclick="location.href = 'modify_data.php';" value = "Modify Data"><br>
        </form>

    </body>
</html>