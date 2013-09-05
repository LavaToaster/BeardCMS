<?php namespace Lavoaster\BeardCMS\Page\Repositories;

interface PageRepositoryInterface
{
	/**
	 * Returns all pages
	 *
	 * @return \Lavoaster\BeardCMS\Page\Models\PageInterface[]
	 */
	public function all();

	/**
	 * Creates a page with the given input
	 *
	 * @return \Lavoaster\BeardCMS\Page\Models\PageInterface
	 */
	public function create();

	/**
	 * Finds a page by its ID
	 *
	 * @param int $id
	 * @return \Lavoaster\BeardCMS\Page\Models\PageInterface
	 */
	public function find($id);
}