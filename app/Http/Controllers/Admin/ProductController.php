<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productCategory')->get();

        return view('admin/products/list', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with(['children'])->where('parent_id', 0)->get();

        return view('admin/products/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        try {
            // Rollback if data not inserted properly
            DB::transaction(function () use ($request) {
                $input = $request->except(['image']);

                // Check if a image has been uploaded
                if ($request->has('image')) {
                    // Get image file
                    $image = $request->file('image');
                    // Make a image name based on user name and current timestamp
                    $name = Str::slug($request->input('name')).'_'.time();
                    // Define folder path
                    $folder = config('globals.CATEGORY_IMAGES_PATH');
                    // Upload image
                    $this->uploadOne($image, $folder, 'public', $name);
                    // Set category type image name in database
                    $input['image'] = $name . '.'  . $image->getClientOriginalExtension();
                }
                
                $category = Category::create($input);
            });
            
        } catch(\Exception $e) {
            return redirect()->route('epharmacy.medicine.categories.index')
                            ->with('error','Something went wrong');
        }
    
        return redirect()->route('epharmacy.medicine.categories.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
