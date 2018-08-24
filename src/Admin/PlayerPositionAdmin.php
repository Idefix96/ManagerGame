<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlayerPositionAdmin extends AbstractAdmin {
	protected function configureFormFields(FormMapper $formMapper) {
		$formMapper->add('fullName', TextType::class);
		$formMapper->add('shortName', TextType::class);
		$formMapper->add('altName', TextType::class, array('required' => false));
	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
		$datagridMapper->add('fullName');
		$datagridMapper->add('shortName');
		$datagridMapper->add('altName');
	}

	protected function configureListFields(ListMapper $listMapper) {
		$listMapper->addIdentifier('fullName');
		$listMapper->addIdentifier('shortName');
		$listMapper->addIdentifier('altName');
	}
}