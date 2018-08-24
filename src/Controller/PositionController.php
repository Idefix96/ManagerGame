<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PositionController extends Controller {
	/**
	 * @Route("/position", name="position")
	 */
	public function index() {
		return $this->render('position/index.html.twig', [
			'controller_name' => 'PositionController',
		]);
	}

	/**
	 * @Route("/position/add", name="positionAdd")
	 */
	public function addPosition(Request $request) {
		return $this->render('position/add.html.twig', [
			'controller_name' => 'PositionController',
		]);
	}
}
