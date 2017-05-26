<?php
/**
 * Obtain the Invalid urls.
 */
namespace Romolo\LetUs\Url;

class Scanner
{
	/**
	 * Urls to be validated
	 * @var array
	 */ 
	protected $urls;
	
	/**
	 * @var \GuzzleHttp\Client
	 */
	protected $httpClient;
	
	/**
	 * Create a Scanner instance
	 * 
	 * @param array $urls
	 * @return void
	 */
	public function  __construct(array $urls)
	{
		$this->urls = $urls;
		$this->httpClient = new \GuzzleHttp\Client();
	}
	
	/**
	 * Obtain the invalid urls
	 * 
	 * @return array
	 */
	public function getInvalidUrls()
	{
		$invalidUrls = [];
		foreach($this->urls as $url) {
			try {
				$statusCode = $this->getStatusCodeForUrl($url);
			} catch (\Exception $e) {
				$statusCode = 500;
			}
			
			if ($statusCode >= 400) {
				array_push($invalidUrls, ['url'=>$url, 'status'=>$statusCode]);
			}
		}

		return $invalidUrls;
	}
	
	/**
	 * Obtain the status of urls
	 *
	 * @param string $url
	 * @return string
	 */
	public function getStatusCodeForUrl($url)
	{
		$httpResponse = $this->httpClient->options($url);
		
		return $httpResponse->getStatusCode();
	}
}
