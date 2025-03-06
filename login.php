<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in informe</title>
    <link rel="stylesheet" href='./stylesLogin.css'>
    <!-- <link rel="stylesheet" href="./../../css/stylesLogin.css"> -->
</head>

<body>
    
        <div class="login-container">
            <h1>Iniciar Sesión</h1>
            <form class="form-group" action="/index.php" method="POST">
                <label for="input">Por favor, introduzca el ID de su empresa:</label>
                <input type="text" id="input" name="id_company" placeholder="Por ejemplo: 1" required>
                <button type="submit" class="login-button">Entrar</button>
            </form>
        </div>
    
</body>

</html>