

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no"
    />
    <title>FaceJunk - Register</title>
    <meta name="description" content="" />
  </head>
  <body>
        <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="First Name" required></form>
            <input type="text" name="reg_lname" placeholder="Last Name" required></form>
            <br>
            <input type="email" name="reg_email" placeholder="E-mail" required></form>
            <input type="email" name="reg_email2" placeholder="Confirm E-mail" required></form>
            <br>
            <input type="password" name="reg_password" placeholder="Password" required></form>
            <input type="password" name="reg_password2" placeholder="Confirm Password" required></form>
            <br>
            <input type="submit" name="register_button" value="Register">
        </form>


  </body>
</html>
