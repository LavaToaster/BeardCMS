<?php namespace Lavoaster\BeardCMS\Page\Models;

interface PageInterface
{
	/**
	 * Returns the pages content
	 *
	 * @return string
	 */
	public function getContent();

	/**
	 * Returns the template name that should be used when displaying
	 * the page.
	 *
	 * @return string
	 */
	public function getTemplateName();

	/**
	 * Sets the page content
	 *
	 * @param $data
	 * @return void
	 */
	public function setContent($data);

	/**
	 * Saves the page
	 *
	 * @return bool
	 */
	public function save();
}