<?php
/**
 * User: youcef_l
 * Date: 20/02/2017
 * Time: 15:02
 */
declare(strict_types = 1);


namespace Category\Entity;


use Doctrine\ORM\Mapping as ORM;
use Film\Entity\Film;

/**
 * Class Category
 * @package Category\Entity
 *
 * @ORM\Entity(repositoryClass="Category\Repository\CategoryRepository")
 * @ORM\Table(name="category")
 */
class Category
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
     * @ORM\Column(name="nom", type="string", length=100)
     */
    public $title;

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
}
