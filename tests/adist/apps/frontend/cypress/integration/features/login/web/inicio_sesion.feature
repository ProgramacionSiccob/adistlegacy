# language: es
Característica: Iniciar Sesión
  Yo como usuario de la plataforma
  Quiero iniciar sesión
  Para ingresar al contenido y funcionalidad del sistema

  Escenario: Ingresando al sistema
    Dado que el usuario root ingresa sus credenciales
    Cuando selecciona ingresar
    Entonces el sistema valida que las credenciales son correctas e ingresa la sistema

  Escenario: Error de acceso
    Dado que el usuario root ingresa sus credenciales erróneas
    Cuando selecciona ingresar 2
    Entonces el sistema valida que las credenciales no son correctas y muestra un mensaje "El usuario y/o contraseña son incorrectos"

  Escenario: Intentos de Ingreso
    Dado que usuario root ya ingreso sus credenciales erróneas 3 veces
    Cuando selecciona ingresar por tercera vez
    Entonces el sistema valida que las credenciales po tercera vez que no son correctas y muestra un mensaje "Demasiados intentos de inicio de sesión (Se bloqueo su cuenta por 10 minutos). Inténtelo de nuevo más tarde"