<?php

namespace App\Controller;

use App\Repository\PessoaRepository;
use App\Core\Response;


class PessoaController
{
  private $repository;

  public function __construct()
  {
    $this->repository = new PessoaRepository();
  }




  public function index()
  {
    $dados = $this->repository->findAll();
    $resposta = "Erro ao buscar dados";
    if ($dados) {
      $resposta = Response::json($dados);
    }
    return $resposta;
  }


  public function find($params)
  {
    var_dump($params);
    /*     $dados = $this->repository->findOne($params);
    $resposta = "Erro ao buscar dados";
    if ($dados) {
      $resposta = Response::json($dados);
    }
    return $resposta; */
  }


  public function create($params)
  {
    $dados = $this->repository->create($params);
    $resposta = false;
    if ($dados) {
      $resposta = Response::json("SUCCESS");
    }
    return $resposta;
  }
  public function update($id)
  {
  }
  public function destroy()
  {
  }
}
