<?php

namespace App\Controller;

use App\Entity\Employer;
use App\Form\EmployerType;
use App\Repository\EmployerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployerController extends AbstractController
{
    #[Route('/', name: 'app_employer')]
    public function index(EmployerRepository $repo): Response
    {
        $employes = $repo->findAll();
        
        return $this->render('employes/index.html.twig', [
            'tabEmployes' => $employes,
        ]);
    }



    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('employes/home.html.twig');
    
    
    }

    #[Route('/employes/new', name: 'employes_create')]
    #[Route('/employes/edit/{id}', name: 'employes_edit')]

    public function form(Request $superglobals, EntityManagerInterface $manager, Employer $employer = null) 
  
    {
        

        if($employer == null)    
        {
        
             $employer = new Employer;
             
        }

       $form = $this->createForm(EmployerType::class, $employer);// lier le formulaire à l objet
       

        $form->handleRequest($superglobals);


        
        
        #{ dump($employer);}

if($form->isSubmitted() && $form->isValid())
{
    
    $manager->persist($employer); 
    $manager->flush(); 
return $this->redirectToRoute('app_employer', [
    'id' => $employer->getId()
]);
}

        return $this->renderForm("employes/form.html.twig",[
            'formEmployer' => $form,
            'editMode' => $employer->getId() !== NULL
        ]);

       
    }
    #[Route('/employes/delete/{id}', name:'employes_delete')]

    public function delete(EntityManagerInterface $manager, $id, EmployerRepository $repo)
    {
$employer = $repo->find($id);

$manager->remove($employer);


$manager->flush();


$this->addFlash('success', "l'employer  a bien été suprimé !");



return $this->redirectToRoute(("app_employer"));


    }
}
