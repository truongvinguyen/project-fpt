<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\imageProduct;


class imageProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_imageproduct($product_id,$product_name){
        $image_product=imageProduct::all();
        $product_id=$product_id;
        $product_name=$product_name;
        return view('admin.add_image_product',compact('product_id','product_name','image_product'));
    }
    public function select_image(Request $request){
      $product_id= $request->product_id;
      $product_image = imageProduct::where('product_id',$product_id)->get();
      $product_image_count = $product_image->count();
      $output = '<form>
                  '.csrf_field().'
                  <table class="data-table table nowrap">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên hình ảnh</th>
                            <th>Hình ảnh</th>
                            <th class="text-right">Tùy chọn</th>
                            
                        </tr>
                    </thead>
                    <tbody>';
      if($product_image_count>0){
        $i=0;
        foreach ($product_image as $key =>$item){
            $i++;
            $output.=' <tr>
                            <td>'.$i.'</td>
                            <td>'.$item->image_name.'</td>
                            <td class="table-plus">
                                <img src="/upload/product/'.$item->image.'" width="90px" height="90px" alt=""> 
                                
                            </td>
                            <td class="text-right">
                                <button type="button" data-toggle="modal" data-target="#confirmation-modal'.$item->id.'"   class="dropdown-item" ><i class="dw dw-delete-3"></i> Xóa</button>
                            </td>
                           
                        </tr>';
        } 
      }else{
        $output.=' <tr>
                        <td colspan="4">chưa có ảnh chi tiết</td>
                    </tr>';
      }
      echo $output;
    }
    public function insert_image_product(Request $request,$product_id){
                if($request->has('image')){
                    foreach($request->image as $img_product){
                     
                        
                        $file_name = $img_product->getClientOriginalName();
                        $img_product->move(base_path('public/upload/product'),$file_name);
                    
                    imageProduct::create([
                    
                            'image_name' => $request->product_name,
                            'image'=>$file_name,
                            'product_id'=>$request->product_id
                           
                                
                    ]);
                    }
                  return redirect()->back()->withSuccess('Thêm ảnh chi tiết thành công');
                }
    }
    public function delete_image(Request $request){
          $image_id = $request->image_id;
          $image = imageProduct::find($image_id);
          
          $image->delete();
    }
}