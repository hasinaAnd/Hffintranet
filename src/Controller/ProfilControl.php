<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;


class ProfilControl extends Controller
{
    /**
     * @Route("/", name="profil_acceuil")
     */
    public function showPageAcceuil()
    {
        //verification si user connecter
        $this->verifierSessionUtilisateur();

        self::$twig->display(
            'main/accueil.html.twig'
        );
    }
}
