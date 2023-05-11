<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <form method="POST" action="dashboard.php">
        <label for="Username">Nombre: </label>
        <input type="text" name="Username" value="<?php echo $user['Username'];?>">

        <label for="email">Correo: </label>
        <input type="email" value="<?php echo $user["email"];?>">

        <label for="password">Contraseña Actual:</label>
        <input type="password" name="password">

        <label for="newPassword">Nueva Contraseña: </label>
        <input type="password" name="newPassword">

        <input type="submit" name="submit" value="Update">
    </form>
    <a href="logout.php">Logout</a>
</body>
</html>