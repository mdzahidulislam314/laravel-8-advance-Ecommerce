<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;

class ProductImgController extends Controller
{

    public function altTempPimgUp(Request $req)
    {
        for ($i = 0; $i < $req->TotalImages; $i++) {
            $file = $req->file('images' . $i);
            $name = 'alt_pro_' . time() . $i . '.webp';

            if (Session::has($req->ssn_id)) {
                $img = Session::get($req->ssn_id);
                array_push($img, $name);
                Session::put($req->ssn_id, $img);
            } else {
                $img[] = $name;
                Session::put($req->ssn_id, $img);
            }
            Image::make($file)->encode('webp', 50)->save('uploads/admin/products/alt-img/temp/' . $name);

        }

        $image = Session::get($req->ssn_id);
        $html = '';
        if ($req->pro_id) {
            $pro_images = ProductImage::where('product_id', $req->pro_id)->get();
            foreach ($pro_images as $value) {
                $html .= '<div class="pip">';
                $html .= '<img class="imageThumb" src="' . asset('uploads/admin/products/alt-img/' . $value->img) . '">';
                $html .= '<br/>';
                $html .= '<span class="remove-p" onclick="deleteAltImgById(event, ' . $value->id . ')">Remove</span>';
                $html .= '</div>';
            }
        }
        foreach ($image as $value) {
            $html .= '<span class="pip">';
            $html .= '<img class="imageThumb" src="' . asset('uploads/admin/products/alt-img/temp/' . $value) . '">';
            $html .= '<br/>';
            $html .= '<span class="remove" id="' . $value . '" onclick="deleteAltImg(event, \'' . $req->ssn_id . '\')">Remove</span>';
            $html .= '</span>';
        }
        return $html;
    }
    public function altTempPimgRemove(Request $req)
    {
        $all_img = Session::get($req->ssn_id);
        $image_name = $req->img_name;

        if (in_array($image_name, $all_img)) {
            $pos = array_search($image_name, $all_img);
            unset($all_img[$pos]);
            Session::put($req->ssn_id, array_values($all_img));
            $path = 'uploads/admin/products/alt-img/temp/' . $image_name;
            if (file_exists($path)) {
                unlink($path);
            }
            // print_r($all_img);
            return 'true';
        }
    }

    public function deleteAltImgById(Request $req)
    {
        $pro_img = ProductImage::find($req->id);
        $path = 'uploads/admin/products/alt-img/' . $pro_img->image;
        if (file_exists($path)) {
            unlink($path);
        }
        $pro_img->delete();
    }
}
