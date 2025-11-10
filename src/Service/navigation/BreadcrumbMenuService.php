<?php

namespace App\Service\navigation;

class BreadcrumbMenuService
{
    private MenuService $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function getFullMenuConfig(): array
    {
        return [
            // Accueil - Sous-menus accueils
            'accueil'              => $this->getMainMenuItems(),
            'compta'               => $this->getComptaSubMenu(),
            'rh'                   => $this->getRhSubMenu(),

            // RH - Sous-menus spécifiques
            'conges'               => $this->getCongesSubMenu(),


            // Compta - Sous-menus spécifiques
            'bon-de-caisse'        => $this->getBonCaisseSubMenu(),

        ];
    }

    private function getMainMenuItems(): array
    {
        $menuStructure = $this->menuService->getMenuStructure();
        return array_map(function ($item) {
            return [
                'id'    => $item['id'],
                'title' => $item['title'],
                'icon'  => $item['icon'],
                'link'  => '#',
                'items' => $item['items']
            ];
        }, $menuStructure);
    }

  

    private function getComptaSubMenu(): array
    {
        $menuCompta = $this->menuService->menuCompta();
        return $this->extractSubMenuItems($menuCompta['items']);
    }

    private function getRhSubMenu(): array
    {
        $menuRh = $this->menuService->menuRH();
        return $this->extractSubMenuItems($menuRh['items']);
    }

   

    // ========== RH - Sous-menus spécifiques ==========


    private function getCongesSubMenu(): array
    {
        return [
            [
                'id'          => null,
                'title'       => 'Nouvelle demande',
                'link'        => '#',
                'icon'        => 'fas fa-plus-circle',
                'routeParams' => []
            ],
            [
                'id'          => null,
                'title'       => 'Consultation',
                'link'        => 'conge_liste',
                'icon'        => 'fas fa-search',
                'routeParams' => []
            ]
        ];
    }





    // ========== Compta - Sous-menus spécifiques ==========


    private function getBonCaisseSubMenu(): array
    {
        return [
            [
                'id'          => null,
                'title'       => 'Nouvelle demande',
                'link'        => '#',
                'icon'        => 'fas fa-plus-circle',
                'routeParams' => []
            ],
            [
                'id'          => null,
                'title'       => 'Consultation',
                'link'        => 'bon_caisse_liste',
                'icon'        => 'fas fa-search',
                'routeParams' => []
            ]
        ];
    }


    /**
     * Extrait et transforme les items d'un menu en format breadcrumb
     */
    private function extractSubMenuItems(array $items): array
    {
        $breadcrumbItems = [];

        foreach ($items as $item) {
            // Si l'item a des sous-items, on les traite récursivement
            if (isset($item['subitems'])) {
                // Ajouter l'item parent comme séparateur/groupe
                $breadcrumbItems[] = [
                    'id'       => null,
                    'title'    => $item['title'],
                    'link'     => null,
                    'icon'     => $item['icon'],
                    'is_group' => true
                ];

                // Ajouter les sous-items
                foreach ($item['subitems'] as $subitem) {
                    $breadcrumbItems[] = [
                        'id'          => $subitem['modal_id'] ?? null,
                        'title'       => $subitem['title'], // Titre combiné pour éviter la confusion
                        'short_title' => $subitem['title'], // Titre court pour l'affichage
                        'link'        => $subitem['link'],
                        'icon'        => $subitem['icon'],
                        'routeParams' => $subitem['routeParams'] ?? [],
                        'is_modal'    => $subitem['is_modal'] ?? false,
                        'parent'      => $item['title'],
                        'parent_icon' => $item['icon']
                    ];
                }
            } else {
                // Item simple
                $breadcrumbItems[] = [
                    'id'          => null,
                    'title'       => $item['title'],
                    'link'        => $item['link'],
                    'icon'        => $item['icon'],
                    'routeParams' => $item['routeParams'] ?? []
                ];
            }
        }

        return $breadcrumbItems;
    }

