<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Account::orderBy('id','asc')->search()->paginate(10); // lỗi search , create_at lỗi thay id vào
        return view('admin.account.index', compact('data')); //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    //Em thêm phần edit sản phẩm ở đây
    public function edit(Account $account)
    {
        $roles = Role::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.account.edit', compact('account', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    //Phần lưu thông tin chỉnh sửa
    public function update(Request $request, Account $account)
    {
        if($account->update($request->all())){            
            return redirect()->route('account.index')->with('success','Chỉnh sửa thành công');
        }else
        {
            return redirect()->route('account.index')->with('error','Chỉnh sửa thất bại');
        }
    }
    //chỉnh chỉnh sửa vậy thôi

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
            return redirect()->route('account.index')->with('success','xóa thành công');
    }
}
