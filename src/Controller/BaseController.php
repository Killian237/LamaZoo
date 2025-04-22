<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\Atelier;
use App\Entity\Client;
use App\Entity\Espece;
use App\Entity\Reservation;
use App\Repository\AnimalRepository;
use App\Repository\AtelierRepository;
use App\Repository\ClientRepository;
use App\Repository\EspeceRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(AnimalRepository $animalRepository, AtelierRepository $atelierRepository, EspeceRepository $especeRepository, ClientRepository $clientRepository, ReservationRepository $reservationRepository): Response
    {
        $animaux = $animalRepository->findAll();
        $ateliers = $atelierRepository->findAll();
        $especes = $especeRepository->findAll();
        $clients = $clientRepository->findAll();
        $reservations = $reservationRepository->findAll();

        return $this->render('base/index.html.twig', [
            'animaux' => $animaux,
            'ateliers' => $ateliers,
            'especes' => $especes,
            'clients' => $clients,
            'reservations' => $reservations
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('base/contact.html.twig');
    }

    #[Route('/activites', name: 'app_activites')]
    public function activites(): Response
    {
        return $this->render('base/activites.html.twig');
    }

    #[Route('/boutique', name: 'app_boutique')]
    public function boutique(): Response
    {
        return $this->render('base/boutique.html.twig');
    }

    #[Route('/panier', name: 'app_panier')]
    public function panier(): Response
    {
        return $this->render('base/panier.html.twig');
    }

    #[Route('/animaux', name: 'app_animaux')]
    public function animaux(AnimalRepository $animalRepository): Response
    {
        $animaux = $animalRepository->findAll();
        return $this->render('animal/index.html.twig', [
            'animaux' => $animaux
        ]);
    }


    #[Route('/ateliers', name: 'app_ateliers')]
    public function ateliers(AtelierRepository $atelierRepository): Response
    {
        $ateliers = $atelierRepository->findAll();
        return $this->render('atelier/index.html.twig', [
            'ateliers' => $ateliers
        ]);
    }

    #[Route('/clients', name: 'app_clients')]
    public function clients(ClientRepository $clientRepository): Response
    {
        $clients = $clientRepository->findAll();
        return $this->render('client/index.html.twig', [
            'clients' => $clients
        ]);
    }

    #[Route('/especes', name: 'app_especes')]
    public function especes(EspeceRepository $especeRepository): Response
    {
        $especes = $especeRepository->findAll();
        return $this->render('espece/index.html.twig', [
            'especes' => $especes
        ]);
    }

    #[Route('/reservations', name: 'app_reservations')]
    public function reservations(ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();
        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations
        ]);
    }
}