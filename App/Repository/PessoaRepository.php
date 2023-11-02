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

  public function find($params)
  {
    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $pessoaEntity = $entityManager->getRepository(Pessoa::class);

    $query = $pessoaEntity->createQueryBuilder('p')
      ->where('p.nome LIKE :nome')
      ->setParameter('nome', '%' . $params->NOME . '%')
      ->getQuery();
    $pessoas = $query->getResult();
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


  public function destroy($json)
  {
    try {
      $doctrineConf = DoctrineConf::getInstance();
      $entityManager = $doctrineConf->getEntityManager();
      $pessoaEntity = $entityManager->getRepository(Pessoa::class);
      $pessoa =  $pessoaEntity->findOneBy(['id' => $json->ID]);
      if ($pessoa) {
        $entityManager->remove($pessoa);
        $entityManager->flush();
        return true;
      }
    } catch (Exception $e) {
      return false;
    }
  }


  public function update($json)
  {
    try {
      $doctrineConf = DoctrineConf::getInstance();
      $entityManager = $doctrineConf->getEntityManager();
      $pessoaEntity = $entityManager->getRepository(Pessoa::class);
      $pessoa =  $pessoaEntity->findOneBy(['id' => $json->ID]);
      if ($pessoa) {
        $pessoa->setNome($json->NOME);
        $pessoa->setCpf($json->CPF);
        $entityManager->flush();
        return true;
      }
    } catch (Exception $e) {
      return false;
    }
  }
}
