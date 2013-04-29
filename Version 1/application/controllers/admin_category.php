<?php

class Admin_Category_Controller extends Base_Controller {

	public function action_index()
	{
		$categories = Category::get();
		$category_products = Category::find(2)->products;
		$context = array(
			'categories' => $categories,
			'category_products' => $category_products
		);
		return View::make('admin.category.index', $context);
	}

	public function action_new()
	{
		return View::make('admin.category.new');
	}

	public function action_create()
	{
		$new_category = array(
			'name' => Input::get('name')
		);

		$category = new Category($new_category);
		$category->save();

		return Redirect::to_route('admin_categories');
	}

	public function action_edit($category_id)
	{
		$category = Category::find($category_id);
		$context = array('category' => $category);
		return View::make('admin.category.edit', $context);
	}

	public function action_edit_save()
	{
		$category = Category::find(Input::get('category_id'));
		$category->name = Input::get('name');
		$category->save();
		return Redirect::to_route('admin_categories');
	}

}