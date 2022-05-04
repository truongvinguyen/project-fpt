<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add_product()
    {
        $category=category::all();
        return view('admin.add_product' ,compact('category'));
    }
    public function save_product(Request $request){
        $validate= $request->validate([
            'product_name'=>['required','min:5'],
            'product_price_save'=>['integer'],
            'product_price'=>['required','integer'],
            'category_id'=>['required'],
            'product_status'=>['required'],
            'product_image'=>['required'],
            'product_tag'=>['required'],
            
        ],[
           'product_name.required'=>'nào!!! tên sản phẩm không được bỏ trống', 
           'product_name.min'=>'Tên sản phẩm ít nhất 6 ký tự',   
           'product_price_sale.integer'=>'Giá sản phẩm phải là chữ số',
           'product_price.required'=>'Giá bán sản phẩm không được bỏ trống',
           'product_price.integer'=>'Giá bán sản phẩm phải là chữ số',
           'category_id.required'=>'Vui lòng chọn loại sản phẩm',
           'product_status.required'=>'Vui lòng chọn trạng thái sản phẩm',
           'product_image.required'=>'Vui lòng chọn hình ảnh',
           'product_tag.required'=>'vui lòng nhập TAG sản phẩm để seo dễ dàng hơn',         
        ]);
        if($validate){
            if($request->has('product_image')){
                $img_product = $request->product_image;
                $file_name = $img_product->getClientOriginalName();
                $img_product->move(base_path('public/upload/product'),$file_name);
            }
             product::create([
                     'product_name' => $request->product_name,
                     'product_price_sale'=> $request->product_price_sale,
                     'product_price'=>$request->product_price,
                     'category_id'=>$request->category_id,
                     'product_content'=>$request->product_content,
                     'product_status'=>$request->product_status,
                     'product_image'=>$file_name,
                     'product_tag'=>$request->product_tag,
                     'product_user'=>$request->product_user,
                     'created_at'=>now(),
                     'updated_at'=>now()            
             ]);
             return redirect('/product')->withSuccess('Thêm sản phẩm thành công');
        }
    }
    public function index(){
        $product=DB::table('product')
        ->join('category','product.category_id','=','category.id')
        ->select('product.*','category.category_name')
        ->orderBy('product.id','desc')
        ->get();
        return view('admin.product_all',compact('product'));
    }
}
