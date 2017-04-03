<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class SwaggerController extends Controller
{
    /**
     * Swagger docs
     * 
     * @Route("/swagger", name="swagger")
     */
    public function swaggerAction()
    {
        $swg = $this->get('kernel')->getRootDir() . '/../swagger/';
        $swagger = \Swagger\scan($swg);
        
        return new JsonResponse($swagger);
    }
}
