<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InnerCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'dataUrl' => route('subcategories.data'),
            'categories' => Category::where('is_active', true)->get(),
        ];
        return view('admin.categories.sub-categories',$data);
    }

    public function data(){

        $data = SubCategory::with('category')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = InnerCategory::where('subcategory_id',$subcategory_id)->orderBy('name_en','ASC')->get();
        return json_encode($subsubcat);
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
        ],[
            'name_en.required' => 'Sub Category Name is required!',
        ]);

        $data = new SubCategory();
        $data->name_bn = $request->name_bn;
        $data->category_id = $request->category_id;
        $data->name_en = $request->name_en;
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
            $file->move(public_path('uploads/admin/sub_categories'),$filename);
            $data->icon = $filename;
        }
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Sub Category Created Successfully!!'
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
        ],[
            'name_en.required' => 'Sub Category Name is required!',
        ]);

        $data = SubCategory::find($id);
        $data->name_bn = $request->name_bn;
        $data->category_id = $request->category_id;
        $data->name_en = $request->name_en;
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
            @unlink(public_path('uploads/admin/sub_categories/'.$data->icon));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/sub_categories'),$filename);
            $data->icon = $filename;
        }
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Sub Category Updated Successfully!!'
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
