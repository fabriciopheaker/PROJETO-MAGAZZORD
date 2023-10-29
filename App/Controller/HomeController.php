<?php

namespace App\Controller;

use App\Core\ViewEngine;
use App\Repository\UserRepository;


class HomeController
{
  private $repository;

  public function __construct()
  {
    $this->repository = new UserRepository();
  }




  public function index()
  {
    $dados = $this->repository->findAllRepository();
    return ViewEngine::render('HomeView', 'User', json_encode($dados));
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
