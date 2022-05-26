<?php

namespace App\Http\Controllers;


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
Use \Carbon\Carbon;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function registration()
    {
        return view('registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_customer(Request $request,Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'genter' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        Customer::create($request->all());

       $password=$request->input('password');

       $customer=DB::table('customers')->where('password',$password)->first();

        return view('customer.dashboard',compact('customer'));
    }

    public function product_create()
    {
        return view('product.create');
    }

    public function product_store(Request $request)
    {
        $request->validate([
            'productname' => 'required',
            'productdetails' => 'required',
            'productprice' => 'required',
           
        ]);

        $product=new Product();

        $product->name=$request->input('productname');
        $product->details=$request->input('productdetails');
        $product->price=$request->input('productprice');

        $product->save();
        return redirect('admin_products')->with('stored',"Product Has Been Successfully Inserted");

    }

   


    //admin

    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }

    public function admin_products()
    {
        $products = Product::latest()->paginate(5);

        return view('admin.products',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function admin_employees()
    {
        $employees = Employee::latest()->paginate(5);

        return view('admin.employees',compact('employees'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function employees_create()
    {
        return view('employees.create');
    }

    public function show_product($id)
    {  
        $product=DB::table('products')->where('id',$id)->first();

        
        return view('product.show',compact('product'));

    }

    public function edit_product($id)
    {
        $product=DB::table('products')->where('id',$id)->first();

        return view('product.edit',compact('product'));

    }

    public function product_update(Request $request ,$id)
    {
      

        DB::table('products')->where('id',$id)->update([
            'name'=>$request->productname,
            "details"=>$request->productdetails,
            "price"=>$request->productprice,
           
            
        ]);
        return redirect('admin_products')
                        ->with('stored','Product updated successfully');
    }

    public function delete_product($id)
    {
        DB::table('products')->where('id',$id)->delete();

        return redirect()->route('admin_products')
        ->with('stored','Product Deleted successfully');
    }

   

    //customers
    public function customer_dashboard(Customer $customer,$id)
    {
        $customer=DB::table('customers')->where('id',$id)->first();

        return view('customer.dashboard',compact('customer'));
    }
    
    public function customers_orders(Product $products,$id)
    {        
        $products = Product::latest()->paginate(5);
        $customer=DB::table('customers')->where('id',$id)->first();

        return view('customer.orders',compact('products','customer'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function customers_myorders($id)
    {   

        $customer=Customer::where('id',$id)->first();
        
        $myorders=Order::where('customer',$customer->name)->latest()->paginate();

        return view('customer.myorders',compact('myorders','customer'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function deliveredorder($id)
    {
        $order=Order::where('id',$id)->first();

        if($order->status=='Not Yet')
        {
            DB::table('orders')->where('id',$id)->update([
                'status'=>'delivered'
            ]);
        }

        return back();
    }

    public function place_order(Employee $employees,$product,$customer)
    {
        $employees = Employee::latest()->paginate(5);

        $product=DB::table('products')->where('id',$product)->first();
        $customer=DB::table('customers')->where('id',$customer)->first();
        // $customer=DB::table('customers')->where('id',$customer)->first();

        return view('customer.placeorder',compact('employees','product','customer'));
    }

    public function confirm_order(Request $request,$product,$customer)
    {
        $product=DB::table('products')->where('id',$product)->first();

        $employee=$request->input('deliveryboy');
        $employee=DB::table('employees')->where('name',$employee)->first();
        $customer=DB::table('customers')->where('id',$customer)->first();

        $orders=new Order();

        $orders->employee=$request->input('deliveryboy');
        $orders->product=$product->name;
        $orders->details=$product->details;
        $orders->Price=$product->price;
        $orders->customer=$customer->name; //checnk this line

        $orders->customeraddress=$customer->address;
        $orders->customermobileno=$customer->mobile;    

        $orders->status=$request->get('status');

        $date = Carbon::now();

             
        $orders->date=$date->format('Y-m-d');

        $orders->save();

        // $request->validate([
        //     'employee' => 'required',
        //     'product' => 'required',
        //     'details' => 'required',
        //     'Price' => 'required',
        //     'customeraddress' => 'required',
        //     'customermobileno' => 'required',
        //     'date' => 'required',
        // ]);
    
        // Order::create($request->all());

       
       

        return view('customer.dashboard',compact('customer'));


    }

    public function logout(Request $request) 
    {
        Session::flush();
        Auth::logout();
       

        return redirect('home');
    }

    //Auth

    // public function customLogin(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
   
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('dashboard')
    //                     ->with('stored','Signed in');
    //     }
  
    //     return redirect("home")->with('stored','Login details are not valid');
    // }

  

    public function checklogin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|alphaNum|min:5',

        ]);

        $user_data=array(
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        );

        $customer = Customer::where('email', '=', $request->get('email'))->where('password','=',$request->get('password'))->first();
        $employee = Employee::where('email', '=', $request->get('email'))->where('password','=',$request->get('password'))->first();

        
        if(Auth::attempt($user_data))
        {
            return redirect('admin-dashboard')->with('stored',"successfully log in");
        }

        // if(Auth::check($user_data)){
        //     return view('admin_dashboard');
        // }
        else if($customer!=null)
        {     
            $customer=DB::table('customers')->where('email',$request->get('email'))->where('password',$request->get('password'))->first();
            
            return view('customer.dashboard',compact('customer'));
        } 
        else if($employee!=null)
        {
            $employee=DB::table('employees')->where('email',$request->get('email'))->where('password',$request->get('password'))->first();
            
            return view('employees.dashboard',compact('employee'));
        } 
        else
        {
            return back()->with('stored',"You are not allowed to access'");
        }
    }

    //employee

    public function employee_orders(Employee $employee,$id)
    {
        $employee=DB::table('employees')->where('id',$id)->first();

        // $myorders=DB::table('orders')->where('name',$employee->name)->all();

        
        $myorders=Order::where('employee','=',$employee->name)->get();


        return view('employees.myorders',compact('myorders','employee'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function employee_dashboard(Employee $employee,$id)
    {       
        $employee=DB::table('employees')->where('id',$id)->first();

        return view('employees.dashboard',compact('employee'));
    }

    public function cancelorder($id)
    {
        $order=Order::where('id',$id)->first();

        if($order->status=='Not Yet')
        {
            DB::table('orders')->where('id',$id)->update([
                'status'=>"cancelled",
            ]);

            
        }

        return back()->with('success',"Your Order is Canceled");

    }
    
}
