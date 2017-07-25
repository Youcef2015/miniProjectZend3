<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 16:52
 */
declare(strict_types = 1);


namespace Actor\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Film\Entity\Film;

/**
 * Class Actor
 * @package Actor\Entity
 *
 * @ORM\Entity(repositoryClass="Actor\Repository\ActorRepository")
 * @ORM\Table(name="actor")
 */
class Actor
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
     * @ORM\Column(name="first_name", type="string", length=100)
     */
    public $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=100)
     */
    public $lastName;


    /**
     * @var int
     *
     * @ORM\Column(name="sex", type="integer", length=100)
     */
    public $sex;

    /**
     * @ORM\ManyToMany(targetEntity="Film\Entity\Film", cascade={"persist", "remove"})
     */
    public $film;

    public function __construct()
    {
        $this->film = new ArrayCollection();
    }

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
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return int
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param int $sex
     *
     * @return $this
     */
    public function setSex(int $sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param ArrayCollection $films
     *
     * @return $this
     */
    public function setFilm(ArrayCollection $films)
    {
        $this->film = $films;

        return $this;
    }

    public function addFilm(Film $film)
    {
        $this->film->add($film);

        return $this;
    }
}
