<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 10:32
 */
declare(strict_types = 1);


namespace Film\Entity;

use Actor\Entity\Actor;
use Category\Entity\Category;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Film
 * @package Film\Entity
 *
 * @ORM\Entity(repositoryClass="Film\Repository\FilmRepository")
 * @ORM\Table(name="film")
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    public $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="genre", type="string", length=100)
     */
    public $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=100)
     */
    public $director;

    /**
     * @ORM\Column(type="datetime", name="date_release")
     */
    private $dtRelease;

    /**
     * @ORM\Column(type="datetime", name="date_creation")
     */
    private $dtCreation;

    /**
     * @ORM\Column(type="datetime", name="date_update", nullable=true)
     */
    private $dtUpdate;

    /**
     * @ORM\ManyToOne(targetEntity="Category\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;


    /**
     * @ORM\ManyToMany(targetEntity="Actor\Entity\Actor")
     * @ORM\JoinTable(name="Film_Actor",
     *      joinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id", unique=true)}
     *      )
     */

    private $actors;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     *
     * @return $this
     */
    public function setSynopsis(string $synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     *
     * @return $this
     */
    public function setGenre(string $genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * @param string $director
     *
     * @return $this
     */
    public function setDirector(string $director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDtRelease()
    {
        return $this->dtRelease;
    }

    /**
     * @param \DateTime $dtRelease
     *
     * @return $this
     */
    public function setDtRelease(\DateTime $dtRelease)
    {
        $this->dtRelease = $dtRelease;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDtCreation()
    {
        return $this->dtCreation;
    }

    /**
     * @param \DateTime $dtCreation
     *
     * @return $this
     */
    public function setDtCreation(\DateTime $dtCreation)
    {
        $this->dtCreation = $dtCreation;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDtUpdate()
    {
        return $this->dtUpdate;
    }

    /**
     * @param \DateTime $dtUpdate
     *
     * @return $this
     */
    public function setDtUpdate(\DateTime $dtUpdate)
    {
        $this->dtUpdate = $dtUpdate;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Actor[]
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * @param Actor $actors
     *
     * @return $this
     */
    public function setActors(Actor $actors)
    {
        $this->actors = $actors;

        return $this;
    }
}
