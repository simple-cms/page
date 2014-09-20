<?php namespace SimpleCms\Page;

use SimpleCms\Page\PageRepositoryInterface;
use SimpleCms\Core\Controllers\BaseController;
use View;

class PagePublicController extends BaseController {

  /**
   * Store our PageRepositoryInterface implementation.
   *
   * @var Simple\Page\PageRepositoryInterface
   */
  protected $page;

  /**
   * Set up the class
   *
   * @param Simple\Page\PageRepositoryInterface $posts
   *
   * @return void
   */
  public function __construct(PageRepositoryInterface $page)
  {
    // Call the parent constructor just in case
    parent::__construct();

    // Set up our Model Interface
    $this->page = $page;
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function show($slug)
  {
    return View::make('page::Public/Show', [
      'metaTitle' => 'slug page title',
      'metaDesciption' => 'slug page description',
      'page' => $this->page->getFirstBy('slug', $slug)
    ]);
  }

}