<?php

namespace App\Service\navigation;

use App\Entity\da\DemandeAppro;
use App\Entity\admin\Application;
use App\Entity\admin\utilisateur\Role;
use App\Entity\admin\utilisateur\User;
use App\Service\SessionManagerService;

class MenuService
{
    private $em;
    private $connectedUser;
    private bool $estAdmin = false;
    private bool $estAtelier = false;
    private bool $estAppro = false;
    private bool $estCreateurDeDADirecte = false;
    private $basePath;
    private $applicationIds = [];

    public function __construct($entityManager)
    {
        $this->em = $entityManager;
        $this->basePath = $_ENV['BASE_PATH_FICHIER_COURT']; // Chemin de base pour les liens de téléchargement --> /Upload
    }

    /**
     * Get the value of estAdmin
     */
    public function getEstAdmin()
    {
        return $this->estAdmin;
    }

    /**
     * Set the value of estAdmin
     *
     * @return  self
     */
    public function setEstAdmin($estAdmin)
    {
        $this->estAdmin = $estAdmin;

        return $this;
    }

    /**
     * Get the value of estAtelier
     */
    public function getEstAtelier()
    {
        return $this->estAtelier;
    }

    /**
     * Set the value of estAtelier
     *
     * @return  self
     */
    public function setEstAtelier($estAtelier)
    {
        $this->estAtelier = $estAtelier;

        return $this;
    }

    /**
     * Get the value of estAppro
     */
    public function getEstAppro()
    {
        return $this->estAppro;
    }

    /**
     * Set the value of estAppro
     *
     * @return  self
     */
    public function setEstAppro($estAppro)
    {
        $this->estAppro = $estAppro;

        return $this;
    }

    /**
     * Get the value of applicationIds
     */
    public function getApplicationIds()
    {
        return $this->applicationIds;
    }

    /**
     * Set the value of applicationIds
     *
     * @return  self
     */
    public function setApplicationIds($applicationIds)
    {
        $this->applicationIds = $applicationIds;

        return $this;
    }

    /**
     * Get the value of connectedUser
     */
    public function getConnectedUser()
    {
        return $this->connectedUser;
    }

    /**
     * Set the value of connectedUser
     *
     * @return  self
     */
    public function setConnectedUser($connectedUser)
    {
        $this->connectedUser = $connectedUser;

        return $this;
    }

    /**
     * Get the value of estCreateurDeDADirecte
     */
    public function getEstCreateurDeDADirecte()
    {
        return $this->estCreateurDeDADirecte;
    }

    /**
     * Set the value of estCreateurDeDADirecte
     *
     * @return  self
     */
    public function setEstCreateurDeDADirecte($estCreateurDeDADirecte)
    {
        $this->estCreateurDeDADirecte = $estCreateurDeDADirecte;

        return $this;
    }

    /**
     * Définit les informations de l'utilisateur connecté :
     * - son statut admin
     * - la liste de ses applications
     */
    private function setConnectedUserContext()
    {
        $sessionManager = new SessionManagerService();

        if ($sessionManager->has('user_id')) {
            /** @var User|null $connectedUser */
            $connectedUser = $this->em->getRepository(User::class)->find($sessionManager->get('user_id'));

            if ($connectedUser) {
                $roleIds = $connectedUser->getRoleIds();
                $serviceIds = $connectedUser->getServiceAutoriserIds();

                $this->setConnectedUser($connectedUser);
                $this->setEstAdmin(in_array(Role::ROLE_ADMINISTRATEUR, $roleIds, true)); // estAdmin
                $this->setEstCreateurDeDADirecte(in_array(Role::ROLE_DA_DIRECTE, $roleIds, true)); // est créateur de DA directe
                $this->setApplicationIds($connectedUser->getApplicationsIds()); // Les applications autorisées de l'utilisateur connecté
            }
        }
    }

    /**
     * Vérifie si l’utilisateur a accès via ses applications
     */
    private function hasAccess(array $requiredIds, array $userApplications): bool
    {
        return !empty(array_intersect($requiredIds, $userApplications));
    }

