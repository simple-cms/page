<?php namespace SimpleCms\Page;

use SimpleCms\Core\Models\BaseModel;

class Page extends BaseModel {

  protected $fillable = [
    'status',
    'slug',
    'meta_title',
    'meta_description',
    'title',
    'excerpt',
    'content'
  ];

}