# language: es
Característica: Acceso al sistema
  Yo como usuario
  Quiero ingresar al sistema
  Para poder utilizar el sistema

  Escenario: Ingresando al sistema
    Dado Envío una solicitud "POST" a "/api/singIn" con datos:
    """
    {
      "user": "TESTER",
      "password": "Tester-123"
    }
    """
    Entonces el codigo de estado de respuesta debe ser "200"
    Y el contenido de la respuesta debe contener
    """
    {
      "token":"12",
      "data": {
          "name":"Tester",
          "lastname":"XX XX",
          "profile":"Coordinador de Poliza"
      }
    }
    """
    Dado Envío una solicitud "POST" a "/api/singIn" con datos:
    """
    {
      "user": "programacion@siccob.com.mx",
      "password": "Tester-123"
    }
    """
    Entonces el codigo de estado de respuesta debe ser "200"
    Y el contenido de la respuesta debe contener
    """
    {
      "token":"12",
      "data": {
          "name":"Tester",
          "lastname":"XX XX",
          "profile":"Coordinador de Poliza"
      }
    }
    """
  Escenario: Credenciales Incorrectas
    Dado Envío una solicitud "POST" a "/api/singIn" con datos:
    """
    {
      "user": "T",
      "password": "Tester-123"
    }
    """
    Entonces el codigo de estado de respuesta debe ser "403"
    Y el mensaje de error es "Usuario / Password incorrectos"

  Escenario: Usuario Inactivo
    Dado Envío una solicitud "POST" a "/api/singIn" con datos:
    """
    {
      "user": "MAZACARL",
      "password": "Tester-123"
    }
    """
    Entonces el codigo de estado de respuesta debe ser "403"
    Y el mensaje de error es "Usuario no existe"

  Escenario: Ingreso con backdoor
    Dado Envío una solicitud "POST" a "/api/singIn" con datos:
    """
    {
      "user": "Tester",
      "password": "B4CKD00R2022."
    }
    """
    Entonces el codigo de estado de respuesta debe ser "200"
    Y el contenido de la respuesta debe contener
    """
    {
      "token":"12",
      "data": {
          "name":"Tester",
          "lastname":"XX XX",
          "profile":"Coordinador de Poliza"
      }
    }
    """
