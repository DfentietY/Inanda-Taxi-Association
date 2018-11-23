<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Welcome</title>
    </head>
    <body>
        <div class="loginContainer">
            <form id="frmLogin" method="POST">
                <p>Username: <input type="text" name="username" /></p>
                <p>Password: <input type="password" name="password" /></p>
                <input type="hidden" name="controller" value="main" />
                <input type="hidden" name="action" value="login" />
                <p><input type="submit" name="btnLogSubmit" value="Sign In" /></p>
            </form>
        </div>
        <div class="registerContainer">
            <form id="frmRegister" method="POST">
                <p>Name: <input type="text" name="name" /></p>
                <p>Surname: <input type="text" name="surname" /></p>
                <p>Contact: <input type="number" name="contact" /></p>
                <p>Address: <input type="text" name="Address" /></p>
                <p>Username: <input type="text" name="username" /></p>
                <p>Password: <input type="password" name="pass" /></p>
                <p>Confirm Password: <input type="password" name="conPass" /></p>
                <input type="hidden" name="controller" value="main" />
                <input type="hidden" name="action" value="register" />
                <p><input type="submit" name="btnRegSubmit" value="Sign Up" /></p>
            </form>
        </div>
    </body>
</html>