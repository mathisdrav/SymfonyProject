<?php

namespace App\Controller;

use App\Entity\Voitures;
use App\Form\VoitureType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;

class VoitureController extends AbstractController
{
    /**
     * @Route("/index",name="index", methods="GET")
     */
    public function index(Request $request, PaginatorInterface $paginator) : Response
    {
        $donnees = $this->getDoctrine()->getRepository(Voitures::class)->findBy([], ['id' => 'DESC']);      //récupere tous les objets par id décroissant
        $voitures = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1),         //numéro de la page
            3       //nombre par page
        );
        
        return $this->render('voitures/index.html.twig', ['voitures' => $voitures]);        //variable envoyé au template
    }

    /**
     * @Route("/admin",name="admin", methods="GET")
     */
    public function admin(Request $request, PaginatorInterface $paginator) : Response
    {
        $donnees = $this->getDoctrine()->getRepository(Voitures::class)->findBy([], ['id' => 'DESC']);

        $voitures = $paginator->paginate(
            $donnees,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('voitures/admin.html.twig', ['voitures' => $voitures]);
    }

    /**
     *@Route("/show/{id<\d+>}", name="voiture_show", methods="GET")
     */
    public function show(int $id): Response
    {
        $voiture = $this->getDoctrine()->getRepository(Voitures::class)->find($id);     //récupere l'objet en fonction de son id

        if(!$voiture)
        {
            throw $this->createNotFoundException('La voiture n\'a pas été trouvé '. $id);
        }
        return $this->render('voitures/show.html.twig', ['voiture' => $voiture]);
    }

    /**
     * @Route("/voiture/new", name="voiture_new")
     */
    public function create(Request $request): Response
    {
        $voiture = new Voitures();
        $form = $this->createForm(VoitureType::class, $voiture);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $file = $form->get('uploadImage')->getData();

            if ($file)                                                  //enregistrer le nom de l'image dans l'objet
            {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('voiture', $filename);
                $voiture->setPhotoPrincipale($filename);
            }
            else
            {
                return $this->redirectToRoute('voiture_new');
            }
            $date = new \DateTime('@'.strtotime('now'));
            $voiture->setCreatedAt($date);
            $voiture->setUpdatedAt($date);

            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);                             //l'objet que l'on veut créer
            $em->flush();                                       //éxecute la requête

            return $this->redirectToRoute('admin');
        }
        return $this->render('voitures/create.html.twig', [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id<\d+>}", name="voiture_edit")
     */
    public function edit( Request $request, Voitures $voiture): Response
    {
        $form = $this->createForm(VoitureType::class, $voiture);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $file = $form->get('uploadImage')->getData();
            
            if ($file)
            {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('voiture', $filename);
                $voiture->setPhotoPrincipale($filename);
            }
            
            $date = new \DateTime('@'.strtotime('now'));
            $voiture->setUpdatedAt($date);

            $em =$this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('voitures/edit.html.twig', [
            "form" => $form->createView(),
            "voiture" => $voiture
        ]);
    }

    /**
     * @Route("/delete/{id<\d+>}", name="voiture_delete")
     */
    public function destroy(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository(Voitures::class)->find($id);
        $em->remove($voiture);
        $em->flush();

        return $this->redirectToRoute('admin');
    }
}