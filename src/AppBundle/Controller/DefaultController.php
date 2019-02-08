<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $session = $this->get('session');
        $history = $session->get('history') ? $session->get('history') : array();

        $calcResult = 0;
        $form = $this->container->get('calc_service')->buildCalcForm($this->createFormBuilder(array('message' => 'Calculator')));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $calcValue_1 = floatval($data['calcValue_1']);
            $calcValue_2 = floatval($data['calcValue_2']);
            $calcMath = $data['calcMath'];

            $calcResult = $this->container->get('calc_service')->doMath($calcValue_1, $calcValue_2, $calcMath);

            array_unshift($history, $calcValue_1 .' '. $calcMath .' '. $calcValue_2 . ' = ' . $calcResult);
            $session->set('history', $history);
        }

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
            'calcResult' => $calcResult,
        ]);
    }

    /**
     * @Route("/clear-history", name="clear-history")
     */
    public function clearHistoryAction(Request $request)
    {
        $session = $this->get('session')->clear();

        return $this->redirectToRoute('index');
    }
}
