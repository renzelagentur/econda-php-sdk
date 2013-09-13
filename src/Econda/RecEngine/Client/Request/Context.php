<?php
namespace Econda\RecEngine\Client\Request;

/**
 * Context for recommendations, e.g. current product(s), category(ies), recipient id, ...
 */
class Context
{
	/**
	 * Name of visitor id cookie
	 */
	const COOKIE_NAME_VISITOR_ID = 'emos_jcvid';
	
	/**
	 * Name of best product cookie
	 */
	const COOKIE_NAME_BEST_PRODUCTS = 'emos_best_products';
	
	/**
	 * Array of product Ids
	 * @var array
	 */
	protected $productIds;
	
	/**
	 * Array of produc ids from best product cookie
	 * @var array
	 */
	protected $bestProductsIds;
	
	/**
	 * Visitor id from cookie
	 * @var string
	 */
	protected $visitorId;
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->bestProductsIds = $this->getBestProductIds();
		$this->visitorId = $this->getVisitorId();
	}
	
	/**
	 * Read visitor id from cookie if available
	 * @return Ambigous <NULL, unknown>
	 */
	protected function getVisitorId()
	{
		$vid = null;
		if (!empty($_COOKIE[self::COOKIE_NAME_VISITOR_ID])) {
			$vid = $_COOKIE[self::COOKIE_NAME_VISITOR_ID];
		}
		return $vid;
	}
	
	/**
	 * Product ids from emos_best_products cookie or emty array if no cookie is available
	 * @return array:
	 */
	protected function getBestProductIds()
	{
		$autoContextResult = [];
		if (!empty($_COOKIE[self::COOKIE_NAME_BEST_PRODUCTS])) {
			$autoContextResult = explode(":", $_COOKIE[self::COOKIE_NAME_BEST_PRODUCTS]);
		}
		return $autoContextResult;
	}
}