<?php

namespace Application\Repository;

use Application\Entity\Author;
use Application\Entity\Post;

class AuthorRepository extends RepositoryAbstract
{
  /**
   * @param $authorEmail
   */
  public function findAuthorByEmail($authorEmail)
  {
    $queryBuilder = $this->getCreateQueryBuilder();
    $queryBuilder->select('a')
      ->from(Author::class, 'a')
      ->where('a.email = :authorEmail')

      ->setParameter(':authorEmail', $authorEmail);


    $results = $queryBuilder->getQuery()->getResult();
    return $results;
  }

  public function findPostsById($authorId){
      $queryBuilder = $this->getCreateQueryBuilder();
      $queryBuilder->select('p')
          ->from(Post::class, 'p')
          ->where('p.author_id = :authorId')

          ->setParameter(':authorId', $authorId);


      return $queryBuilder->getQuery()->getResult();
  }
}
