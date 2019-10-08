<?php
namespace MauticPlugin\MauticSegmentLimitBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Mautic\CoreBundle\Entity\CommonEntity;

/**
 * 
 * @ORM\Entity
 * @ORM\Table(name="plugin_change_contact_segment")
 */
class ChangeContactSegment extends CommonEntity{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(name="source", type="integer")
     */
    private $source;
    
    /**
     * @ORM\Column(name="destination", type="integer")
     */
    private $destination;

    /**
     * @ORM\Column(name="changelimit", type="integer")
     */
    private $limit;

    public function getId(){
	    return $this->id;
    }

    public function setId($id){
	    $this->id = $id;
    }

    public function getSource(){
	    return $this->source;
    }

    public function setSource($source){
	    $this->source = $source;
    }

    public function getDestination(){
	    return $this->destination;
    }

    public function setDestination($destination){
	    $this->destination = $destination;
    }

    public function getLimit(){
	    return $this->limit;
    }

    public function setLimit($limit){
	    $this->limit = $limit;
    }
}