<?php 

namespace FacebookBundle\Services;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;

/**
* EventsService
*/
class EventsService extends FacebookServiceBase
{
	/**
	 * Read last event data for Floydian Split from Facebook API
	 * @return GraphNode | last event node
	 */
	public function getLastEventForFloydians()
	{
		$endpoint = 'floydiansplit/events?fields=name,start_time,place&limit=1';
		$response = $this->request($endpoint);

		// Success
		$event = $response->getGraphEdge()->map(function($data) {
			return $data;
		});

		return $event[0];
	}

	/**
	 * Get all events for Floydian
	 * 
	 * @return mixed
	 */
	public function getAllEvents()
	{
		$endpoint = 'floydiansplit/events';

		$response = $this->request($endpoint);		
		$edge = $response->getGraphEdge();

		$events = [];
		foreach($edge as $node) {
			$events[] = $node->asArray();
		}

		return $events;
	}
}