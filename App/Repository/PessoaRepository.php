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





  /* 


  public function findAll()
  {
    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $pessoaEntity = $entityManager->getRepository(Pessoa::class);
    $pessoas =  $pessoaEntity->findAll();
    /* OBS A CONSULTA ESTÁ ME RETORNANDO DADOS PRIVADOS Q ESTAVA IMPEDINDO DE TRANSFORMAR EM JSON PARA CRIAR O OBJETO JS NO ViewEngine, para contornar isso utilizei o array map para criar um novo array  
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
*/








  public function destroy($id)
  {
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
}
