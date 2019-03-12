<?php

namespace App\Controller;

use App\Entity\Foo;
use JMS\Serializer\SerializationContext;
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
        $data = array_map(
            function ($suffix) {
                return (new Foo())
                    ->setFoo('foo - ' . $suffix)
                    ->setBar('bar - ' . $suffix);
            },
            range(1,3)
        );

        $context1 = (new SerializationContext())->setGroups('Foo');
        $context2 = (new SerializationContext())->setGroups('Foo.foo');
        $context3 = (new SerializationContext())->setGroups('Foo.bar');

        return new JsonResponse($serializer->serialize($data, 'json', $context1), 200, [], true);
    }
}
