<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 16:52
 */
declare(strict_types = 1);


namespace Actor\Entity;


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
     * @var \DateTime
     *
     * @ORM\Column(name="date_birth", type="datetime")
     */
    public $dateBirth;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=100)
     */
    public $sex;

    /**
     * @ORM\ManyToMany(targetEntity="Film\Entity\Film")
     * @ORM\JoinTable(name="Film_Actor",
     *      joinColumns={@ORM\JoinColumn(name="actor_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="film_id", referencedColumnName="id", unique=true)}
     *      )
     */

    public $films;

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
     * @return \DateTime
     */
    public function getDateBirth()
    {
        return $this->dateBirth;
    }

    /**
     * @param \DateTime $dateBirth
     *
     * @return $this
     */
    public function setDateBirth(\DateTime $dateBirth)
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    /**
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     *
     * @return $this
     */
    public function setSex(string $sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * @return Film
     */
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * @param Film $films
     *
     * @return $this
     */
    public function setFilms(Film $films)
    {
        $this->films = $films;

        return $this;
    }
}
