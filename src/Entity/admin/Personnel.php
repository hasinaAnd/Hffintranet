<?php

namespace App\Entity\admin;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\admin\utilisateur\User;
use App\Entity\admin\AgenceServiceIrium;
use Doctrine\Common\Collections\Collection;
use App\Repository\admin\PersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Personnel")
 * @ORM\Entity(repositoryClass=PersonnelRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Personnel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $Matricule;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private ?string $Nom;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private ?string $Code_AgenceService_Sage;


    /**
     * @ORM\Column(type="string")
     */
    private ?string $Numero_Compte_Bancaire;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private ?string $Prenoms;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private ?string $Qualification;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="personnels")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity=AgenceServiceIrium::class, inversedBy="personnelId")
     * @ORM\JoinColumn(name="agence_service_irium_id", referencedColumnName="id")
     */
    private $agenceServiceIriumId;


    /**
     * @ORM\OneToMany(targetEntity=AgenceServiceIrium::class, mappedBy="chefServiceId")
     */
    private $agServIriumChefService;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->agServIriumChefService = new ArrayCollection();
    }


    //======================================================
    // Getters and Setters...

    public function getId(): int
    {
        return $this->id;
    }

    public function getMatricule(): int
    {
        return $this->Matricule;
    }

    public function setMatricule(int $Matricule): self
    {
        $this->Matricule = $Matricule;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;
        return $this;
    }

    public function getCodeAgenceServiceSage(): ?string
    {
        return $this->Code_AgenceService_Sage;
    }

    public function setCodeAgenceServiceSage(?string $Code_AgenceService_Sage): self
    {
        $this->Code_AgenceService_Sage = $Code_AgenceService_Sage;
        return $this;
    }


    public function getNumeroCompteBancaire(): ?string
    {
        return $this->Numero_Compte_Bancaire;
    }

    public function setNumeroCompteBancaire(string $Numero_Compte_Bancaire): self
    {
        $this->Numero_Compte_Bancaire = $Numero_Compte_Bancaire;
        return $this;
    }



    public function getPrenoms(): string
    {
        return $this->Prenoms;
    }

    public function setPrenoms(string $Prenoms): self
    {
        $this->Prenoms = $Prenoms;
        return $this;
    }

    public function getQualification(): string
    {
        return $this->Qualification;
    }

    public function setQualification(string $Qualification): self
    {
        $this->Qualification = $Qualification;
        return $this;
    }


    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPersonnels($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            if ($user->getPersonnels() === $this) {
                $user->setPersonnels(null);
            }
        }

        return $this;
    }

    public function setUsers($users): self
    {
        $this->users = $users;

        return $this;
    }


    public function getAgenceServiceIriumId()
    {
        return $this->agenceServiceIriumId;
    }


    public function setAgenceServiceIriumId($agenceServiceIriumId): self
    {
        $this->agenceServiceIriumId = $agenceServiceIriumId;

        return $this;
    }

    public function toArray(): array
    {
        return [

            'Matricule' => $this->Matricule
        ];
    }
}
