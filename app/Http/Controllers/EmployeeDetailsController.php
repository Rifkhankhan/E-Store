<?php


namespace App\Http\Controllers;


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EmployeeDetailsController extends Controller
{
    public function index()
    {
        return view('employees.dashboard');
    }

  


}
