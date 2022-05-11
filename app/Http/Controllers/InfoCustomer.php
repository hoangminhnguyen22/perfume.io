<?php

namespace App\Http\Controllers;

use App\Models\Account;             //1
use Auth;                           //2
use Illuminate\Http\Request;

class InfoCustomer extends Controller
{
    public function index()
    {
//        $customer = Account::find(Auth::user()->id);
//        $customer = Auth::id();
//        dd($customer->id);
        return view('info-customer');
    }

    public function update(Request $request)
    {
        $customer = Account::find(Auth::user()->id); // account và auth
        $request -> validate([
            'name' => 'required',
            'email' => 'required|unique:accounts, email',               // unique là duy nhất ở cột email chứ không phải ở bảng account
            'phone' => 'required|unique:accounts, phone',               // này cũng vậy
            'address' => 'required',
        ],[
            'name.required' => 'Không để trống tên',
            'email.required' => 'Không để trống email',
            'email.unique'=>'Email đã tồn tại'.request()->customer,             // nếu không có cái này thì email sẽ trung với email cũ và sẽ không thực hiện được
            'phone.required' => 'Không để trống số điện thoai',
            'phone.unique'=>'Số điện thoại đã tồn tại'.request()->customer,
            'address.required' => 'Không để trống địa chỉ nhà',
        ]);


//        dd($customer->id);
//        $customer->name = $request->name;                 // request này sẽ trỏ đến name="name" nên để rý kỹ, nếu trong name sai thì n sẽ load lại vì bên kia có trường này đâu
//        $customer->email = $request->email;
//        $customer->phone = $request->phone;
//        $customer->address = $request->address;
//        $customer->save();

//        $customer = Auth::id();
        if($customer->update($request->all())){
            return redirect()->route('home.index')->with('success','sửa thành công');
        }else
        {
            return redirect()->route('home.index')->with('error','sửa không thành công');
        }
//        return redirect()->route('home.index');
    }
}
