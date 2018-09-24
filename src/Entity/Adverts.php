<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="adverts")
 * @ORM\Entity(repositoryClass="App\Repository\AdvertsRepository")
 */
class Adverts {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;
    
    /**
     * @ORM\Column(type="text")
     */
    private $description;
    
    /**
     * @ORM\Column(type="integer", length=11)
     */
    private $author_id;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getAuthor_id() {
        return $this->author_id;
    }

    function getDatetime() {
        return $this->datetime;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setAuthor_id($author_id) {
        $this->author_id = $author_id;
    }

    function setDatetime($datetime) {
        $this->datetime = $datetime;
    }
}
