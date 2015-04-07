<?php namespace SimpleCms\Page;

use SimpleCms\Core\BaseModel;

class Page extends BaseModel
{
  protected $table = 'page';

  protected $fillable = [
    'hidden',
    'parent_id',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

  public function parent()
  {
    return $this->belongsTo('SimpleCms\Page\Page', 'parent_id');
  }

  public function children()
  {
    return $this->hasMany('SimpleCms\Page\Page', 'parent_id');
  }

}