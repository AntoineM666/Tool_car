<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\SearchFormType;
use App\Form\Vehicule1Type;
use App\Repository\VehiculeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;



/**
 * @Route("/")
 */
class VehiculeController extends AbstractController
{

    
    
    /**
     * @Route ("/home", name="home")
     */
    public function home(  )
    {
            return $this->render("vehicule/home.html.twig");
    }


    /**
     * @Route("/", name="vehicule_index", methods={"GET"})
     */
    public function index(VehiculeRepository $vehiculeRepository): Response
    {
        return $this->render('vehicule/index.html.twig', [
            'vehicules' => $vehiculeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="vehicule_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $vehicule = new Vehicule();
        $form = $this->createForm(Vehicule1Type::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vehicule);
            $entityManager->flush();

            return $this->redirectToRoute('vehicule_index');
        }

        return $this->render('vehicule/new.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vehicule_show", methods={"GET"})
     */
    public function show(Vehicule $vehicule): Response
    {
        return $this->render('vehicule/show.html.twig', [
            'vehicule' => $vehicule,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="vehicule_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Vehicule $vehicule): Response
    {
        $form = $this->createForm(Vehicule1Type::class, $vehicule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vehicule_index');
        }

        return $this->render('vehicule/edit.html.twig', [
            'vehicule' => $vehicule,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="vehicule_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Vehicule $vehicule): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehicule->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vehicule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vehicule_index');
    }





    
      /**
     * 
     * @Route("/vehicule/recherche", name="search")
     */
    public function recherche(Request $request, VehiculeRepository $repo ) {
      
        $searchForm = $this->createForm(SearchFormType::class);
        $searchForm->handleRequest($request);
        
        $donnees = $repo;
 
        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
 
            $marque = $searchForm->getData()->getMarque();

            $donnees = $repo->search($marque);


            if ($donnees == null) {
                $this->addFlash('erreur', 'Aucun article contenant ce mot clé dans le titre n\'a été trouvé, essayez en un autre.');
           
            }

    }


        return $this->render('vehicule/search.html.twig', [
            'vehicules'=>$donnees ,
            'searchForm' => $searchForm->createView()
        ]);
    }


    /**
     * @Route("/{id}/facture", name="showfacture", methods={"GET"})
     */
    public function showfacture(Vehicule $vehicule)
    {
        

        {
            
            // Configure Dompdf according to your needs
            $pdfOptions = new Options();

            $pdfOptions->set('defaultFont', 'Arial');
            $pdfOptions->setisRemoteEnabled ('true');
            
            // Instantiate Dompdf with our options
            $dompdf = new Dompdf($pdfOptions);
            
            // Retrieve the HTML generated in our twig file
            $html = $this->renderView('vehicule/showfacture.html.twig', [
                'vehicule' => $vehicule,
            ]);
            
            // Load HTML to Dompdf
            $dompdf->loadHtml($html);
            
            // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
            $dompdf->setPaper('A4', 'portrait');
    
            // Render the HTML as PDF
            $dompdf->render();
    
            // Output the generated PDF to Browser (force download)
            $dompdf->stream("Facture n°.pdf", [
                "Attachment" => true
            ]);
        }



    }
  
}
