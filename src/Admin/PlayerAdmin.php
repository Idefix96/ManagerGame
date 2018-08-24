<?php
namespace App\Admin;

use App\Entity\Club;
use App\Entity\PlayerPosition;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PlayerAdmin extends AbstractAdmin {
	protected function configureFormFields(FormMapper $formMapper) {
		$formMapper->add('lastname', TextType::class);
		$formMapper->add('name', TextType::class);
		$formMapper->add('altName', TextType::class, [
			'required' => false,
		]);
		$formMapper->add('position', EntityType::class, [
			'class' => PlayerPosition::class,
			'choice_label' => 'shortName',
			'multiple' => true,

		]);
		$formMapper->add('currentClub', EntityType::class, [
			'class' => Club::class,
			'choice_label' => 'name',
			'required' => false,
		]);

	}

	protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
		$datagridMapper->add('lastname');
		$datagridMapper->add('name');
	}

	protected function configureListFields(ListMapper $listMapper) {
		$listMapper->addIdentifier('lastname', null, ['label' => 'Nachname']);
		$listMapper->add('name', null, ['label' => 'Vorname']);
		$listMapper->add('altName', null, ['label' => 'Alt. Name']);
		$listMapper->add('position', null, [
			'associated_property' => 'shortName',
			'label' => 'Positionen',
		]);
		$listMapper->add('currentClub', null, [
			'associated_property' => 'name',
			'label' => 'Aktueller Verein']);
	}
}