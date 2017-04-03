<?php 

namespace AppBundle\Services;

use JMS\Serializer\SerializerBuilder;

/**
* JMS Serializer
*/
class JMS
{
	private static $jms;
	
	private function __construct()
	{

	}

	/**
	 * Serialize given object with JMS
	 * @param  object $data
	 * @return string
	 */
	public static function serialize($data) 
	{
		$serializer = SerializerBuilder::create()->build();
		$jsonContent = $serializer->serialize($data, 'json');

		return $jsonContent;
	}
}