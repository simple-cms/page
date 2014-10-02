<?php namespace SimpleCms\Page;

use SimpleCms\Core\BaseModel;
use SimpleCms\Asset\ModelTrait;

class Page extends BaseModel {

  // Include our Asset Trait
  use ModelTrait;

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