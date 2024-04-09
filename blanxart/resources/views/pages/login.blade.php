<!DOCTYPE html>
<html class="html-login" lang="cat">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/sass/main.scss'])
    <title>Sanitech</title>
</head>

<body class="body-login">
    <div class="login">
        <div class="login-img"></div>
        <div class="login-form">
            <div class="login-form-blanxart">
                <div class="login-form-blanxart-logo"></div>
                <h1 class="login-form-blanxart-name">Sanitech</h1>
            </div>
            <div>
                <form class="login-form-content" action="{{ route('custom-login') }}" method="POST">
                    @csrf
                    <div class="login-form-unit">
                        <input class="login-form-input" type="text" id="user" autocomplete="off" name="dni"
                            required placeholder="">
                        <label class="login-form-label" for="user">Dni</label>
                        @if ($errors->has('email'))
                            <span class="msg-error">El camp DNI és requerit.</span>
                        @endif
                    </div>
                    <div class="login-form-unit">
                        <input class="login-form-input" type="password" id="password" name="password"
                            autocomplete="off" required placeholder="">
                        <label class="login-form-label" for="password">Contrasenya</label>
                        @if ($errors->has('password'))
                            <span class="msg-error">El camp Contrasenya és requerit</span>
                        @endif
                    </div>
                    <div class="recover-password"><a href="">¿Has oblidat la contrasenya?</a></div>
                    <button class="button-login medionegrita" type="submit">Iniciar sessió</button>
                    <div class="error">
                        @if (session('error'))
                            <span class="msg-error">{{ session('error') }}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
