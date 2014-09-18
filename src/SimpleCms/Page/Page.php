<?php namespace SimpleCms\Page;

use SimpleCms\Core\Models\BaseModel;

class Page extends BaseModel {

  protected static $rules = [
    'id' => 'numeric',
    'status' => 'numeric|required',
    'slug' => 'alpha_dash|max:80',
    'meta_title' => 'max:70',
    'meta_description' => 'max:155',
    'title' => 'max:100|required',
    'excerpt' => '',
    'content' => 'required'
  ];

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