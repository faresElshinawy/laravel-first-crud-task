<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Validator;
use function abort;
use function redirect;
use function view;
use function url;

class ProductController extends Controller
{
    // show all products
    public function index()
    {
        $products = DB::select("SELECT products.id , products.name as name , price , count , description , categories.name as category  FROM products INNER JOIN categories ON categories.id = products.category_id");
        return view('products.index',compact('products'));
    }
        // add new product
        public function create()
        {
            $categories = DB::table('categories')->get();
            return view('products.create',compact('categories'));
        }

        // store new product
        public function store(Request $request) : RedirectResponse
        {
            $validate = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'price' => 'required|integer',
                'count' => 'required|integer',
                'category_id' => 'required|integer'
            ]);

            if(!$validate)
            {
                return redirect('products/create');
            }
            else
            {
                DB::table('products')->insert([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'count' => $request->count,
                    'category_id' => $request->category_id
                ]);
            }

            return redirect('products');
        }

        // edit category form
        public function edit($id)
        {
            $product = DB::table('products')->where('id','=',$id)->first();
            $categories = DB::table('categories')->get();
            return view('products.edit',compact('product','categories'));
        }

        // category update
        public function update(Request $request,$id)
        {

            $product = DB::table('products')->find($id);

            $validate = $request->validate([
                'name' => 'required|max:255',
                'description' => 'required|max:255',
                'price' => 'required|integer',
                'count' => 'required|integer',
                'category_id' => 'required|integer'
            ]);

            if(!$validate)
            {
                return redirect('products/edit');
            }
            elseif(!$product)
            {
                    return abort('404');
            }
            else
            {
                DB::table('products')->where('id','=',$id)->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'price' => $request->price,
                    'count' => $request->count,
                    'category_id' => $request->category_id
                ]);
            }

            return redirect('products');
        }

        // delete category
        public function destroy($id)
        {
            $category = DB::table('products')->find($id);
            if(!$category)
            {
                return abort('404');
            }
            else
            {
                DB::table('products')->where('id',$id)->delete();
                return redirect('products');
            }
        }
}
