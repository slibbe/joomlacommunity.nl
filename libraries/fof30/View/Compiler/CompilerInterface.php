<?php
/**
 * @package     FOF
 * @copyright   2010-2016 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license     GNU GPL version 2 or later
 */

namespace FOF30\View\Compiler;

defined('_JEXEC') or die;

interface CompilerInterface
{
	/**
	 * Are the results of this compiler engine cacheable? If the engine makes use of the forcedParams it must return
	 * false.
	 *
	 * @return  mixed
	 */
	public function isCacheable();

	/**
	 * Compile a view template into PHP and HTML
	 *
	 * @param   array  $path         The absolute filesystem path of the view template
	 * @param   array  $forceParams  Any parameters to force (only for engines returning raw HTML)
	 *
	 * @return mixed
	 */
	public function compile($path, array $forceParams = array());
}