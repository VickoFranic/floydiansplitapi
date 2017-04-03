<?php

namespace FacebookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Services\JMS;

class EventsController extends Controller
{
	/**
	 * Get last event for Floydians
	 * 
	 * @Route("/api/facebook/events/get_last")
	 * @Method("GET")
	 * @return JsonResponse
	 */
	public function getLastEventAction()
	{
		$facebookEventsService = $this->get('facebook.service.events');

		$lastEvent = $facebookEventsService->getLastEventForFloydians();
		$json = $lastEvent->asJson();

		$response = new JsonResponse();
		$response->setJson($json);
		return $response;
	}
	
	/**
	 * Get all events
	 * 
	 * @Route("/api/facebook/events")
	 * @Method("GET")
	 * @return JsonResponse
	 */
	public function getAllEventsAction()
	{
		$facebookEventsService = $this->get('facebook.service.events');
		$allEvents = $facebookEventsService->getAllEvents();

		$response = new JsonResponse();
		$response->setJson(json_encode($allEvents));
		return $response;
	}
}
