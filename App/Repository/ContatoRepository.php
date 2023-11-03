<?php

namespace App\Repository;

use App\Core\DoctrineConf;
use App\Model\Contato;
use Exception;

class ContatoRepository
{

  public function index()
  {
    try {
      $doctrineConf = DoctrineConf::getInstance();
      $entityManager = $doctrineConf->getEntityManager();
      $query = $entityManager->createQuery('
              SELECT c, p
              FROM App\Model\Contato c
              JOIN c.pessoa p
          ');
      $results = $query->getResult();

      $contatosArray = array_map(function ($results) {
        return [
          'TIPO_CONTATO' => $results->getTipo(),
          'CONTATO' => $results->getDescricao(),
        ];
      }, $results);



      return $contatosArray;
    } catch (Exception $e) {
      return false;
    }
  }




  public function findAll($json)
  {
    try {
      $doctrineConf = DoctrineConf::getInstance();
      $entityManager = $doctrineConf->getEntityManager();
      $contatoRepository = $entityManager->getRepository(Contato::class);
      $contatos = $contatoRepository->findBy(['pessoa' => $json->ID]);
      $contatosArray = array_map(function ($contatos) {
        return [
          'ID' => $contatos->getId(),
          'TIPO_CONTATO' => $contatos->getTipo(),
          'CONTATO' => $contatos->getDescricao(),
          // Adicione outros atributos públicos que deseja copiar
        ];
      }, $contatos);

      return $contatosArray;
    } catch (Exception $e) {
      return false;
    }
  }

  public function find($params)
  {


    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $pessoaEntity = $entityManager->getRepository(Contato::class);

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
      /**  TIPO_CONTATO
       * 0 = EMAIL
       * 1 = TELEFONE / CELULAR
       */
      if ($json->TIPO_CONTATO == 0 || $json->TIPO_CONTATO == 1) {
        $doctrineConf = DoctrineConf::getInstance();
        $entityManager = $doctrineConf->getEntityManager();
        $novoContato = new Contato();
        $novoContato->setDescricao($json->CONTATO);
        $novoContato->setTipo($json->TIPO_CONTATO);
        $novoContato->setPessoa($entityManager->getReference('App\Model\Pessoa', $json->ID_PESSOA));
      }
      $entityManager->persist($novoContato);
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
      $pessoaEntity = $entityManager->getRepository(Contato::class);
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
      $pessoaEntity = $entityManager->getRepository(Contato::class);
      $pessoa =  $pessoaEntity->findOneBy(['id' => $json->ID]);
      if ($pessoa) {
        $pessoa->setDescricao($json->CONTATO);
        $pessoa->setTipo($json->TIPO_CONTATO);
        $entityManager->flush();
        return true;
      }
    } catch (Exception $e) {
      return false;
    }
  }


  public function show($json)
  {
    try {
      $doctrineConf = DoctrineConf::getInstance();
      $entityManager = $doctrineConf->getEntityManager();
      $pessoaEntity = $entityManager->getRepository(Pessoa::class);
      $pessoa =  $pessoaEntity->findOneBy(['id' => $json->ID]);
      if ($pessoa) {
        $pessoasArray = array_map(function ($pessoa) {
          return
            [
              'ID' => $pessoa->getId(),
              'NOME' => $pessoa->getNome(),
              'CPF' => $pessoa->getCpf(),
            ];
        }, [$pessoa]);

        return $pessoasArray;
      }
    } catch (Exception $e) {
      return false;
    }
  }
}
