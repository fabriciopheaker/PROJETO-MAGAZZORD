<?php

namespace App\Controller;

use App\Repository\PessoaRepository;
use App\Core\Response;
use App\Core\Validator;


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
    $dados ? $resposta = Response::json($dados) : $resposta = Response::Error();
    return $resposta;
  }


  public function find($params)
  {

    $dados = $this->repository->find($params);
    $dados ? $resposta = Response::json($dados) : $resposta = Response::Error();
    return $resposta;
  }


  public function create($json)
  {
    $result = Validator::Validator($json, ['NOME', 'CPF']);
    if ($result) {
      $json->NOME =  strtoupper($json->NOME);
      $dados = $this->repository->create($json);
      $dados ? $resposta = Response::json($dados) : null;
    } else {
      $resposta = Response::Error();
    }
    return $resposta;
  }

  public function destroy($json)
  {
    $result = Validator::Validator($json, ['ID']);
    if ($result) {
      $dados = $this->repository->destroy($json);
      $dados ? $resposta = Response::json($dados) : null;
    } else {
      $resposta = Response::Error();
    }
    return $resposta;
  }



  public function update($json)
  {
    $result = Validator::Validator($json, ['ID', 'NOME', 'CPF']);
    if ($result) {
      $dados = $this->repository->update($json);
      $dados ? $resposta = Response::json($dados) : null;
    } else {
      $resposta = Response::Error();
    }
    return $resposta;
  }
}
