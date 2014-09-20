<?php namespace SimpleCms\Page;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'id' => 'numeric',
      'status' => 'numeric|required',
      'slug' => 'alpha_dash|max:80',
      'meta_title' => 'max:70',
      'meta_description' => 'max:155',
      'title' => 'max:100|required',
      'excerpt' => '',
      'content' => 'required'
    ];
  }

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

}
