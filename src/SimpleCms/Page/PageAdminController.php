<?php namespace SimpleCms\Page;

use SimpleCms\Page\PageRepositoryInterface;
use SimpleCms\Core\Controllers\BaseController;
use View;
use Input;
use Redirect;

class PageAdminController extends BaseController {

  /**
   * Store our PageRepositoryInterface implementation.
   *
   * @var Simple\Page\PageRepositoryInterface
   */
  protected $page;

  /**
   * Set up the class
   *
   * @param Simple\Page\PageRepositoryInterface $page
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
   * Display the specified resource.
   *
   * @return Response
   */
  public function index()
  {
    return View::make('page::Admin/Index', [
      'pages' => $this->page->all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('page::Admin/Form');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreatePageRequest $request)
  {
    $page = $this->page->store($request->all());

    return Redirect::route('control.page.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully created '. $request->title .'!'
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @return Response
   */
  public function edit($id)
  {
    return View::make('page::Admin/Form', [
      'page' => $this->page->getById($id)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update(UpdatePageRequest $request)
  {
    $page = $this->page->update($request->route->parameter('page'), $request->all());

    return Redirect::route('control.page.index')->with([
      'flash-type' => 'success',
      'flash-message' => 'Successfully updated '. $request->title .'!'
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @return Response
   */
  public function destroy($id)
  {
    $page = $this->page->destroy($id);

    if ($page)
    {
      return Redirect::route('control.page.index')->with([
        'flash-type' => 'success',
        'flash-message' => 'Page successfully deleted!'
      ]);
    }

    return Redirect::route('control.page.index')->with([
      'flash-type' => 'error',
      'flash-message' => 'Failed to delete page!'
    ]);
  }

}