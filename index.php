<?php

session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['registration_error'] ?? '',
];
$activeForm = $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($error): string
{
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

function isActiveForm($formName, $activeForm): string
{
    return $formName === $activeForm ? 'active' : '';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sencillo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm) ?> " id="login-form">
            <form action="login_register.php" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']); ?>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" name="login">Iniciar sesión</button>
                <p>¿No tienes cuenta? <a href="#" onclick="showForm('register-form')">Regístrate</a></p>
            </form>
        </div>

        <div class="form-box <?= isActiveForm('register', $activeForm) ?>" id="register-form">
            <form action="login_register.php" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']); ?>
                <input type="text" name="name" placeholder="Nombre" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <select name="role">
                    <option value="">Selecciona un rol</option>
                    <option value="admin">Admin</option>
                    <option value="user">Usuario</option>
                </select>
                <button type="submit" name="register">Registrarse</button>
                <p>¿Ya tienes cuenta? <a href="#" onclick="showForm('login-form')">Iniciar sesión</a></p>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>