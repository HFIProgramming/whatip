<?php

/**
 * Created by PhpStorm.
 * User: NeverBehave
 * Date: 2017/8/27
 * Time: 下午10:01
 */
class split
{

	public $url;
	public $query;
	public $slash;
	public $parameter;
	public $scheme;

	public function __construct($url)
	{
		$this->url = $url;

		// Split the URL into its constituent parts.
		$parse = parse_url($url);

		// Dash !
		$this->query = $this->parseQuery($parse);
		$this->slash = $this->parseSlashes($parse);
		$this->parameter = array_merge($this->query != false ? $this->query : [], $this->slash != false ? $this->slash : []);
	}

	public function parseQuery($parser)
	{
		if (empty($parser['query'])) {
			return false;
		}

		parse_str($parser['query'], $query);

		return $query;
	}

	public function parseSlashes($parser)
	{
		if (empty($parser['path'])) {
			return false;
		}

		// Remove the leading forward slash, if there is one.
		$path = ltrim($parser['path'], '/');

		// Put each element into an array.
		$elements = explode('/', $path);

		// STOP if first parameter is empty

		if (empty($elements[0])) return false;

		// Create a new empty array.
		$args = [];

		// Loop through each pair of elements.
		for ($i = 0; $i < count($elements); $i = $i + 2) {
			if (!empty($elements[$i + 1])) $args[$elements[$i]] = $elements[$i + 1];
			else $args[$elements[$i]] = true;
		}

		return $args;
	}

	public function parseScheme($parser)
	{
		if (empty($parser['scheme'])) {
			return false;
		}

		return $parser['scheme'].'://';
	}
}