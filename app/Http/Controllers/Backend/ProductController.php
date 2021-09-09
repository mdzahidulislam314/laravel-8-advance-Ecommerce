<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InnerCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SubCategory;
use Intervention\Image\Facades\Image;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'products' => Product::all(),
        ];
        return view('admin.products.index',$data);
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
        $data =[
            'categories' => Category::where('is_active', true)->get(),
        ];
        return view('admin.products.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'category_id' => 'required',
//            'name_en' => 'required',
//            'qty' => 'required',
//            'selling_price' => 'required',
//        ],[
//            'category_id.required' => 'Category Name is required!',
//            'name_en.required' => 'Name field is required!',
//            'qty.required' => 'Quantity field is required!',
//            'selling_price.required' => 'Selling Price field is required!',
//        ]);

        $files = [];

        $data = new Product();
        $data->category_id = $request->category_id;
        $data->subcategory_id = $request->subcategory_id;
        $data->inner_category_id = $request->inner_category_id;
        $data->brand_id = $request->brand_id;
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->code = $request->code;
        $data->qty = $request->qty;
        $data->tag_en = $request->tag_en;
        $data->tag_bn = $request->tag_bn;
        $data->color_en = $request->color_en;
        $data->color_bn = $request->color_bn;
        $data->size_en = $request->size_en;
        $data->size_bn = $request->size_bn;
        $data->selling_price = $request->selling_price;
        $data->discount_price = $request->discount_price;
        $data->short_desc_en = $request->short_desc_en;
        $data->short_desc_bn = $request->short_desc_bn;
        $data->long_desc_en = $request->long_desc_en;
        $data->long_desc_bn = $request->long_desc_bn;
        $data->slug_en = Str::slug($request->name_en);
        $data->slug_bn = preg_replace('/\s+/u', '-', trim($request->name_bn));
        if ($request->has('hot_deal')){
            $data->hot_deal = true;
        }
        if ($request->has('featured')){
            $data->featured = true;
        }
        if ($request->has('spacial_offer')){
            $data->spacial_offer = true;
        }
        if ($request->has('spacial_deals')){
            $data->spacial_deals = true;
        }
        if ($request->has('is_active')){
            $data->is_active = true;
        }
        if ($request->file('thumb_image')){
            $file = $request->file('thumb_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin/products'),$filename);
            $data->thumb_image = $filename;
        }
//        if ($request->file('multi_images')) {
//            foreach ($request->file('multi_images') as $image) {
//                $file = $image;
//                $filename = date('YmdHi').$file->getClientOriginalName();
//                $file->move(public_path('uploads/admin/products'),$filename);
//                $files[] =  $filename;
//            }
//        }
//        $data->multi_images = json_encode($files);

        $data->save();

        if (Session::has('pro_alt_temp_img')) {
            $alt_img = Session::get('pro_alt_temp_img');
            foreach ($alt_img as $key => $img) {
                $oldPath = 'uploads/admin/products/alt-img/temp/' . $img;
                $nPath = 'uploads/admin/products/alt-img/' . $img;
                if (file_exists($oldPath)) {
                    copy($oldPath, $nPath);
                    unlink($oldPath);
                    Session::forget('pro_alt_temp_img');
                    $product_image = new ProductImage;
                    $product_image->product_id = $data->id;
                    $product_image->image = $img;
                    $product_image->save();
                }
            }
        }

        return redirect()->back()->with(['message' => 'Product Insert Successfully!']);
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
        $categories = Category::latest()->where('is_active', true)->get();
		$brands = Brand::latest()->where('is_active', true)->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$product = Product::findOrFail($id);
        $data =[
            'categories' => Category::where('is_active', true)->get(),
        ];
        return view('admin.products.create');
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
