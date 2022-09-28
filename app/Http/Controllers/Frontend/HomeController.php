<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Page;

class HomeController extends Controller
{
    public function index() {
        $catsShowHome=Category::where('status', 10)->get();
        return view('frontend.home.index', ['catsShowHome'=>$catsShowHome]);
    }

    public function allProductsByCat($slug){
        $cat = Category::where('slug',$slug)->first();
        $products= Product::where('catId', $cat->id)->where('status','>', 0)->paginate(12);
        return view('frontend.home.allproductsbycat',['products'=>$products, 'cat'=>$cat]);
    }

    public function allProductsByBrand($slug){
        $brand = Brand::where('slug',$slug)->first();
        $products= Product::where('brandId', $brand->id)->where('status','>', 0)->paginate(12);
        return view('frontend.home.allproductsbybrand',['products'=>$products, 'brand'=>$brand]);
    }

    public function productDetail($slug){
        $product= Product::where('slug', $slug)->where('status','>', 0)->first();
        return view('frontend.home.productdetail',['product'=>$product]);
    }

    public function productAll(){
        $products = Product::where('status','>',0)->get();
        return view('frontend.home.product', ['products'=>$products]);
    }


    public function contact(){
        if(Auth::guard('customer')->check()){
            $customer = Auth::guard('customer')->user();
            return view('frontend.home.contact', ['customer' => $customer]);
        }
        else{
            return view('frontend.home.contact');
        }
    }

    public function pageDetail($slug){
        $page=  Page::where('slug',$slug)->where('status','>', 0)->first();
        return view('frontend.home.pageDetail',['page'=>$page]);
    }

    public function menCollection(){
        $products = Product::where('catId', '>', 8)->where('catId', '<', 11)->where('status','>', 0)->get();
        return view('frontend.home.sale')->with('products',$products);
    }



    public function doContact(Request $request){
        $email = $request->email;
        $title = $request->subject;
        $content = $request->message;
        DB::insert('insert into hongocquynhcontacts (email, title, content, status) values (?, ?, ?, ?)', [$email, $title, $content, 1]);
        return redirect()->back();
    }

    public function searchProduct(Request $request){
        if($request->ajax()){
            $output= '';
            $products = DB::table('hongocquynhproducts')->where('productName', 'LIKE','%' . $request->search . '%')->get();
            if($products){
                foreach($products as $product){
                    $output .= '<div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="single-product">
                        <div class="product-img">
                            <a href="/HoNgocQuynh/public/detail/'. $product->slug .'">'
                            .'<img class="default-img" src="/HoNgocQuynh/public/template/frontend/images/'.$product->image.'" alt="#">
						    <img class="hover-img" src="/HoNgocQuynh/public/template/frontend/images/'.$product->image.'" alt="#">'
                            .'</a>'
                            .'<div class="button-head">
                            <div class="product-action">
                                <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                            </div>
                            <div class="product-action-2">
                                <a title="Add to cart" href="/HoNgocQuynh/public/cartAdd/'.$product->slug.'">Add to cart</a>
                            </div>
                        </div></div>'
                        .'<div class="product-content">
                        <h3><a href="/HoNgocQuynh/public/detail/'.$product->slug.'">'.$product->productName.'</a></h3>
                        <div class="product-price">
                            <span>'.$product->price.'</span>
                        </div>
                    </div>
                    </div>
                    </div>';
                }
            }
            return Response($output);
        }
    }

}
