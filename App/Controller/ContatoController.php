<?php

namespace App\Controller;

use App\Repository\ContatoRepository;
use App\Core\Response;
use App\Core\Validator;


class ContatoController
{
  private $repository;

  public function __construct()
  {
    $this->repository = new ContatoRepository();
  }

  public function index()
  {
    $dados = $this->repository->index();
    $dados ? $resposta = Response::json($dados) : $resposta = Response::Error();
    return $resposta;
  }


  public function findAll($json)
  {
    $result = Validator::Validator($json, ['ID']);

    if ($result) {
      $dados = $this->repository->findAll($json);
      $dados ? $resposta = Response::json($dados) : $resposta = false;
    } else {
      $resposta = Response::Error();
    }

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
    $result = Validator::Validator($json, ['CONTATO', 'ID_PESSOA']);
    if ($result) {
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
    $result = Validator::Validator($json, ['ID', 'CONTATO']);
    if ($result) {
      $dados = $this->repository->update($json);
      $dados ? $resposta = Response::json($dados) : null;
    } else {
      $resposta = Response::Error();
    }
    return $resposta;
  }
}
