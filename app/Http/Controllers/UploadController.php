<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uploadDayEndinfo()
    {
        if(session()->get('admin')!=null)
        {
             $dayend_content=view('admin.pages.dayend');
             return view('admin.pages.admin-home')->with('content',$dayend_content); 
        }
          else
          {
               return redirect('/log-in'); 
          }
    }
    public function uploadDayEndArchiveData(Request $request)
    {
        if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){

				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {	
                                                    
                                                        if(DB::table('tbl_basicinformation')->where('tradeCode',trim($v['tradecode']))->First()!=null)
                                                        {
							$insert[] = [
                                                            
                                                            '_date' => $v['date'], 
                                                            'ltp' => $v['ltp'], 
                                                             'high' => $v['high'], 
                                                             'low' => $v['low'], 
                                                            'open' => $v['open'],
                                                            'close' => $v['close'], 
                                                             'ycp' => $v['ycp'],
                                                            'trade' => $v['trade'],
                                                             'value_mn' => $v['value_mn'],
                                                             'volume' => $v['volume'],
                                                             'basic_info_id'=>(int)DB::table('tbl_basicinformation')->where('tradeCode',trim($v['tradecode']))->First()->id
                                                        ];
                                                        
                                                        }
						}
					}
				}

				
				if(!empty($insert)){
                                  DB::table('tbl_dayendarchive')->insert($insert);
					return back()->with('success','Insert Record successfully.');
                                    
				}

			}

		}

		return back()->with('error','Please Check your file, Something is wrong there.');
    }

    public function uploadMarketSummaryInfo() {
        
         if(session()->get('admin')!=null)
        {
             $content=view('admin.pages.market-summary');
             return view('admin.pages.admin-home')->with('content',$content); 
        }
          else
          {
               return redirect('/log-in'); 
          }
    }
    public function uploadShareHoldingInfo()
    {
      if(session()->get('admin')!=null)
        {
             $content=view('admin.pages.share-holding');
             return view('admin.pages.admin-home')->with('content',$content); 
        }
          else
          {
               return redirect('/log-in'); 
          }
    }

    public function myFunction(string $str)
    {
       
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
     public function getAll($str)
    {
       return DB::table('tbl_basicinformation')->where('tradeCode',$str)->First()->id;
    }
}
