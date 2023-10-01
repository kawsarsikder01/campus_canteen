<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Categorie;
use App\Models\Order;
use App\Models\OrderedProduct;
use App\Repository\TableRepository;
use App\Repository\ReservationRepository;
use App\Enums\TableStatus;
use App\Http\Requests\ReservationStoreRequest;

class HomeController extends Controller
{
    public function __construct(ReservationRepository $reservation,TableRepository $table)
    {
        $this->reservation = $reservation;
        $this->table = $table;
    }
    public function index()
    {
        $specials = Categorie::where('name','Fast Food')->first();
        $sliders = Slider::All();
        $categories = Categorie::All();
        return view('welcome',compact('specials','sliders'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                'name' => $product->name,
                'image' => $product->image,
                'sell_price' => $product->sell_price,
                'quantity' => 1

            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success' , 'Product add to cart sucessfully');
    }
    public function remove(Request $request)
    {
        if($request->id){
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    public function checkout()
    {
        return view('payment');
    }

    public function address()
    {
        return view('address');
    }
     public function confirm(Request $request)
     {
        $total = 0;
              foreach ((array) session('cart') as $id => $details) {
                $total += $details['sell_price']* $details['quantity'];
              }
       $order = Order::create([
        'name' => $request->name,
        'email'=> $request->email,
        'phone'=> $request->phone,
        'address'=> $request->address,
        'transaction_id'=> uniqid(),
        'amount' => $total
       ]);

       foreach((array) session('cart') as $item){
        OrderedProduct::create([
                'order_id' => $order->id,
                'product_name' => $item['name'],
                'price' => $item['sell_price']*$item['quantity'],
        ]);
       }
       $orderId = $order->id;
       session_unset();
    //    session_destroy();
      return view('thankyou',compact('orderId'));
       
     }
     public function categories()
     {
        $categories = Categorie::All();
        return view('category',compact('categories'));
     }

     public function products($id)
     {
        $category =  Categorie::findOrFail($id);
        return view('products',compact('category'));
     }

     public function menu()
     {
        return view('menu');
     }
     public function reservation()
     {
        $tables = $this->reservation->find('status',TableStatus::Avalaiable);
        return view('reservation',compact('tables'));
     }
     public function store(ReservationStoreRequest $request)
     {
        $table = $this->table->show($request->table_id);
        if($table->guest_number < $request->guest_number){
            return back()->with('warning','Please chose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach($table->reservation as $res){
            $res_date = Carbon::parse($res->res_date);
            if($res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning','This table is reserved for this date.');
            }
        }
        $this->reservation->create($request->validated());
        return redirect(route('reservation'))->with('success','Successfully your reservation is complete');
     }

     public function about()
     {
        return view('about');
     }
     public function loginpage()
     {
        return view('login');
     }
}
