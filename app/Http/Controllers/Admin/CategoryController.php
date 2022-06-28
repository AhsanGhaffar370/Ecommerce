<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('parent')->OrderBy('id', 'DESC')->get();

        return view('admin.categories.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('parent')->whereNull('parent_id')->get();

        return view('admin.categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request) {
                $input = $request->only(['name', 'parent_id', 'status']);

                if($request->get('parent_id') == 0) 
                  $input['parent_id'] = null;

                $category = Category::create($input);
            });
            
        } catch(\Exception $e) {
            return redirect()->route('admin.categories.index')
                            ->with('error','Something went wrong');
        }
    
        return redirect()->route('admin.categories.index')
                        ->with('success','Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('parent')->findOrfail($id);
        $categories = Category::with('parent')->where('parent_id', 0)->get();

        return view('admin.categories.show', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::with('parent')->findOrfail($id);
        $categories = Category::with('parent')->where('parent_id', 0)->get();

        return view('admin.categories.edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'parent_id' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request, $id) {
                $input = $request->only(['name', 'parent_id', 'status']);

                $category = Category::find($id);
                $category->update($input);
            });
            
        } catch(\Exception $e) {
            return redirect()->route('admin.categories.index')
                            ->with('error','Something went wrong');
        }
    
        return redirect()->route('admin.categories.index')
                        ->with('success','Category has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd('dsf');
        $flag = false;
        $msg = '';
        try {
            // Find whether this record is linked in products table or not
            $product_category = ProductCategory::where('category_id', $id);
            
            if ($product_category->count()) {
                $flag = true;
                $msg = 'This category is linked in products!';
            }
            else {
                // Rollback if data not inserted properly
                DB::transaction(function () use ($id, &$flag, &$msg) {
                    $category = Category::with(['children'])->find($id);

                    // If record is not linked in product then delete otherwise show failure message
                    if ($category !== null && $category->count()) {

                        // If category have sub-categories then category can't delete
                        if (count($category->children) > 0) {
                            $flag = true;
                            $msg = 'You cannot delete this category due to already assigned another category!';
                        } else {
                            $category->delete();
                            $flag = true;
                            $msg = 'Record Deleted Successfully!';
                        }
                    }
                    else {
                        $flag = true;
                        $msg = 'This record is not exist!';
                    }
                });
            }
        } catch(\Exception $e) {
            return response()->json(['status' => false, 'msg' => 'Something went wrong!']);
        }
        
        return response()->json(['status' => !$flag, 'msg' => $flag ? $msg : '']);
    }
}
