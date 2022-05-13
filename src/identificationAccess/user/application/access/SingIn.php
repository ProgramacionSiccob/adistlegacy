<?php declare(strict_types=1);


namespace Siccob\identificationAccess\user\application\access;

use Siccob\identificationAccess\user\domain\exceptions\CredentialsWrong;
use Siccob\identificationAccess\user\domain\exceptions\DisableUser;
use Siccob\identificationAccess\user\domain\User;
use Siccob\identificationAccess\user\domain\UserNickname;
use Siccob\identificationAccess\user\domain\UserRepository;

final class SingIn
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SingInRequest $request): array
    {
        $user = $this->repository->searchNickname(new UserNickname($request->getNickname()));
        $this->validateCredentialsAndStatus($user , $request->getPassword());
        return ['id' => $user->getId() , 'data' => $user->getData()];
    }

    private function validateCredentialsAndStatus(?User $user , string $password): void
    {
        if (empty($user)) {
            throw new CredentialsWrong();
        }

        if ($user->hasNotValidPassword($password)) {
            throw new CredentialsWrong();
        }

        if($user->isDisable()){
            throw new DisableUser();
        }
    }
}