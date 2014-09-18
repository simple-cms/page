<?php namespace SimpleCms\Page;

use Illuminate\Database\Eloquent\Model;
use SimpleCms\Page\RepositoryInterface;
use SimpleCms\Core\Repositories\AbstractEloquentRepository;

class EloquentPageRepository extends AbstractEloquentRepository implements PageRepositoryInterface {

  /**
   * @var Model
   */
  protected $model;

  /**
   * Construct
   *
   * @param Illuminate\Database\Eloquent\Model $model
   */
  public function __construct(Model $model)
  {
    $this->model = $model;
  }

}