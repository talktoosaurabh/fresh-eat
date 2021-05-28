<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use Auth;
use Validator;
use App\Models\ProductsImage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userLogin(Request $request)
    {
        $rules = [
            'email'    => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required'    => __('Email is required field'),
            'email.email'       => __('Email invalidate'),
            'password.required' => __('Password is required field'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['error'    => true,
                                     'messages' => $validator->errors()
            ], 200);
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email'    => $email,
                               'password' => $password
            ], $request->has('remember'))) {

                    return response()->json([
                        'error'    => false,
                        'redirect' => url('/')
                    ], 200);

            } else {
                $errors = ['message_error' => __('Username or password incorrect')];
                return response()->json([
                    'error'    => true,
                    'messages' => $errors,
                    'redirect' => false
                ], 200);
            }
        }
    }

    public function userRegister(Request $request)
    {

        $rules = [

            'email'      => [

                'required',

                'string',

                'email',

                'max:255',

                'unique:users'

            ],

            'name'   => [

                'required',

                'string'

            ],

            'password'   => [

                'required',

                'string'

            ],

            'policy'       => ['required'],

        ];

        $messages = [
            'name.required'      => __('Name is required field'),

            'email.email'         => __('Email invalidate'),

            'password.required'   => __('Password is required field'),

            'policy.required'       => __('Accept privacy & policy is required'),

        ];


        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {

            return response()->json(['error'   => true,

                                     'messages' => $validator->errors()

            ], 200);

        } else {

            $user = \App\User::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
                'role_id'=>2,
            ]);

            if($user){
                Auth::attempt(['email'    => $request->input('email'),
                               'password' => $request->input('password')]);
                return response()->json([

                    'error'    => false,

                    'messages'  => false,

                    'redirect' => url('/')

                ], 200);
            }

        }

    }

    public function fetch_categories($cat_id){
        $nav_category = Category::where('slug',$cat_id)->first();
        $get_category = Category::whereNotNull('parent_id')->where('parent_id',$nav_category->id)->orderBy('id','desc')->get();

        $type = 'cat';
        foreach ($get_category as $key => $sub_cat) {
            $products_cnt = Product::where('subcategory_id',$sub_cat->id)->get();
            $get_category[$key]->products_count = $products_cnt->count();
        }
        $title = $nav_category->name.' | Fresh Eat';
        $desc = $nav_category->name.' | Fresh Eat';
        $products = Product::with('product_image')->where('category_id',$nav_category->id)->where('status','Active')->orderBy('id','desc')->paginate(12);
        return view('listing.shop',compact('type','nav_category','get_category','products','title','desc'));

    }

    public function fetch_sub_categories($cat_id){
        $sub_category = Category::where('slug',$cat_id)->first();
        $nav_category = Category::where('id',$sub_category->parent_id)->first();

        $get_category = Category::whereNotNull('parent_id')->where('parent_id',$sub_category->parent_id)->orderBy('id','desc')->get();
        if(!empty($sub_category)){
            $type = 'subcat';
        }else{
            $type = '';
        }

        foreach ($get_category as $key => $sub_cat) {
            $products_cnt = Product::where('subcategory_id',$sub_cat->id)->get();
            $get_category[$key]->products_count = $products_cnt->count();
        }
        $title = $sub_category->name.' | Fresh Eat';
        $desc = $sub_category->name.' | Fresh Eat';
        $products = Product::with('product_image')->where('subcategory_id',$sub_category->id)->where('status','Active')->orderBy('id','desc')->paginate(12);

        return view('listing.shop',compact('type','sub_category','nav_category','get_category','products','title','desc'));
    }

    public function productDetail(Request $request,$slug)
    {

        $product = Product::where('slug',$slug)->where('status','Active')->first();
        $title = $product->name.'| Fresh Eat';
        $desc = $product->name.'| Fresh Eat';
        if ($product) {
            $productImages = ProductsImage::where('products_id',$product->id)->get();
            $title = $product->name.' | Fresh Eat';
            $desc = $product->name.' | Fresh Eat';
            return view('listing.product-details',compact('product','productImages','title','desc'));
        }
        else{
            abort(404);
        }

    }


}
