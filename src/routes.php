<?php

Route::get('{slug}', ['as' => config('page.pageURL') .'.show', 'uses' =>'SimpleCms\Page\PublicController@show']);

Route::group(['prefix' => config('core.adminURL')], function()
{
  Route::resource(config('page.pageURL'), 'SimpleCms\Page\AdminController');
});