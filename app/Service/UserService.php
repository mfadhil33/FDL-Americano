<?php
namespace FdlAmericano\MhdFadhilAp\Service;

use Exception;
use FdlAmericano\MhdFadhilAp\Config\Database;
use FdlAmericano\MhdFadhilAp\Domain\User;
use FdlAmericano\MhdFadhilAp\Exception\ValidationException;
use FdlAmericano\MhdFadhilAp\Model\UserRegisterRequest;
use FdlAmericano\MhdFadhilAp\Model\UserRegisterResponse;
use FdlAmericano\MhdFadhilAp\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository =  $userRepository;
    }
        public function register(UserRegisterRequest $request): UserRegisterResponse{
          $this->validateUserRegistrationRequest($request);
  
          try {
            Database::beginTransaction();
            $user = $this->userRepository->findById($request->id);
            if($user != null){
            throw new ValidationException("User Id already exist");
          }
          $user = new User();
          $user->id = $request->id;
          $user->name = $request->name;
          $user->password = password_hash($request->password, PASSWORD_BCRYPT);
          $this->userRepository->save($user);
  
          $response = new UserRegisterResponse();
          $response->user = $user;
          Database::commitTransaction();
          return $response;
          } catch (\Exception $exc) {
            Database::rollbackTransaction();
            throw $exc;
          }

        }

        private function validateUserRegistrationRequest(UserRegisterRequest $request){
        if($request->id == null || $request->name == null || $request->password == null
        || trim($request->id) == "" || trim($request->name) == ""
        || trim($request->password) == ""){
        throw new ValidationException("id, Name, Password can't blank");    
        }
        }
}