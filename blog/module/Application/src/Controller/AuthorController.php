<?php

namespace Application\Controller;


use Application\Entity\Author;
use Application\Entity\Post;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * This is the Post controller class of the Blog application.
 * This controller is used for managing posts (adding/editing/viewing/deleting).
 */
class AuthorController extends AbstractActionController
{
    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Post manager.
     * @var Application\Service\AuthorManager
     */
    private $authorManager;

    /**
     * Constructor is used for injecting dependencies into the controller.
     */
    public function __construct($entityManager, $authorManager)
    {
        $this->entityManager = $entityManager;
        $this->authorManager = $authorManager;
    }

    /**
     * This is the default "index" action of the controller. It displays the
     * Recent Posts page containing the recent blog posts.
     */
    public function indexAction()
    {

        $results = $results = $this->entityManager->getRepository(Author::class)
            ->findBy([], ['name' => 'ASC']);

        // Render the view template.
        return new ViewModel([
            'authors' => $results,
            'authorManager' => $this->authorManager,
        ]);
    }

    public function showAction()
    {

        $authorId = (int)$this->params()->fromRoute('id', -1);


        $authorPostsInfo = $this->entityManager->getRepository(Author::class)
            ->findById($authorId);


        // Render the view template.
        return new ViewModel([
            'authors_posts' => $authorPostsInfo[0]->getPosts(),
            'authorManager' => $this->authorManager,
        ]);
    }
}