<?php

Route::get('{slug}', ['as' => 'page.show', 'uses' =>'SimpleCms\Page\PublicController@show']);

Route::group(['prefix' => Config::get('core::adminURL')], function()
{
  Route::resource(Config::get('page::pageURL'), 'SimpleCms\Page\AdminController');
});