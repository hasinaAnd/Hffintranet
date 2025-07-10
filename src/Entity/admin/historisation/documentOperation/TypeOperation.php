<?php

namespace App\Entity\admin\historisation\documentOperation;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\admin\historisation\documentOperation\HistoriqueOperationDocument;
use App\Repository\admin\historisation\documentOperation\TypeOperationRepository;

/**
 * @ORM\Entity(repositoryClass=TypeOperationRepository::class)
 * @ORM\Table(name="type_operation")
 * @ORM\HasLifecycleCallbacks
 */
class TypeOperation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @var string
     */
    private string $typeOperation;

    /**
     * @ORM\Column(type="string", length=10, name="heure_creation")
     */
    private $heureCreation;

    /**
     * @ORM\Column(type="string", length=10, name="heure_modification")
     */
    private $heureModification;

    /**
     * @ORM\OneToMany(targetEntity=HistoriqueOperationDocument::class, mappedBy="idTypeOperation")
     */
    private $historiqueOperationDoc;


    //==========================================================================================

    public function __construct()
    {
        $this->historiqueOperationDoc = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }


    public function getTypeOperation()
    {
        return $this->typeOperation;
    }


    public function setTypeOperation($typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    /**
     * Get the value of heureCreation
     */
    public function getHeureCreation()
    {
        return $this->heureCreation;
    }

    /**
     * Set the value of heureCreation
     *
     * @return  self
     */
    public function setHeureCreation($heureCreation)
    {
        $this->heureCreation = $heureCreation;

        return $this;
    }

    /**
     * Get the value of heureModification
     */
    public function getHeureModification()
    {
        return $this->heureModification;
    }

    /**
     * Set the value of heureModification
     *
     * @return  self
     */
    public function setHeureModification($heureModification)
    {
        $this->heureModification = $heureModification;

        return $this;
    }

    /**
     * Get the value of demandeIntervention
     */
    public function getHistoriqueOperationDoc()
    {
        return $this->historiqueOperationDoc;
    }

    public function addHistoriqueOperationDoc(HistoriqueOperationDocument $historiqueOperationDoc): self
    {
        if (!$this->historiqueOperationDoc->contains($historiqueOperationDoc)) {
            $this->historiqueOperationDoc[] = $historiqueOperationDoc;
            $historiqueOperationDoc->setIdTypeOperation($this);
        }

        return $this;
    }

    public function removeHistoriqueOperationDoc(HistoriqueOperationDocument $historiqueOperationDoc): self
    {
        if ($this->historiqueOperationDoc->contains($historiqueOperationDoc)) {
            $this->historiqueOperationDoc->removeElement($historiqueOperationDoc);
            if ($historiqueOperationDoc->getIdTypeOperation() === $this) {
                $historiqueOperationDoc->setIdTypeOperation(null);
            }
        }

        return $this;
    }

    public function setHistoriqueOperationDoc($historiqueOperationDoc)
    {
        $this->historiqueOperationDoc = $historiqueOperationDoc;

        return $this;
    }
}
