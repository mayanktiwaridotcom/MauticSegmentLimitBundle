<?php
namespace MauticPlugin\MauticSegmentLimitBundle\Controller;

use Mautic\CoreBundle\Controller\CommonController;
use MauticPlugin\MauticGSBundle\Entity\ChangeContactSegment;

class SegmentLimitController extends CommonController {

    /**
     * List the persons moved to the Pipedrive fetch from database and display online.
     * @return \Symfony\Component\HttpFoundation\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {
        $em = $this->factory->getEntityManager();
        $lists = $em->getRepository("MauticLeadBundle:LeadList")->getLists();
        $changeSegment = $em->getRepository("MauticGSBundle:ChangeContactSegment")->findAll();

        return $this->delegateView(array(
            'contentTemplate' => 'MauticSegmentLimitBundle:Default:index.html.php',
            'viewParameters' => array("lists" => $lists,"changeSegments"=>$changeSegment),
        ));
    }

    /**
     * Add change segment input
     * @return \Symfony\Component\HttpFoundation\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function changeSegmentAction() {
        try{
            $em = $this->factory->getEntityManager();
            $cSegment = new ChangeContactSegment();
            $cSegment->setSource($_POST['source_segment']);
            $cSegment->setDestination($_POST['destination_segment']);
            $cSegment->setLimit($_POST['limit']);
            $em->persist($cSegment);    
            $em->flush();
            return $this->redirectToRoute('plugin_mautic_sl_index', array('page'=>''));
        }
        catch(\Exception $e){
            $this->get('logger')->info($e->getMessage().' on '.$e->getFile().' '.$e->getLine());
            return $this->delegateView(array(
                'contentTemplate' => 'MauticSegmentLimitBundle:Default:error.html.php',
                'viewParameters' => array("error"=>$e->getMessage()),
            ));
        }
    }

    /**
     * Add change segment input
     * @return \Symfony\Component\HttpFoundation\JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function deleteChangeSegmentAction() {
        try{
            $em = $this->factory->getEntityManager();
            $cSegment = $em->getRepository("MauticSegmentLimitBundle:ChangeContactSegment")->findOneById($_POST['idToDelete']);
            $em->remove($cSegment);    
            $em->flush();
            return $this->redirectToRoute('plugin_mautic_sl_index', array('page'=>''));
        }
        catch(\Exception $e){
            $this->get('logger')->info($e->getMessage().' on '.$e->getFile().' '.$e->getLine());
            return $this->delegateView(array(
                'contentTemplate' => 'MauticSegmentLimitBundle:Default:error.html.php',
                'viewParameters' => array("error"=>$e->getMessage()),
            ));
        }
    }
}

