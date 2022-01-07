<?php

namespace App\Controller;

use App\Entity\Videos;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NetfleetController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Netfleet',
        ]);
    }
    /** @Route("/create/", name="create") */
    public function create(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $video = new Videos();
        $video->setNom("Mars Attack");
        $video->setSynopsis("Effervescence sur la planète Terre. Les petits bonshommes verts ont enfin décidé de nous rendre visite. Ils sont sur le point d'atterrir dans leurs rutilantes soucoupes. La fièvre des grands jours s'empare de l'Amérique dans une comédie de science-fiction nostalgique des années cinquante.");
        $video->setType("Movie");
        $video->setCreationAt(new \DateTime());

        $entityManager->persist($video);
        $entityManager->flush();

        return new JsonResponse(["message" => "Success", "code => 201"], 200);
    }
    /** @Route("/getall/", name="getall") */
    public function getall(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Videos::class);
        $videos = $repository->findAll();

        $array = array();

        foreach ($videos as $video) {
            $array[] = array(
                'id' => $video->getId(),
                'nom' => $video->getNom(),
                'synopsys' => $video->getSynopsis(),
                'type' => $video->getType()
            );
        }
        return new JsonResponse($array);
    }
    /** @Route("/get/{id}", name="get", requirements={"id"="\d+"}) */
    public function getid(ManagerRegistry $doctrine, int $id): Response
    {

        $video = $doctrine->getRepository(Videos::class)->find($id);

        if (!$video) {
            return new JsonResponse(["message" => 'Aucun film ne contient l’identifiant :'.$id, "code => 401"], 400);
        }
        return new Response('Clique sur play pour lancer le/la '.$video->getType().' : '.$video->getNom());
    }
}
