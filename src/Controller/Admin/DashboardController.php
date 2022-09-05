<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Categorie;
use App\Entity\Exemplaire;
use App\Entity\Affectation;
use App\Entity\Projet;
use App\Entity\Volet;
use App\Entity\Emplacement;
use App\Entity\Origine;
use App\Entity\Personnel;
use App\Entity\Inventaire;
use App\Entity\Rubrique;
use App\Entity\Post;
use App\Entity\Media;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator

    ) {
    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();
        $url = $this->adminUrlGenerator
            ->setController(ArticleCrudController::class)
            ->generateUrl();
        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Fitaovako');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Gestion de Matériel');

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::subMenu('Categories', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Categorie', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste Categorie', 'fas fa-eye', Categorie::class)
        ]);
        yield MenuItem::subMenu('Articles', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Article', 'fas fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste Article', 'fas fa-eye', Article::class)
        ]);

        yield MenuItem::subMenu('Origine', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Origine', 'fas fa-plus', Origine::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('liste Origine', 'fas fa-eye', Origine::class),
            //MenuItem::linkToUrl('Search in Google', 'fab fa-google', 'https://google.com')

        ]);


        yield MenuItem::subMenu('Exemplaires', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Exemplaire', 'fas fa-plus', Exemplaire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste Exemplaire', 'fas fa-eye', Exemplaire::class)
        ]);
        yield MenuItem::subMenu('Projet', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout projet', 'fas fa-plus', Projet::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('liste de projet', 'fas fa-eye', Projet::class)
        ]);
        yield MenuItem::subMenu('Volet', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout volet', 'fas fa-plus', Volet::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('liste de volet', 'fas fa-eye', Volet::class)
        ]);

        yield MenuItem::subMenu('Emplacement', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Emplacement', 'fas fa-plus', Emplacement::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('liste Emplacement', 'fas fa-eye', Emplacement::class)
        ]);


        yield MenuItem::subMenu('Personnel', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout personnel', 'fas fa-plus', Personnel::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('liste de personnel', 'fas fa-eye', Personnel::class)
        ]);

        yield MenuItem::subMenu('Affectation', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout affectation', 'fas fa-plus', Affectation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('suivi d\'affectation', 'fas fa-eye', Affectation::class)
        ]);

        yield MenuItem::subMenu('Inventaire', 'fas fa-bars')->setSubItems([
            //MenuItem::linkToCrud('Faire Inventaire', 'fas fa-plus', Inventaire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linktoRoute('Inventaire rapide', 'fa fa-plus', 'logistique'),
            MenuItem::linkToCrud('Liste des inventaires', 'fas fa-eye', Inventaire::class),
            MenuItem::linktoRoute('Résultats', 'fa fa-bars', 'absent')
        ]);



        //yield MenuItem::linktoRoute('Test', 'fa fa-icon', 'route_test')->setPermission('ROLE_ADMIN');
        // yield MenuItem::linktoRoute('Test', 'fa fa-icon', 'test');
        //yield MenuItem::linktoRoute('/pdf', 'fa fa-icon', 'test.pdf');
        //yield MenuItem::linktoRoute('Inventaire en Pdf', 'fa fa-icon', 'inventaire.pdf');
        //yield MenuItem::linktoRoute('Inventaire rapide', 'fa fa-icon', 'logistique');
        //yield MenuItem::linktoRoute('Résultats', 'fa fa-icon', 'absent');



        yield MenuItem::section('Gestion de Site');
        yield MenuItem::subMenu('Rubrique', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Rubrique', 'fas fa-plus', Rubrique::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste Rubrique', 'fas fa-eye', Rubrique::class)
        ]);
        yield MenuItem::subMenu('Post', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Post', 'fas fa-plus', Post::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste Post', 'fas fa-eye', Post::class)
        ]);
        yield MenuItem::subMenu('Photo', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Ajout Photo', 'fas fa-plus', Media::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Liste Photo', 'fas fa-eye', Media::class)
        ]);
    }
}
