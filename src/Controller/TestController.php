<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    public function index(){
        var_dump("Ca fonctionne");
        die();
    }

    /**
     * @Route("/test/{age<\d+>?0}", name="test", methods={"GET", "POST"}, schemes={"http", "https"})
     */
    public function test(Request $request)
    {
        //$request = Request::createFromGlobals();

        //$age = $request->query->get('age', 0);
        $age = $request->attributes->get('age',0);

        
        return new Response("Vous avez $age ans");
    }
}