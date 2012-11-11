<?php

namespace Zorbus\DocumentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlockController extends Controller
{
    public function documentAction($block)
    {
        $parameters = json_decode($block->getParameters());
        $document = $this->getDoctrine()->getRepository('ZorbusDocumentBundle:Document')->find($parameters->document_id);

        return $this->render('ZorbusDocumentBundle:Block:document.html.twig', array(
            'block' => $block, 'document' => $document
        ));
    }
    public function tagAction($block)
    {
        $parameters = json_decode($block->getParameters());
        $tag = $this->getDoctrine()->getRepository('ZorbusDocumentBundle:Tag')->find($parameters->tag_id);

        return $this->render('ZorbusDocumentBundle:Block:tag.html.twig', array(
            'block' => $block, 'tag' => $tag
        ));
    }
}
