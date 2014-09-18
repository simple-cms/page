<?php

Route::get('{slug}', 'SimpleCms\Page\PagePublicController@show');

Route::group(['prefix' => 'control'], function()
{
  Route::resource('page', 'SimpleCms\Page\PageAdminController');
});