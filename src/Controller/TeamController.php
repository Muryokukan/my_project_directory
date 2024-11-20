<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TeamController
{
    #[Route('/api/teams', name: 'api_create_team', methods: ['POST'])]
    public function createTeam(Request $request): JsonResponse
    {
        // Exemple de logique
        $data = json_decode($request->getContent(), true);
        return new JsonResponse(['message' => 'Team created!', 'data' => $data], 201);
    }
}
