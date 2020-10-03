<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a category related to a blog post.
 * @ORM\Entity(repositoryClass="\Application\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category extends EntityAbstract
    implements DataCreatedAndUpdatedInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** 
     * @ORM\Column(name="name")
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="\Application\Entity\Post", mappedBy="category")
     */
    protected $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets ID of this category.
     * @param int $id
     */
    public function setId($id) 
    {
        $this->id = $id;
    }
    
    /**
     * Returns category name.
     * @return string
     */
    public function getName() 
    {
        return $this->name;
    }

    /**
     * Sets category name.
     * @param string $name
     */
    public function setName($name) 
    {
        $this->name = $name;
    }

    /**
     * Returns posts for this category.
     * @return array
     */
    public function getPosts() 
    {
        return $this->posts;
    }
    
    /**
     * Adds a new post to this category.
     * @param $comment
     */
    public function addPost($post) 
    {
        $this->posts[] = $post;
    }
}

