<?php namespace Lavoaster\BeardCMS\Page;

use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->registerModels();
		$this->registerRepositories();
	}

	protected function registerModels()
	{
		$this->app->bind(
			'Lavoaster\BeardCMS\Page\Models\PageInterface',
			'Lavoaster\BeardCMS\Page\Models\Page'
		);
	}

	protected function registerRepositories()
	{
		$this->app->bind(
			'Lavoaster\BeardCMS\Page\Repositories\PageRepositoryInterface',
			'Lavoaster\BeardCMS\Page\Repositories\EloquentPageRepository'
		);
	}
}