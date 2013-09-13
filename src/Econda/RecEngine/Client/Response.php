<?php
/**
 * econda recommendations client library
 *
 * @copyright Copyright econda GmbH
 * @link http://www.econda.de
 * @package Econda/RecEngine
 * @license MIT License
 */
namespace Econda\RecEngine\Client;

use Econda\RecEngine\Widget\Model\ModelInterface;

class Response implements ModelInterface
{
	protected $httpResponse;
	
	protected $title;
	
	public function getHttpResponse()
	{
		return $this->httpResponse;
	}
}