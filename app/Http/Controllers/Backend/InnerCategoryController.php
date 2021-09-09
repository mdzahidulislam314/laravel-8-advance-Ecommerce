<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InnerCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class InnerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'dataUrl' => route('innercategories.data'),
            'categories' => Category::where('is_active', true)->get(),
        ];
        return view('admin.categories.inner-categories',$data);
    }

    public function data(){

        $data = InnerCategory::with('category','subcategory')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function getByCategory(Request $request){

        if ($request->has('category_id')){
            return SubCategory::where('category_id', $request->category_id)->get(['id', 'name_en']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'subcategory_id' => 'required',
        ],[
            'name_en.required' => 'Inner Category Name is required!',
            'subcategory_id.required' => 'Please select Sub Category is required!',
        ]);

        $data = new InnerCategory();
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->order = $request->order;
        $data->slug_en = Str::slug($request->name_en);
        $data->slug_bn = preg_replace('/\s+/u', '-', trim($request->name_bn));
        if ($request->has('is_active')){
            $data->is_active = true;
        }
        if ($request->has('top')){
            $data->top = true;
        }
        if ($request->file('icon')){
            $file = $request->file('icon');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/inner_categories'),$filename);
            $data->icon = $filename;
        }
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Inner Category Created Successfully!!'
        ], 200);
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
        $request->validate([
            'name_en' => 'required',
            'subcategory_id' => 'required',
        ],[
            'name_en.required' => 'Inner Category Name is required!',
            'subcategory_id.required' => 'Please select Sub Category is required!',
        ]);

        $data = InnerCategory::find($id);
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->order = $request->order;
        $data->slug_en = Str::slug($request->name_en);
        $data->slug_bn = preg_replace('/\s+/u', '-', trim($request->name_bn));
        if ($request->has('is_active')){
            $data->is_active = true;
        }else{
            $data->is_active = false;
        }
        if ($request->has('top')){
            $data->top = true;
        }else{
            $data->top = false;
        }
        if ($request->file('icon')){
            $file = $request->file('icon');
            @unlink(public_path('uploads/admin/inner_categories/'.$data->icon));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/inner_categories'),$filename);
            $data->icon = $filename;
        }
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Inner Category Created Successfully!!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SubCategory::find($id);
        $data->delete();
        if (file_exists(public_path('uploads/admin/sub_categories/'.$data->icon))){
            @unlink(public_path('uploads/admin/sub_categories/'.$data->icon));
        }
        return response()->json([
            'success' => true,
            'message' => 'Category Delete Successfully!'
        ], 200);
    }
}
