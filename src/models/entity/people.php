<?php

namespace Entities;
 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="personal")
 */

class People
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     *@ORM\Column(type="string")
     */
    protected $fname;
    /**
     *@ORM\Column(type="string")
     */

    protected $lname;
    /** 
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="peopleAndprojects")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id", onDelete="SET NULL")
     */
    public $project_id;

    public function getId()
    {
        return $this->id;
    }
    public function setName($fname)
    {
        return $this->fname = $fname;
    }
    public function getName()
    {
        return $this->fname;
    }
    public function setSurname($lname)
    {
        return $this->lname = $lname;
    }
    public function getSurname()
    {
        return $this->lname;
    }
    public function getProj($project_id)
    {
        return $this->project_id = $project_id;
    }
}
