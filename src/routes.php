<?php

Route::get('page/{slug}', ['as' => 'page.show', 'uses' =>'SimpleCms\Page\PublicController@show']);

Route::group(['prefix' => 'control'], function()
{
  Route::resource('page', 'SimpleCms\Page\AdminController');
});