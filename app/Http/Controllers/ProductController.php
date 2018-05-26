<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    
    public function index()
    {
    	$products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));	
    }

    public function create()
    {
		return view('admin.products.create');
    }
    	
    public function store(Request $request)
    {
		//Validar los datos recibidos
		$messages = [
			'name.required' => 'El nombre del producto es necesario.',
			'name.min' => 'La cantidad minima para el nombre es de 3 caracteres.',			
			'description.required' => 'La descripcion del producto es necesario.',
			'description.min' => 'La cantidad minima para la descripcion es de 10 caracteres.',			
			'price.required' => 'El precio del producto es necesario.',
			'price.numeric' => 'El precio debe de ser numérico.',			
			'price.min' => 'El precio del producto no puede ser negativo.',			
		];

		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|min:10',
			'price' => 'required|numeric|min:0',
		];
		$this->validate($request, $rules, $messages);
    	//dd($request->all());

    	$product = new Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save();

		return redirect('/admin/products');

	}
	
    public function edit($id)
    {		
		$products = Product::find($id);		
		return view('admin.products.edit')->with(compact('products'));	
    }
    	
    public function update(Request $request, $id)
    {
		//Validar los datos recibidos
		$messages = [
			'name.required' => 'El nombre del producto es necesario.',
			'name.min' => 'La cantidad minima para el nombre es de 3 caracteres.',			
			'description.required' => 'La descripcion del producto es necesario.',
			'description.min' => 'La cantidad minima para la descripcion es de 10 caracteres.',			
			'price.required' => 'El precio del producto es necesario.',
			'price.numeric' => 'El precio debe de ser numérico.',			
			'price.min' => 'El precio del producto no puede ser negativo.',			
		];

		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|min:10',
			'price' => 'required|numeric|min:0',
		];
		$this->validate($request, $rules, $messages);

    	$product = Product::find($id);
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price = $request->input('price');
		$product->long_description = $request->input('long_description');
		$product->save();

		return redirect('/admin/products');
	}

	public function destroy($id)
    {    	
    	$product = Product::find($id);		
		$product->delete();

		return back();
	}
	
}