    /**
     * Trouve un item spécifique dans la configuration du menu
     */
    public function findMenuItem(string $section, string $itemTitle): ?array
    {
        $config = $this->getFullMenuConfig();

        if (!isset($config[$section])) {
            return null;
        }

        foreach ($config[$section] as $item) {
            if (
                $item['title'] === $itemTitle ||
                (isset($item['short_title']) && $item['short_title'] === $itemTitle)
            ) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Trouve un sous-item par son lien
     */
    public function findMenuItemByLink(string $section, string $link): ?array
    {
        $config = $this->getFullMenuConfig();

        if (!isset($config[$section])) {
            return null;
        }

        foreach ($config[$section] as $item) {
            if ($item['link'] === $link) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Obtient tous les items d'une catégorie parente
     */
    public function getItemsByParent(string $section, string $parentTitle): array
    {
        $config = $this->getFullMenuConfig();

        if (!isset($config[$section])) {
            return [];
        }

        $items = [];
        foreach ($config[$section] as $item) {
            if (isset($item['parent']) && $item['parent'] === $parentTitle) {
                $items[] = $item;
            }
        }

        return $items;
    }

    /**
     * Génère le breadcrumb pour une page donnée
     */
    public function generateBreadcrumb(string $section, ?string $currentPage = null): array
    {
        $breadcrumb = [
            ['title' => 'Accueil', 'link' => '/', 'icon' => 'fas fa-home']
        ];

        $config = $this->getFullMenuConfig();

        // Ajouter la section principale
        if ($section !== 'accueil' && isset($config['accueil'])) {
            foreach ($config['accueil'] as $mainItem) {
                if (strtolower($mainItem['title']) === $section) {
                    $breadcrumb[] = [
                        'title' => $mainItem['title'],
                        'link'  => '#',
                        'icon'  => $mainItem['icon']
                    ];
                    break;
                }
            }
        }

        // Ajouter la page courante si spécifiée
        if ($currentPage && isset($config[$section])) {
            $currentItem = $this->findMenuItem($section, $currentPage);
            if ($currentItem) {
                $breadcrumb[] = [
                    'title'   => $currentItem['title'],
                    'link'    => $currentItem['link'],
                    'icon'    => $currentItem['icon'],
                    'current' => true
                ];
            }
        }

        return $breadcrumb;
    }

    /**
     * Génère une structure hiérarchique pour l'affichage des menus
     */
    public function getHierarchicalMenu(string $section): array
    {
        $config = $this->getFullMenuConfig();

        if (!isset($config[$section])) {
            return [];
        }

        $hierarchical = [];
        $groups = [];

        foreach ($config[$section] as $item) {
            if (isset($item['is_group']) && $item['is_group']) {
                // C'est un groupe
                $groups[$item['title']] = [
                    'title'    => $item['title'],
                    'icon'     => $item['icon'],
                    'children' => []
                ];
            } elseif (isset($item['parent'])) {
                // C'est un sous-item
                if (isset($groups[$item['parent']])) {
                    $groups[$item['parent']]['children'][] = $item;
                }
            } else {
                // Item simple
                $hierarchical[] = $item;
            }
        }

        // Ajouter les groupes avec leurs enfants
        foreach ($groups as $group) {
            if (!empty($group['children'])) {
                $hierarchical[] = $group;
            }
        }

        return $hierarchical;
    }

    /**
     * Obtient les liens directs pour une section (sans groupes)
     */
    public function getDirectLinks(string $section): array
    {
        $config = $this->getFullMenuConfig();

        if (!isset($config[$section])) {
            return [];
        }

        $directLinks = [];
        foreach ($config[$section] as $item) {
            if (!isset($item['is_group']) && $item['link'] !== '#') {
                $directLinks[] = [
                    'title'       => $item['short_title'] ?? $item['title'],
                    'full_title'  => $item['title'],
                    'link'        => $item['link'],
                    'icon'        => $item['icon'],
                    'parent'      => $item['parent'] ?? null,
                    'routeParams' => $item['routeParams'] ?? []
                ];
            }
        }

        return $directLinks;
    }
}
