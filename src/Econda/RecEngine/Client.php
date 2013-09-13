<?php
/**
 * econda recommendations client library
 *
 * @copyright Copyright econda GmbH
 * @link http://www.econda.de
 * @package Econda/RecEngine
 * @license MIT License
 */
namespace Econda\RecEngine;

use Econda\RecEngine\Config\ConfigAwareTrait;
use Econda\RecEngine\Client\Request;
use Econda\RecEngine\Exception\InvalidArgumentException;
use Econda\RecEngine\Config\ConfigInterface;
use Econda\RecEngine\Config\ArrayConfig;

/**
 * Client to request recommendations from econda recommendation engine.
 */
class Client
{
	use \Econda\RecEngine\Config\ConfigAwareTrait;
	
	/**
	 * request object or null if not initialized
	 * 
	 * @var \Econda\RecEngine\Client\Request
	 */
	protected $request;
	
	/**
	 * Constructor, requires configuration
	 * @param mixed $config
	 */
	public function __construct($config = null)
	{
		if($config) {
			$this->setConfig($config);
		}
		
		$this->request = new Request();
	}
	
	/**
	 * Get request or null in not initialized
	 * 
	 * @return \Econda\RecEngine\Client\Request
	 */
	public function getRequest()
	{
		return $this->request;
	}
	
	/**
	 * Set request object.
	 * 
	 * @param Client\Request $request
	 * @return \Econda\RecEngine\Client
	 */
	public function setRequest(Client\Request $request)
	{
		$this->request = $request;
		return $this;
	}
}