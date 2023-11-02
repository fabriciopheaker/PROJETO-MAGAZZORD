<?php

namespace App\Controller;

use App\Core\ViewEngine;



class HomeController
{
  private $repository;

  public function __construct()
  {
  }




  public function index()
  {
    return ViewEngine::render('HomeView');
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
