<?php

class AdminCategory_Controller extends Base_Controller {

	public function action_index()
	{
		$categories = Category::with('products')->order_by('name', 'asc')->get();

		$context = array(
			'categories' => $categories
		);
		return View::make('admin.category.index', $context);
	}

	public function action_new()
	{
		return View::make('admin.category.new');
	}

	public function action_create()
	{
		$newCategory = array(
			'name' => Input::get('name')
		);

		$category = new Category();

		if (!$category->validate($newCategory)) {

			//dd($category->validator);
			return Redirect::to_route('admin_new_category')
				->with_errors($category->validator)
				->with_input();
		}

		else {
			$category->fill($newCategory);
			$category->save();
		}

		return Redirect::to_route('admin_categories');
	}

	public function action_edit($categoryID)
	{
		$category = Category::find($categoryID);
		$context  = array('category' => $category);
		return View::make('admin.category.edit', $context);
	}

	public function action_editSave()
	{
		$category = Category::find(Input::get('category_id'));
		$category->name = Input::get('name');
		$category->save();
		return Redirect::to_route('admin_categories');
	}

	public function action_delete($categoryID)
	{
		$category = Category::find($categoryID);
		try {
			$category->delete();
			return Redirect::to_route('admin_categories');
		} catch (Exception $e) {
			$text = var_dump($e);
			return "ss";
		}	
	}

}