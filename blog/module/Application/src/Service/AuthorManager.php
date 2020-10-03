<?php

namespace Application\Service;

use Application\Entity\Author;
use Zend\ServiceManager\ServiceManagerAwareInterface;

/**
 * The PostManager service is responsible for adding new posts, updating existing
 * posts, adding tags to post, etc.
 */
class AuthorManager
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager;
     */
    private $entityManager;

    /**
     * Constructor.
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Returns status as a string.
     */
    public function getAuthorStatusAsString($author)
    {
        switch ($author->getStatus()) {
            case Author::STATUS_INACTIVE:
                return 'Inactive';
            case Author::STATUS_ACTIVE:
                return 'Active';
        }

        return 'Unknown';
    }


}
