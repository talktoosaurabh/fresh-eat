<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderList;
use Mail;
use App\Mail\OrderMail;

class OrderController extends Controller
{
    public function orders(Request $request)
    {
    	$orders = Order::where('status','!=','draft')->orderBy('id','desc')->paginate(20);
    	return view('admin.orders.index',compact('orders'));
    }

    public function changeOrderStatus(Request $request)
    {

        $order = Order::where('order_id',$request->order_id)->first();
        if ($order) {
            $order->status = $request->order_status;
            if ($request->order_status == "delivered") {
              $order->delivered_date = \Carbon\Carbon::now();
            }
            if($request->order_status == "cancelled"){
                $order->cancelled_by = 'admin';   
            }
            $order->save();
            //sms call
            if ($request->order_status == "delivered" 
                || $request->order_status == "cancelled") {
                try {
                    $data = ['order_id' => $order->id,'cancel' => 'admin'];
                    Mail::to($order->email)->send(new OrderMail($data));
                    Mail::to(env('ADMIN_EMAIL'))->send(new OrderMail($data));
                } catch (Exception $e) {
                }
            }
            return back()->with('flash_success', 'Status updated successfully');
        }
    }

    public function orderDetail(Request $request)
    {
        $order = Order::where('order_id',$request->order_id)->first();
        if ($order) {
            $orderitems = OrderList::where('order_id',$order->id)->get();
            return view('admin.orders.order-details',compact('order','orderitems'));
        }
    }
	public function get_order_types($types){
       $orders = Order::where('status',$types)->orderBy('id','desc')->paginate(20);
        return view('admin.orders.index',compact('orders'));
    }
}