    /**
     * Retourne la structure du menu organiséegit a
     */
    public function getMenuStructure(): array
    {
        $this->setConnectedUserContext();

        $vignettes = [];
        $estAdmin = $this->getEstAdmin(); // estAdmin
        $applicationIds = $this->getApplicationIds(); // les ids des applications autorisées de l'utilisateur connecté

        // Définition des règles d’accès pour chaque menu
        $menus = [

            [$this->menuCompta(), $estAdmin || $this->hasAccess([Application::ID_DDP, Application::ID_DDR, Application::ID_BCS], $applicationIds)], // DDP + DDR
            [$this->menuRH(), $estAdmin || $this->hasAccess([Application::ID_DOM, Application::ID_MUT, Application::ID_DDC], $applicationIds)],     // DOM + MUT + DDC

        ];

        // Ajout uniquement des menus accessibles
        foreach ($menus as [$menu, $condition]) {
            if ($condition) {
                $vignettes[] = $menu;
            }
        }

        return $vignettes;
    }




    public function menuCompta()
    {
        $subitems = [];

        $subitems[] = $this->createSimpleItem('Cours de change', 'money-bill-wave');

        if ($this->getEstAdmin() || in_array(Application::ID_BCS, $this->getApplicationIds())) {
            $subitems[] = $this->createSubMenuItem(
                'Bon de caisse',
                'receipt',
                [
                    $this->createSubItem('Nouvelle demande', 'plus-circle', 'new_bon_caisse'),
                    $this->createSubItem('Consultation', 'search', 'bon_caisse_liste')
                ]
            );
        }

        return $this->createMenuItem(
            'comptaModal',
            'Compta',
            'calculator',
            $subitems
        );
    }

    public function menuRH()
    {
        $subitems = [];

        if ($this->getEstAdmin() || in_array(Application::ID_DDC, $this->getApplicationIds())) { // DDC
            $subSubitems = [];
            $subSubitems[] = $this->createSubItem('Nouvelle demande', 'plus-circle', 'new_conge', [], '_blank');
            if ($this->getEstAdmin()) {
                $subSubitems[] = $this->createSubItem('Annulation Congé', 'calendar-xmark', 'annulation_conge', [], '_blank');
            }
            $subSubitems[] = $this->createSubItem('Consultation', 'search', 'conge_liste');
            $subitems[] = $this->createSubMenuItem(
                'Congés',
                'umbrella-beach',
                $subSubitems
            );
        }

        return $this->createMenuItem(
            'rhModal',
            'RH',
            'users',
            $subitems,
        );
    }










    /**
     * Crée un élément de menu principal
     */
    public function createMenuItem(string $id, string $title, string $icon, array $items): array
    {
        return [
            'id'    => $id,
            'title' => $title,
            'icon'  => 'fas fa-' . $icon,
            'items' => $items,
        ];
    }

    /**
     * Crée un item simple sans sous-menu
     */
    public function createSimpleItem(string $label, ?string $icon = null, string $link = '#', array $routeParams = [], string $target = ""): array
    {
        return [
            'title' => $label,
            'link' => $link,
            'icon' => 'fas fa-' . ($icon ?? 'file'),
            'target' => $target,
            'routeParams' => $routeParams
        ];
    }

    /**
     * Crée un item avec sous-menu
     */
    public function createSubMenuItem(string $label, string $icon, array $subitems): array
    {
        return [
            'title' => $label,
            'icon' => 'fas fa-' . $icon,
            'subitems' => $subitems
        ];
    }

    /**
     * Crée un sous-item
     */
    public function createSubItem(
        string $label,
        string $icon,
        ?string $link = null,
        array $routeParams = [],
        string $target = "",
        ?string $modalId = null,
        bool $isModalTrigger = false
    ): array {
        return [
            'title' => $label,
            'link' => $link,
            'icon' => 'fas fa-' . $icon,
            'routeParams' => $routeParams,
            'target' => $target,
            'modal_id' => $modalId,
            'is_modal' => $isModalTrigger
        ];
    }
}
