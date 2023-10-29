<?php

namespace App\Controller;

use App\Core\ViewEngine;
use App\Core\DoctrineConf;
use App\Model\User;

class HomeController
{
  private $doctrine;

  public function __construct()
  {
    /* $this->doctrine = new DoctrineConfig(); */
  }




  public function index()
  {
    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $userRepository = $entityManager->getRepository(User::class);
    $users = $userRepository->findAll();
    var_dump($users);
  }


  public function find($id)
  {
  }
  public function create()
  {
  }
  public function update($id)
  {
  }
  public function destroy()
  {
  }
}
