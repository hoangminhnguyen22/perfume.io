<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Hash;
use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Account::orderBy('id','DESc')->search()->paginate(15); // lỗi search , create_at lỗi thay id vào
        return view('admin.login.index',); //
    }

    public function register()
    {
        //$data = Account::orderBy('id','DESc')->search()->paginate(15); // lỗi search , create_at lỗi thay id vào
        return view('admin.login.register',); //
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
    public function store(Request $request)
    {
        $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Không để trống tên đăng nhập',
            'password.required' => 'Không để trống mật khẩu'
        ]);

        $arr = [
            'username' => $request ->username,
            'password' => $request ->password,
        ];

        // $remember = isset($request -> remember) ? true : false;
        // $remember = isset($request -> remember);

        if(Auth::attempt($arr)){
            if(Auth::check()){                                  //cần không???
                if(Auth::user()->role_id==1){
                    // return view('admin.dashboard');
                    return redirect()->route('admin.dashboard');
                }
                if(Auth::user()->role_id==2){
                    // return view('admin.dashboard');
                    return redirect()->route('admin.dashboard');
                }
                if(Auth::user()->role_id==3){
                    // return view('admin.dashboard');
                    return redirect()->route('home.index');
                }
            }
            
        }
        else{
            return redirect()->route('login.index')->with('error','Đăng nhập thất bại');
        }
    }

    public function storeRegister(Request $request){
        // $id = (Account::count()) + 1;
        $request -> validate([
            'name' => 'required',
            'username' => 'required|unique:accounts',
            'password' => 'required',
            're-password' => 'required|same:password',
            'email' => 'required|unique:accounts',
            'phone' => 'required|unique:accounts',
            'address' => 'required',
        ],[
            'name.required' => 'Không để trống tên',
            'username.required' => 'Không để trống tên đăng nhập',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'password.required' => 'Không để trống mật khẩu',
            're-password.required' => 'Vui lòng nhập lại mật khẩu',
            're-password.same' => 'Mật khẩu không giống nhau',
            'email.required' => 'Không để trống email',
            'email.unique'=>'Email đã tồn tại',
            'phone.required' => 'Không để trống số điện thoai',
            'phone.unique'=>'Số điện thoại đã tồn tại',
            'address.required' => 'Không để trống địa chỉ nhà',
        ]);
        $create=account::create([
            // 'id' => $id,
            // 'rodeid' => 3,
            'name'=>$request->input('name'),
            'username'=>$request->input('username'),
            'password'=>Hash::make($request->input('password')),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),
        ]);
        if(!$create){
            return redirect()->route('login.index')->with('Fail','Bạn đã tạo thất bại!');
        }
        //$request->session()->put('LoggedUser',User::where('user_id',$create->user_id)->first());
        return redirect()->route('login.index')->with('Success','Bạn đã tạo thành công!');
        // if($request->all()){
        //     dd($request->all());
            //return redirect()->route('login.register')->with('success','thêm mới thành công');
            // return redirect()->back()->with('success','thêm mới thành công');
        // }
            
        
    }

    public function logout(){
          Auth::logout();
          return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
