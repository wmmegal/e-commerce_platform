<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller {
	public function __invoke() {
		return view( 'home', [
			'categories' => Category::tree()->get()->toTree()
		] );
	}
}
