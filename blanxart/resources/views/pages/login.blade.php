<!DOCTYPE html>
<html class="html-login" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/main.scss'])
    <title>login</title>
</head>
<body class="body-login">
    <div class="login">
        <div class="login-img"></div>
        <div class="login-form">
            <div class="login-form-blanxart">
                <div class="login-blanxart-logo"></div>
                <h1>Sanitech</h1>
            </div>
            <div>
                <form class="login-form-content" action="">
                    <div class="login-form-unit">
                        <input class="login-form-input" type="text" id="user" autocomplete="off" name="user" required placeholder="">
                        <label class="login-form-label" for="user">Usuario</label>
                    </div>
                    <div class="login-form-unit">
                        <input class="login-form-input" type="password" id="password" name="password" autocomplete="off" required placeholder="">
                        <label class="login-form-label" for="password">Contraseña</label>
                    </div>
                    <div class="recover-password"><a href="">¿Has olvidado la contraseña?</a></div>
                    <button class="button-login" type="submit">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

