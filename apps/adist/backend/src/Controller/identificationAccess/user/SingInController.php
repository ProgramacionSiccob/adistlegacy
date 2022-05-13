<?php

namespace Siccob\Adist\Backend\Controller\identificationAccess\user;

use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTFailureException;
use Siccob\identificationAccess\user\application\access\SingIn;
use Siccob\identificationAccess\user\application\access\SingInRequest;
use Siccob\shared\domain\DomainError;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


final class SingInController extends AbstractController
{
    private $singIn;
    private $JWTEncoder;

    public function __construct(SingIn $singIn , JWTEncoderInterface $JWTEncoder)
    {
        $this->singIn = $singIn;
        $this->JWTEncoder = $JWTEncoder;
    }

    public function __invoke(Request $request): JsonResponse
    {
        try {
            $data = $request->toArray();
            $request = new SingInRequest($data['user'] , $data['password']);
            $userData = $this->singIn->__invoke($request);
            $token = $this->JWTEncoder->encode(['user_id' => $userData['id']]);
            return new JsonResponse(['token' => $token , 'data' => $userData['data']] , Response::HTTP_OK);
        } catch (\DomainException $exception) {
            return new JsonResponse($exception->getMessage() , $exception->getCode());
        }
    }
}