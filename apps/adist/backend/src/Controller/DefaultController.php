<?php
namespace Siccob\Adist\Backend\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


final class DefaultController extends AbstractController
{
    public function __invoke(Request $request)
    {
        return $this->render('index.html.twig');
    }
}