<?php

namespace App\Controller;

use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     *
     * @param SerializerInterface $serializer
     *
     * @return JsonResponse
     */
    public function index(SerializerInterface $serializer): JsonResponse
    {
        $data = [
            ['id' => 1, 'foo' => 'bar1', 'bar' => 'foo1'],
            ['id' => 2, 'foo' => 'bar2', 'bar' => 'foo2'],
        ];

        return new JsonResponse($serializer->serialize($data, 'json'), 200, [], true);
    }
}
