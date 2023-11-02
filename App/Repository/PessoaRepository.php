<?php

namespace App\Repository;

use App\Core\DoctrineConf;
use App\Model\Pessoa;
use Exception;

class PessoaRepository
{

  public function findAll()
  {
    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $pessoaEntity = $entityManager->getRepository(Pessoa::class);
    $pessoas =  $pessoaEntity->findAll();

    $pessoasArray = array_map(function ($pessoas) {
      return [
        'ID' => $pessoas->getId(),
        'NOME' => $pessoas->getNome(),
        'CPF' => $pessoas->getCpf(),
        // Adicione outros atributos públicos que deseja copiar
      ];
    }, $pessoas);

    return $pessoasArray;
  }

  public function findOne($params)
  {
    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $pessoaEntity = $entityManager->getRepository(Pessoa::class);
    $pessoas =  $pessoaEntity->findA();
  }



  public function create($json)
  {
    try {
      $doctrineConf = DoctrineConf::getInstance();
      $entityManager = $doctrineConf->getEntityManager();
      $novaPessoa = new Pessoa();
      $novaPessoa->setNome($json->NOME);
      $novaPessoa->setCpf($json->CPF);
      $entityManager->persist($novaPessoa);
      $entityManager->flush();
      return true;
    } catch (Exception $e) {
      return false;
    }
  }






  public function destroy($id)
  {
  }
}
