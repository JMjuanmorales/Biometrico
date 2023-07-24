<!DOCTYPE html>
<html>
<head>
    <title>Restablecer Contraseña</title>
</head>
<body>
    <h2>Hola,</h2>
    <p>Recibimos una solicitud de restablecimiento de contraseña para tu cuenta.</p>

    <p>Por favor haz clic en el enlace de abajo para restablecer tu contraseña:</p>

    <a href="{{ route('password.reset', ['token' => $token]) }}">Restablecer contraseña</a>

</body>
</html>