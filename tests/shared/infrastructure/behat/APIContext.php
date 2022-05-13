<?php

namespace Siccob\Tests\shared\infrastructure\behat;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use RuntimeException;
use Siccob\Tests\shared\infrastructure\mink\MinkHelper;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Session;
use Siccob\Tests\shared\infrastructure\mink\MinkSessionRequestHelper;

class APIContext extends RawMinkContext
{
    private $minkHelper;
    private $session;
    private $request;

    public function __construct(Session $session)
    {
        $this->minkHelper = new MinkHelper($session);
        $this->request = new MinkSessionRequestHelper(new MinkHelper($session));
        $this->session = $session;
    }

    /**
     * @Given /^Envío una solicitud "([^"]*)" a "([^"]*)"$/
     */
    public function envíoUnaSolicitudA($method , $url)
    {
        $this->minkHelper->sendRequest($method , $this->locatePath($url));
    }

    /**
     * @When /^Envío una solicitud "([^"]*)" a "([^"]*)" con datos:$/
     */
    public function envíoUnaSolicitudAConDatos($method , $url , PyStringNode $body)
    {
        $this->request->sendRequestWithPyStringNode($method , $this->locatePath($url) , $body);
    }

    /**
     * @Then /^el codigo de estado de respuesta debe ser "([^"]*)"$/
     */
    public function elCodigoDeEstadoDeRespuestaDebeSer($expectedResponseCode)
    {
        if ($this->session->getStatusCode() !== (int)$expectedResponseCode) {
            throw new RuntimeException(
                sprintf(
                    "El código de estado <%s> no coincide con lo esperado <%s> con el error: \n%s" ,
                    $this->session->getStatusCode() ,
                    $expectedResponseCode ,
                    $this->sanitizeOutputError($this->minkHelper->getResponse())
                )
            );
        }
    }

    /**
     * @Then /^el contenido de la respuesta debe contener$/
     */
    public function elContenidoDeLaRespuestaDebeContener(PyStringNode $data)
    {
        $expected = $this->sanitizeOutput($data->getRaw());
        $actual = $this->sanitizeOutput($this->minkHelper->getResponse());

        if ($expected['data'] != $actual['data']) {
            throw new RuntimeException(
                sprintf("La salidas no coinciden: \nExpectativa: \n%s\n\n -- \nActual:\n%s  " ,
                    json_encode($expected) ,
                    json_encode($actual)
                )
            );
        }
    }

    /**
     * @When /^el mensaje de error es "([^"]*)"$/
     */
    public function elMensajeDeErrorEs($message)
    {
        $message = json_encode($message);
        $error = $this->minkHelper->getResponse();

        if ($message !== $error) {
            throw new RuntimeException(
                sprintf("La salidas no coinciden: \nExpectativa: \n%s\n\n -- \nActual:\n%s  " ,
                    $message ,
                    $error
                )
            );
        }
    }

    /**
     * @param string $output
     * @return false|string|array
     */
    private function sanitizeOutput(string $output): array
    {
        return json_decode(trim($output) , true);
    }

    /**
     * @param string $output
     * @return false|string
     */
    private function sanitizeOutputError(string $output): string
    {
        $positionMessage = strpos($output , '<div class="exception-message-wrapper">');
        if (!empty($positionMessage)) {
            $output = substr($output , $positionMessage);
            $positionMessage = strpos($output , '</h1>');
            $output = substr($output , 0 , $positionMessage);
        }
        return strip_tags(trim($output));
    }


}
