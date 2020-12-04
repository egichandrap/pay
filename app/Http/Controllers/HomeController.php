<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topup;
use App\Models\Product;
use App\Models\Success;
use App\Models\Payment;
use Auth;
use DB;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }
    
    public function prepaired()
    {
        return view('prepaired');
    }

    public function postPrepaired(Request $request)
    {
        $mobileNumber = $request->input("mobileNumber");
        $value = $request->input("value");

        $validatedData = $request->validate([
            'mobileNumber' => 'required|numeric|digits_between:7,12|regex:/(081)/',
            'value' => 'required'
        ], [
            'mobileNumber.required' => "Mobile Number tidak boleh kosong", 
            'mobileNumber.numeric' => "Mobile Number harus diisi dengan angka", 
            'mobileNumber.digits_between' => "Mobile Number harus diantara 7 sampai 12 digits",
            'mobileNumber.regex' => "Mobile Number harus diawali dengan 081"
        ]);

        $data= Topup::create([
            'mobileNumber' =>  $request->mobileNumber,
            'value' =>  $request->value
        ]);
    
        return redirect()->to('product');
    }

    public function product()
    {
        $product=Topup::orderBy('id', 'DESC')->first();
      
        return view('product', compact('product'));
    }

    public function postOrder(Request $request)
    {
        $pr = $request->input("product");
        $shipping = $request->input("shipping");
        $price = $request->input("price");
        $value = $request->input("value");

        $validatedData = $request->validate([
            'product' => 'required|between:10,150',
            'shipping' => 'required|between:10,150',
            'price' => 'required'
        ], [
            'product.required' => "Product tidak boleh kosong", 
            'product.between' => "Keterangan Product harus setidaknya memiliki panjang 10 sampai 150 kata",
            'shipping.required' => "Product tidak boleh kosong",
            'shipping.between' => "Keterangan Address harus setidaknya memiliki panjang 10 sampai 150 kata",
            'price.required' => "Price tidak boleh kosong"
        ]);

        // $minute = date("i");

        // if ($minute > '1') {
        // $r=Success::where('orderNo',$request->orderNo)
        // ->update([
        //     'status' =>  3,
        //     'keterangan' => "Cancel"
        // ]);
        // }

        $data = Product::create([
            'product' =>  $request->product,
            'shipping' =>  $request->shipping,
            'price' => $request->price
        ]);

        $ids = $data->id;
        $id=$request->input("topup_id");
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999).mt_rand(1000000, 9999999).
        $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $orderno = $string;
        $percent = $value * 5 / 100;
        $topup_balance= $value + $percent;
        $total_produk = $value + 10000;
        $date = date('Y-m-d H:i:s');
        $datezone = date('Asia/Bangkok');

        $user_id = Auth::user()->id;

        Success::create([
            'topupBalance' =>  $topup_balance,
            'user_id' => $user_id,
            'topup_id' => $id,
            'product_id' => $ids,
            'orderNo' => $orderno,
            'productPage' =>  $total_produk,
            'date' => $date
        ]);

        return redirect()->to('success');
    }

    public function success()
    {
        $pr=Product::orderBy('id', 'DESC')->first();
        $sr=Success::orderBy('id', 'DESC')->first();
        return view('success', compact('sr','pr'));
    }

    public function paymentOrder(Request $request)
    {
        $id=$request->input('orderNo');
        $prd=Success::where('orderNo',  $id)->first();
        
        return view ('paymentOrder', ['prd' => $prd]);
    }

    public function orderUpdate(Request $request)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999).mt_rand(1000000, 9999999).
        $characters[rand(0, strlen($characters) - 1)];
        $string = str_shuffle($pin);
        $code = $string;
        $hour = date("H");

        if ($hour > '09' && $hour < '17') { 
        $r=Success::where('orderNo',$request->orderNo)
        ->update([
            'status' =>  4,
            'keterangan' => "Success Code". " " .$code
        ]);
        } elseif ($hour < '09' && $hour > '17') {
        $r=Success::where('orderNo',$request->orderNo)
        ->update([
            'status' =>  2,
            'keterangan' => "Failed"
        ]);
        } else {
        $r=Success::where('orderNo',$request->orderNo)
        ->update([
            'status' =>  1,
            'keterangan' => "Shipping Code". " " .$code
        ]);
        }

        return redirect()->to('historyOrder');

    }

    public function historyOrder(Request $request)
    {
        $keyword=$request->input('keyword');
        $history = DB::table('success_order')
        ->join('top-up','top-up.id','=','success_order.topup_id')
        ->join('product','product.id','=','success_order.product_id');

        if($keyword){
            $history->where('orderNo', 'like', $keyword.'%');
        }

        $history=$history->where('user_id', Auth::id())->paginate(10);

        return view('historyOrder', ['history' => $history]);
    }
   
}
