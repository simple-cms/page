<?php namespace SimpleCms\Page;

use Input;
use Config;
use Redirect;
use SimpleCms\Core\BaseController;

class AdminController extends BaseController {

  /**
   * Store our RepositoryInterface implementation.
   *
   * @var Simple\Page\RepositoryInterface
   */
  protected $page;

  /**
   * Set up the class
   *
   * @param Simple\Page\RepositoryInterface $page
   *
   * @return void
   */
  public function __construct(RepositoryInterface $page)
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
    return view('page::Admin/Index', [
      'pages' => $this->page->all(['parent'])
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('page::Admin/Form', [
      'pages' => $this->page->getSelectArray()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(CreateRequest $request)
  {
    $page = $this->page->store($request->all());

    return Redirect::route(config('core.adminURL') .'.'. config('page.pageURL') .'.index')->with([
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
    return view('page::Admin/Form', [
      'page' => $this->page->getById($id),
      'pages' => $this->page->getSelectArray()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @return Response
   */
  public function update(UpdateRequest $request)
  {
    $page = $this->page->update($request->route()->getParameter(config('page.pageURL')), $request->all());

    return Redirect::route(config('core.adminURL') .'.'. config('page.pageURL') .'.index')->with([
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
      return Redirect::route(config('core.adminURL') .'.'. config('page.pageURL') .'.index')->with([
        'flash-type' => 'success',
        'flash-message' => 'Page successfully deleted!'
      ]);
    }

    return Redirect::route(config('core.adminURL') .'.'. config('page.pageURL') .'.index')->with([
      'flash-type' => 'error',
      'flash-message' => 'Failed to delete page!'
    ]);
  }

}