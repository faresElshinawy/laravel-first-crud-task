<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function abort;
use function redirect;
use function view;
use function url;

class CategoryController extends Controller
{
    // show all categories
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('categories.index',compact('categories'));
    }

    // add new category
    public function create()
    {
        return view('categories.create');
    }

    // add new category
    public function store(Request $request) : RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|max:255'
        ]);

        if(!$validate)
        {
            return redirect('categories/create');
        }
        else
        {
            DB::table('categories')->insert([
                'name' => $request->name
            ]);
        }

        return redirect('categories');
    }

    // edit category form
    public function edit($id)
    {
        $category = DB::table('categories')->where('id','=',$id)->first();
        return view('categories.edit',compact('category'));
    }

    // category update
    public function update(Request $request,$id)
    {

        $category = DB::table('categories')->find($id);

        $validate = $request->validate([
            'name' => 'required|max:255'
        ]);

        if(!$validate)
        {
            return redirect('categories/edit');
        }
        elseif(!$category)
        {
                return abort('404');
        }
        else
        {
            DB::table('categories')->where('id','=',$id)->update([
                'name' => $request->name
            ]);
        }

        return redirect('categories');
    }

    // delete category
    public function destroy($id)
    {
        $category = DB::table('categories')->find($id);
        if(!$category)
        {
            return abort('404');
        }
        else
        {
            DB::table('categories')->where('id',$id)->delete();
            return redirect('categories');
        }
    }
}
