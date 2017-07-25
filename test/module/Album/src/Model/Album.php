<?php
/**
 * User: orkin
 * Date: 13/02/2017
 * Time: 17:07
 */
declare(strict_types = 1);


namespace Album\Model;
use Doctrine\ORM\Mapping as ORM;
/**
 * Class Album
 * @package Album\Model
 *
 * @ORM\Entity(repositoryClass="Album\Repository\AlbumRepository")
 * @ORM\Table(name="album")
 */
class Album
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
     * @ORM\Column(name="artist", type="string", length=100)
     */
    public $artist;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
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
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param string $artist
     *
     * @return $this
     */
    public function setArtist(string $artist)
    {
        $this->artist = $artist;

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
     * @param array $data
     */
    public function exchangeArray(array $data)
    {
        $this->id     = $data['id'] ?? null;
        $this->artist = $data['artist'] ?? null;
        $this->title  = $data['title'] ?? null;
    }

    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return [
            'id'     => $this->id,
            'artist' => $this->artist,
            'title'  => $this->title,
        ];
    }
}
