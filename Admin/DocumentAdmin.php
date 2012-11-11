<?php

namespace Zorbus\DocumentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DocumentAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
                ->with('Identification')
                ->add('title')
                ->add('attachmentTemp', 'file', array('required' => true, 'label' => 'Document'))
                ->add('description', 'textarea', array('required' => false, 'attr' => array('class' => 'ckeditor')))
                ->end()
                ->with('Configuration', array('collapsed' => false))
                ->add('iconTemp', 'file', array('required' => false, 'label' => 'Image'))
                ->add('enabled', null, array('required' => false))
                ->end()
                ->with('Classification', array('collapsed' => true))
                ->add('tags', 'entity', array(
                    'class' => 'Zorbus\\DocumentBundle\\Entity\\Tag',
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false,
                    'attr' => array('class' => 'select2 span5')
                ))
                ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('title')
                ->add('mime')
                ->add('enabled')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('title')
                ->add('mime')
                ->add('enabled')
        ;
    }

    public function configureShowFields(ShowMapper $filter)
    {
        $filter
                ->add('title')
                ->add('description')
                ->add('attachment')
                ->add('icon')
                ->add('size')
                ->add('mime')
                ->add('extension')
                ->add('tags')
                ->add('enabled')
        ;
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
                ->with('title')
                ->assertNotBlank()
                ->assertMaxLength(array('limit' => 255))
                ->end()
        ;
    }

    public function prePersist($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

    public function preUpdate($object)
    {
        $object->setUpdatedAt(new \DateTime());
    }

}