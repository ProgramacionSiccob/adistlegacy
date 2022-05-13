# language: es
Característica: Api status
  Para saber si el servidor está en funcionamiento
  Con un healt check
  Quiero validar el estatus de la API

  Escenario: Revisando Estatus
    Dado Envío una solicitud "GET" a "/health-check"
    Entonces el codigo de estado de respuesta debe ser "201"
