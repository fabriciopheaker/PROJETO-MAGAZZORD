<?php

namespace App\Repository;

use App\Core\DoctrineConf;
use App\Model\User;
use Doctrine\DBAL\Types\JsonType;

class UserRepository
{

  public function findAllRepository()
  {
    $doctrineConf = DoctrineConf::getInstance();
    $entityManager = $doctrineConf->getEntityManager();
    $userRepository = $entityManager->getRepository(User::class);
    $users = $userRepository->findAll();
    /*     echo "<pre>";
    var_dump($users);
    /*      */
    return $users;
  }

  public function destroy($id)
  {
    /*   $conn = Connect::getInstance();
    $sql = "DELETE FROM CURSOS WHERE ID_CURSO = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    try {
      $stmt->execute();
      json_encode("Registro deletado com sucesso.");
    } catch (PDOException $e) {
      json_encode("Erro ao deletar o registro: " . $e->getMessage());
    } */
  }
  public function create($dados)
  {

    /*  $conn = Connect::getInstance();
    $sql = "INSERT INTO CURSOS (TITULO, DESCRICAO , LINK , IMAGEM) VALUES (:TITULO , :DESCRICAO , :LINK , :IMAGEM)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':TITULO', $dados->TITULO, PDO::PARAM_STR);
    $stmt->bindValue(':DESCRICAO', $dados->DESCRICAO, PDO::PARAM_STR);
    $stmt->bindValue(':LINK', $dados->LINK, PDO::PARAM_STR);
    $stmt->bindValue(':IMAGEM', 'avatar.jpg', PDO::PARAM_STR);

    try {
      $stmt->execute();
      json_encode("Registro criado com sucesso.");
    } catch (PDOException $e) {
      json_encode("Erro ao criar o registro: " . $e->getMessage());
    } */
  }
}
