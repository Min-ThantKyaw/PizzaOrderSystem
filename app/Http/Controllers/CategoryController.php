<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //Category List Page
    public function list()
    {
        $categories = Category::when(request('searchCategory'), function ($qyery) {
            $qyery->where('name', 'like', '%' . request("searchCategory") . '%');
        })
            ->orderBy('id', 'desc')
            ->paginate(4);
        $categories->appends(request()->all());
        return view('Admin.Category.list', compact('categories'));
    }

    //Direct Category Create Page
    public function createPage()
    {
        return view('admin.Category.create');
    }

    //Create Category
    public function create(Request $request)
    {

        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route('category#listPage')->with('message', 'Created successfully');
    }

    //Delete Category
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return back()->with('deleteMessage', 'Deleted successfully');
    }


    //Edit Category
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return view('admin.Category.edit', compact('category'));
    }

    //Update Category
    public function update(Request $request)
    {

        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::where('id', $request->categoryId)->update($data);
        return redirect()->route('category#listPage');
    }

    //Category Creation Validation Check
    private function categoryValidationCheck($request)
    {
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,name,' . $request->categoryId
        ])->validate();
    }


    //Request Category Data Function
    private function requestCategoryData($request)
    {
        return [

            'name' => $request->categoryName,
        ];
    }
}
