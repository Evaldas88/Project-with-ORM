<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="project")
 */
class Project
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /** 
     * @ORM\Column(type="string")
     */
    protected $project_name;
       /**
     * @ORM\OneToMany(targetEntity="People", mappedBy="project_id" )
     */
    public $peopleAndprojects;

    public function getId(){
        return $this->id;
    }
    public function setProjName($project_name) {
            return $this->project_name = $project_name;
    }
    public function getProjName() {
        return $this->project_name;
}
    public function __construct() {
        $this->peopleAndprojects = new ArrayCollection();
    }
}
?>