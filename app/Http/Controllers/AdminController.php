<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('admin')!=null)
        {
             $welcome_content=view('admin.pages.welcome');
             return view('admin.pages.admin-home')->with('content',$welcome_content);
        }
          else
          {
               return redirect('/log-in'); 
          }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logIn() {
        session()->forget('admin');
        return view('admin.pages.login');
    }
    public function postLogIn(Request $request) {
        $product_existing = DB::table('tbl_admins')->where([['admin_email', $request->email], ['admin_password', $request->password] ])->First();
        
        if($product_existing)
        {
             session(['admin' => $request->email]);
             return redirect('/admin-panel');
           
        }
       else{
       
       return redirect('/log-in'); 
       }
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
