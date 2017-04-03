<?php

namespace FacebookBundle\Services;

use AppBundle\Lib\Constants;
use Facebook\Facebook;

/**
* FacebookServiceBase
*/
class FacebookServiceBase
{
	/**
	 * Facebook
	 * @param Facebook $fb
	 */
	public $fb;

	function __construct()
	{
		$this->fb = new Facebook([
		  'app_id' => Constants::FB_APP_ID,
		  'app_secret' => Constants::FB_APP_SECRET,
		  'default_graph_version' => 'v2.5',
		]);

		$this->fb->setDefaultAccessToken(Constants::FB_DEFAULT_TOKEN);
	}

	/**
	 * Execute Facebook request and return result
	 * 
	 * @param string $endpoint
	 * @return mixed
	 */
	public function request($endpoint)
	{
		try {

		  $response = $this->fb->get($endpoint);

		} catch(FacebookResponseException $e) {
			$f = fopen("graph_error.txt", "a");
			fwrite($f, 'Graph returned an error: ' . $e->getMessage() . PHP_EOL);
			fclose($f);
		} catch(FacebookSDKException $e) {
			$f = fopen("fb_sdk_error.txt", "a");
			fwrite($f, 'Facebook SDK returned an error: ' . $e->getMessage() . PHP_EOL);
			fclose($f);
		}

		return $response;
	}

}