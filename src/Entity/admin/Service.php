<?php

namespace App\Entity\admin;


use App\Entity\dom\Dom;
use App\Entity\badm\Badm;
use App\Entity\admin\Agence;
use App\Entity\Traits\DateTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\mutation\Mutation;
use App\Entity\admin\utilisateur\User;
use App\Entity\dit\DemandeIntervention;
use App\Repository\admin\ServiceRepository;
use Doctrine\Common\Collections\Collection;
use App\Entity\tik\DemandeSupportInformatique;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="services")
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Service
{
    use DateTrait;

    public const ID_ATELIER = 3;
    public const ID_APPRO = 16;
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column("string", name="code_service")
     *
     * @var string
     */
    private string $codeService;

    /**
     * @ORM\Column("string", name="libelle_service")
     *
     * @var string
     */
    private string $libelleService;

    /**
     * @ORM\ManyToMany(targetEntity=Agence::class, mappedBy="services")
     */
    private Collection $agences;


    /**=====================================================================================
     * 
     * GETTERS and SETTERS
     *
    =====================================================================================*/

    public function __construct()
    {
        $this->agences = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }



    public function getCodeService()
    {
        return $this->codeService;
    }


    public function setCodeService($codeService): self
    {
        $this->codeService = $codeService;

        return $this;
    }


    public function getLibelleService()
    {
        return $this->libelleService;
    }


    public function setLibelleService(string $libelleService): self
    {
        $this->libelleService = $libelleService;

        return $this;
    }


    public function getAgences(): Collection
    {
        return $this->agences;
    }

    public function addAgence(Agence $agence): self
    {
        if (!$this->agences->contains($agence)) {
            $this->agences[] = $agence;
            $agence->addService($this);
        }
        return $this;
    }

    public function removeAgence(Agence $agence): self
    {
        if ($this->agences->contains($agence)) {
            $this->agences->removeElement($agence);
            $agence->removeService($this);
        }
        return $this;
    }
}
