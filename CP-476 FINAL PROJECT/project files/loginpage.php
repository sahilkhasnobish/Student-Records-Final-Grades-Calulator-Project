<html>
    <head>
        <title>Log in</title>

        <style>
            h1 {
                text-align: center;
            }

            .button {
                text-align: center;
            }

            form {
                text-align: center;
                padding: 10px;
            }
        </style>
    </head>

    <body>
        <h1>Log in</h1>

        <form id="update_name" method="post" action="login_verify.php">
            <label for="sid">Username:</label>
            <input type="text" id="username" name="username"><br><br>
            <label for="sname">Password:</label>
            <input type="text" id="user_pass" name="user_pass"><br><br>
            <button id="update_n" name="update_n" type="submit">Enter</button>
        </form>
    </body>
</html>