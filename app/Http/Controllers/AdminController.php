<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Product;
use App\Models\Order;
use App\Models\Blog;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $date= date('Y-m');
        $newdate = date("Y-m", strtotime ( '-1 month' , strtotime ( $date ) )) ;
        return view('admin.dashboard', [
            'total_account' => $this->countAllUsers(),
            'total_product' => $this->countAllProducts(),
            'new_order' => $this->countNewOrder(),
            'total_blog' => $this->countAllBlogs(),
            'years' => $this->getAllYear(),
            'current_year' => date('Y'),
            'total_account_this_year' => $this->totalAccountData(date('Y')),
            'total_order_this_year' => $this->sumlSalesData($newdate, $date),
            'from' => $newdate,
            'to' => $date,
            'current_product_data' => $this->getCurrentProductData(),
            'sale_rate' => $this->getSaleRatesData(),
            'register_rate' => $this->getResigtertionRatesData(),
        ]);
    }

    //count new order
    public function countNewOrder()
    {
        $count = Order::where('status', 0)->count();
        return $count;
    }

    //count all products
    public function countAllProducts()
    {
        $count = Product::count();
        return $count;
    }

    //count all users
    public function countAllUsers()
    {
        $count = Account::count();
        return $count;
    }

    //count all blogs
    public function countAllBlogs()
    {
        $count = Blog::count();
        return $count;
    }

    //get all year
    public function getAllYear()
    {
        $year_array = array();
        $date = Account::orderBy('created_at', 'ASC')->pluck('created_at');
        $date = json_decode($date);
        if (!empty($date)) {
            foreach ($date as $unformatted_date) {
                $formatted_date = new \DateTime($unformatted_date);
                $year_no = $formatted_date->format('y');
                $year_name = $formatted_date->format('Y');
                $year_array[$year_no] = $year_name;
            }
        }
        return $year_array;
    }

    //get account by month
    public function getAccountByMonth($month, $year)
    {
        $monthly_account_count = Account::whereYear('created_at', $year)->whereMonth('created_at', $month)->count();
        return $monthly_account_count;
    }

    public function totalAccountData($year)
    {
        $total_account_data = Account::whereYear('created_at', $year)->count();
        return $total_account_data;
    }

    //get monthly account data
    public function getMonthlyAccountData($year)
    {
        $month_name_array = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        $month_nos = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];

        $monthly_account_count = array();

        foreach ($month_nos as $month_no) {
            array_push($monthly_account_count, $this->getAccountByMonth($month_no, $year));
        }
    
        $max_no = max($monthly_account_count);
        $max_no = round(($max_no + 10/2) / 10) * 10;

        $monthly_account_data = array(
            'months' => $month_name_array,
            'accounts' => $monthly_account_count,
            'max' => $max_no,
            'total_accounts' => $this->totalAccountData($year)
        );

        return $monthly_account_data;
    }

    public function sumlSalesData($from, $to){
        $from = new \DateTime($from);
        $year_from = $from->format('Y');
        $month_from = $from->format('m');

        $to = new \DateTime($to);
        $year_to = $to->format('Y');
        $month_to = $to->format('m');

        if ($year_from == $year_to) {
            $total_sales_data = Order::whereYear('created_at', $year_from)->whereMonth('created_at', '>=', $month_from)->whereMonth('created_at', '<=', $month_to)->sum('total');
        } else {
            $total_sales_data = Order::whereYear('created_at', $year_from)->whereMonth('created_at', '>=', $month_from)->sum('total');
            $total_sales_data += Order::whereYear('created_at', $year_to)->whereMonth('created_at', '<=', $month_to)->sum('total');
        }
        return $total_sales_data;
    }

    public function getMonthYearLabel($from, $to) {
        $selected = Order::orderBy('created_at', 'ASC')->whereBetween('created_at', array($from, $to))->select('created_at')->get();
        
        $label = array();

        foreach ($selected as $key) {
            $key = new \DateTime($key->created_at);
            $key = $key->format('Y-m');
            array_push($label, $key);
        }

        $unique = array_unique($label);
        return array_values($unique);
    }

    public function getMonthSaleData($month) {
        $month = new \DateTime($month);
        $year = $month->format('Y');
        $month = $month->format('m');
        return Order::whereYear('created_at', $year)->whereMonth('created_at', '=', $month)->sum('total');
    }

    public function getMonthlySaleData($from, $to) {
        $valueSaleData = array();

        $sumSalesData = $this->sumlSalesData($from, $to);

        $label = $this->getMonthYearLabel($from, $to);

        foreach ($label as $month) {
            $value = $this->getMonthSaleData($month);
            array_push($valueSaleData, $value);
        }
        
        $max = max($valueSaleData);
        $max = round(($max + 1000/2) / 1000) * 1000;

        $monthly_sales_data = array(
            'months' => $label,
            'sales' => $valueSaleData,
            'total' => $sumSalesData, 
            'max' => $max
        );

        return $monthly_sales_data;
    }

    public function getCurrentProductData() {
        $current_product_data = Product::orderBy('created_at', 'DESC')->take(5)->get();
        return $current_product_data;
    }

    public function getSaleRatesData() {
        $date= date('Y');
        $curr_month = date('m');
        $curr_year = date('Y');
        $newdate = date("Y-m", strtotime ( '-1 month' , strtotime ( $date ) )) ;
        $prev_month = date('m', strtotime($newdate));
        $curr_month_total = Order::select('total')->whereYear('created_at', $curr_year)->whereMonth('created_at', $curr_month)->sum('total');
        $prev_month_total = Order::select('total')->whereYear('created_at', $curr_year)->whereMonth('created_at', $prev_month)->sum('total');
        if ($prev_month_total != 0) return (($curr_month_total - $prev_month_total) / $prev_month_total)*100;
        else return 100;
    }

    public function getResigtertionRatesData() {
        $date= date('Y');
        $curr_month = date('m');
        $curr_year = date('Y');
        $newdate = date("Y-m", strtotime ( '-1 month' , strtotime ( $date ) )) ;
        $prev_month = date('m', strtotime($newdate));
        $curr_month_total = Account::select('id')->whereYear('created_at', $curr_year)->whereMonth('created_at', $curr_month)->count();
        $prev_month_total = Account::select('id')->whereYear('created_at', $curr_year)->whereMonth('created_at', $prev_month)->count();
        if ($prev_month_total != 0) return (($curr_month_total - $prev_month_total)/$prev_month_total*100);
        else return 100;
    }
}
