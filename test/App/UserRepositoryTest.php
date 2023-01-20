<?php


use PHPUnit\Framework\TestCase;
use FdlAmericano\MhdFadhilAp\Config\Database;
use FdlAmericano\MhdFadhilAp\Domain\User;
use FdlAmericano\MhdFadhilAp\Repository\;

class UserRepositoryTest extends TestCase{

        private UserRepository $userRepository;


   protected function setUp(): void
   {
    $this->userRepository = new UserRepository(Database::getConnection());
    $this->userRepository->deleteAll();
   }

   public function testSaveSuccess(){

   $user = new User();
   $user->id= "padhil";
   $user->name = "padhil";
   $user->password= "secure";

   $this->userRepository->save($user);

   $result = $this->userRepository->findById($user->id);

   self::assertEquals($user->id, $result->id);
   self::assertEquals($user->name, $result->name);
   self::assertEquals($user->password, $result->password);
}

  public function testFindByIdNotFound(){

  $user = $this->userRepository->findById("notfound");
  self::assertNull($user);
}

        protected function tearDown(): void
        {
        parent::tearDown();
        }

}   