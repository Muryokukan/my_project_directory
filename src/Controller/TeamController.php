<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;


class TeamController extends AbstractController
{
    #[Route('/api/teams', name: 'api_get_team', methods: ['GET'])]
    public function teamGet(TeamRepository $teamRepository, SerializerInterface $serializerInterface): JsonResponse
    {
        $team = $teamRepository->findAll();
        $teamJson = $serializerInterface->serialize($team,'json', ['groups'=>'allteam']);

        return new JsonResponse($teamJson, 200, [], true);
    }

    #[Route('/api/teams', name: 'api_create_team', methods: ['POST'])]
    public function createTeam(Request $request): JsonResponse
    {
        // Exemple de logique
        $data = json_decode($request->getContent(), true);
        return new JsonResponse(['message' => 'Team created!', 'data' => $data], 201);
    }
}
