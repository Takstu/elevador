<?php

namespace Application\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * This class represents a category related to a blog post.
 * @ORM\Entity(repositoryClass="\Application\Repository\AuthorRepository")
 * @ORM\Table(name="author")
 */
class Author extends EntityAbstract
implements DataCreatedAndUpdatedInterface
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
  /**
   * @ORM\Id
   * @ORM\Column(name="id", type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /** 
   * @ORM\Column(name="name", length=50)
   */
  protected $name;

  /** 
   * @ORM\Column(name="email", length=100)
   */
  protected $email;

  /** 
   * @ORM\Column(name="status", type="boolean")
   */
  protected $status;

  /**
   * @ORM\OneToMany(targetEntity="\Application\Entity\Post", mappedBy="author")
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
   * Returns author email.
   * @return string
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Sets author email.
   * @param string $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }

  /**
   * Returns status.
   * @return bool
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Sets status.
   * @param bool $status
   */
  public function setStatus($status)
  {
    $this->status = (bool) $status;
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
   * Adds a new post to this author.
   * @param $comment
   */
  public function addPost($post)
  {
    $this->posts[] = $post;
  }
}
