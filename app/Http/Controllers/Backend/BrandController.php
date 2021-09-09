<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
          'dataUrl' => route('brands.data'),
        ];
        return view('admin.brands.index',$data);
    }

    public function data(){

        $data = Brand::all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    /*AJAX request*/
    public function getBrands(Request $request)
    {
        $search = $request->search;
        if($search == ''){
            $brands = Brand::orderby('name_en','asc')->select('id','name_en')->get();
        }else{
            $brands = Brand::orderby('name_en','asc')->select('id','name_en')->where('name_en', 'like', '%' .$search . '%')->get();
        }

        $response = array();
        foreach($brands as $brand){
            $response[] = array(
                "id"=>$brand->id,
                "text"=>$brand->name_en
            );
        }

        echo json_encode($response);
        exit;
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
        ]);

        $b = new Brand();
        $b->name_bn = $request->name_bn;
        $b->name_en = $request->name_en;
        $b->slug_en = Str::slug($request->name_en);
        $b->slug_bn = preg_replace('/\s+/u', '-', trim($request->name_bn));
        if ($request->has('is_active')){
            $b->is_active = true;
        }
        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/brands'),$filename);
            $b->image = $filename;
        }
        $b->save();
        return response()->json([
            'success' => true,
            'message' => 'Brand Created Successfully!!'
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
        ]);

        $b = Brand::find($id);
        $b->name_bn = $request->name_bn;
        $b->name_en = $request->name_en;
        $b->slug_en = Str::slug($request->name_en);
        $b->slug_bn = preg_replace('/\s+/u', '-', trim($request->name_bn));
        if ($request->has('is_active')){
            $b->is_active = true;
        }
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('uploads/admin/brands/'.$b->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/brands'),$filename);
            $b->image = $filename;
        }
        $b->save();
        return response()->json([
            'success' => true,
            'message' => 'Brand Updated Successfully!'
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
        $b = Brand::find($id);
        $b->delete();
        if (file_exists(public_path('uploads/admin/brands/'.$b->image))){
            @unlink(public_path('uploads/admin/brands/'.$b->image));
        }
        return response()->json([
            'success' => true,
            'message' => 'Brand Delete Successfully!'
        ], 200);
    }
}
