<button class="regresar" onclick="return window.history.back();">Retroceder</button>

<h1>Restablecimiento de contraseña</h1>
<p>Has solicitado restablecer tu contraseña. Haz clic en el enlace de abajo para continuar:</p>
<a href="{{ route('password.reset', ['token' => $token]) }}">Restablecer contraseña</a>