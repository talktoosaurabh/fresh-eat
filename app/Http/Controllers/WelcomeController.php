<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\NewsLetter;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductsImage;
use App\Models\Wishlist;
use App\Models\Size;
use App\Models\Color;
use Session;
use App\Models\Faq;
use Auth;
use DB;

class WelcomeController extends Controller
{
    public function subscribeNewsLetter(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required|string|email|max:30',
        ]);

        if (NewsLetter::where('email', '=', $request->email)->count() > 0)
        {
           return back()->with('flash_error', 'Already Subscribed');
        }
        else
        {
            $newsLetter = new NewsLetter;
        	$newsLetter->email = $request->email;
        	$newsLetter->save();
            return back()->with('flash_success_news', 'Thank You for subscribing NewsLetter');
        }
    }

    public function saveContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|string',
            'subject' => 'required|string',
            'message' => 'required|string',
            'phone' => 'required',
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->phone = $request->phone;
        $contact->save();
        return back()->with('flash_success_conact', 'Thank You We will get back to you');
    }

    public function all_products()
    {
    
        $get_category = Category::whereNull('parent_id')->orderBy('id','desc')->get();
        foreach ($get_category as $key => $sub_cat) {
            $products_cnt = Category::whereNotNull('parent_id')->where('parent_id',$sub_cat->id)->orderBy('id','desc')->get();
            $get_category[$key]->products_count = $products_cnt->count();
        }
        $type = 'products';
        $products = Product::with('product_image')->where('status','Active')->orderBy('id','desc')->paginate(12);
        $title = 'Products | Fresh Eat';
        $desc = 'Products | Fresh Eat';
        return view('listing.shop',compact('type','get_category','products','title','desc'));
    }

    public function welcome()
    {
        $title = "Home | FreshEat";
        $desc = "Home | FreshEat";
        $products = Product::where('status','Active')->orderBy('id','desc')->get();
        $banners = Banner::where('status','Active')->orderBy('id','ASC')->get();
        
        return view('welcome',compact('banners','products','title','desc'));
    }

    public function fetchProducts(Request $request)
    {
        if($request->get('query'))
        {
        $query = $request->get('query');
        $searchResults = DB::select("
            (
                SELECT
                    'product' as `type`,
                    `products`.`id` as `id`,
                    `products`.`name` as `name`,
                    `products`.`slug` as `slug`
                FROM `products`
                WHERE
                    `products`.`name` LIKE '%{$query}%'
            )
            ");
        $output = '<ul>';
        foreach($searchResults as $row)
        {
            $productImage = ProductsImage::where('products_id',$row->id)->where('is_featured',1)->first();
            $output .= '<li class="class_li">
                <a class="search_a" href="'.url('/').'/p/'.$row->slug.'">
                <img class="a_img" src="'.url('/').'/uploads/images/'.$productImage->image.'">'.$row->name.'</a></li>';
        }
          $output .= '</ul>';
          echo $output;
        }
    }

    public function wishlist(Request $request)
    {
        $title = "Wishlist | Fresh Eat";
        $desc = "Wishlist | Fresh Eat";
        if(!Auth::check()){
            $session_id = Session::getId();
            $wishlists = Wishlist::where('session_id',$session_id)->paginate(5);
        }else{
            $wishlists = Wishlist::where('user_id',Auth::id())->paginate(5);
        }
        return view('wishlist',compact('wishlists','title','desc'));
    }

    public function faq()
    {
        $title = "Faq | TerraKota";
        $description = "Faq | TerraKota";
        $faqs = Faq::all();
        return view('pages.faq',compact('faqs','title','description'));
    }

    public function category()
    {
        $categories = Category::whereNull('parent_id')->where('status','Active')->orderBy('id','ASC')->get();
        $title = "Faq | Terra Kotta";
        $desc = "Faq | Terra Kotta";
        return view('listing.category',compact('title','desc','categories'));
    }
    public function deleteWishList(Request $request,$id)
    {
        if(!Auth::check()){
            $session_id = Session::getId();
             $cart = Wishlist::where('session_id',$session_id)->where('id',$id)->first();
        }else{
             $cart = Wishlist::where('user_id',Auth::id())->where('id',$id)->first();
        }
      
       if ($cart) {
           $cart->delete();
           return back()->with('flash_success', 'Removed from Wishlist');
       }
       else{
            abort(404);
       }
    }
}
