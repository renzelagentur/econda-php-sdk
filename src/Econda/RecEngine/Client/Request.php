<?php
namespace Econda\RecEngine\Client;

use Econda\RecEngine\Exception\InvalidArgumentException;
use Econda\RecEngine\Client\Request\Context;

class Request
{
	/**
	 * 
	 * @var Context
	 */
	protected $context;
	
	protected $widgetId;
	
	/**
	 * Number of elements to retrieve
	 * @var int
	 */
	protected $chunkSize;
	
	/**
	 * First product element to retrieve
	 * @var int
	 */
	protected $startIndex = 0;
	
	/**
	 * True to get widget details in crosssell response
	 * @var bool
	 */
	protected $widgetDetails = true;
	
	public function __construct()
	{
		$this->context = [];
	}
	
	/**
	 * Context to get recommendations for
	 * @param Context $context
	 */
	public function setContext(Context $context)
	{
		$this->context = $context;
		return $this;
	}
	
	/**
	 * Get current context
	 * @return Context
	 */
	public function getContext()
	{
		return $this->context;
	}
	
	public function getWidgetId()
	{
		return $this->widgetId;
	}
	
	public function setWidgetId($widgetId)
	{
		if(!is_numeric($widgetId)) {
			throw new InvalidArgumentException('Value is not an integer');
		}
		$this->widgetId = (int) $widgetId;
		return $this;
	}
	
	/**
	 * Get first requested element index
	 * @return number
	 */
	public function getStartIndex()
	{
		return $this->startIndex;
	}
	
	/**
	 * Set first element. Used for server side paging
	 * @param int $index
	 * @throws InvalidArgumentException
	 * @return \Econda\RecEngine\Client\Request
	 */
	public function setStartIndex($index)
	{
		if(!is_numeric($index)) {
			throw new InvalidArgumentException('Value is not an integer.');
		}
		$this->startIndex = (int) $index;
		return $this;
	}
	
	/**
	 * Get max number of recommendations
	 * @return number
	 */
	public function getChunkSize()
	{
		return $this->chunkSize;
	}
	
	/**
	 * Set max number of recommendations to return
	 * @param number $chunkSize
	 * @throws InvalidArgumentException
	 * @return \Econda\RecEngine\Client\Request
	 */
	public function setChunkSize($chunkSize)
	{
		if(!is_numeric($chunkSize)) {
			throw new InvalidArgumentException("Value is not an integer.");
		}
		$this->chunkSize = (int) $chunkSize;
		return $this;
	}
}