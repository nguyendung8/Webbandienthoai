<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VpOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;

class OrderController extends Controller
{
    public function getOrder()
    {
        $wait_confirm = VpOrder::Where('order_status' , 'Waiting for confirmation')->orderBy('created_at', 'asc')->get();
        $confirmed = VpOrder::Where('order_status' , 'Confirmed')->orderBy('created_at', 'asc')->get();
        $transforming = VpOrder::Where('order_status' , 'In transit')->orderBy('created_at', 'asc')->get();
        $done = VpOrder::Where('order_status' , 'Completed')->orderBy('created_at', 'asc')->get();

        return view('backend.order', compact('wait_confirm', 'confirmed', 'transforming', 'done'));
    }
    public function getDeleteOrder($id)
    {
        $order = VpOrder::find($id);

        $order->delete();

        return redirect()->intended('admin/order')->with('success', 'Order deleted successfully!');
    }
    public function viewDetailOrder($id)
    {
        $order = VpOrder::find($id);
        return view('backend.orderdetail', compact('order'));
    }
    public function confirmOrder($id)
    {
        $order = VpOrder::find($id);
        $order->order_status = 'Confirmed';
        $email = $order->email;
        $name = $order->name;
        $data =[
            'Your order has been confirmed and we will deliver it to you soon'
        ];
        $order->save();
        Mail::send('backend.confirm_order',$data, function ($message) use ($email, $name) {
            $message->from('dungli1221@gmail.com', 'Mạnh Dũng');

            $message->to($email, $name);

            $message->subject('Your order has been confirmed at Anh Mobile');

        });
        return redirect()->intended('admin/order')->with('success', 'Order confirmed successfully!');
    }
    public function transportOrder($id)
    {
        $order = VpOrder::find($id);
        $order->order_status = 'In transit';
        $email = $order->email;
        $name = $order->name;
        $data =[
            'Your order is in transit'
        ];
        $order->save();
        Mail::send('backend.transport_order',$data, function ($message) use ($email, $name) {
            $message->from('dungli1221@gmail.com', 'Mạnh Dũng');

            $message->to($email, $name);

            $message->subject('Your order is being shipped from Anh Mobile');

        });
        return redirect()->intended('admin/order')->with('success', 'Order updated successfully!');
    }
}
