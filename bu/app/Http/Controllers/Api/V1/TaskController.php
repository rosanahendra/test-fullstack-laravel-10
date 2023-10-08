<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    private $menu_id = 13;
    private $table = 'bank';
    
    public function task()
    {
        if(session('user_id') == ''){
            return redirect('/login');
        }
        $meac = \App\Helpers\AppHelper::access_menu($this->menu_id);
        $data['page'] = $this->table;
        $data['title'] = $meac->menu_title_ID;
        $data['icon'] = $meac->menu_faIcon;
        $data['menu_id'] = $this->menu_id;
        $data['menu'] = \App\Helpers\AppHelper::select_menu();
        $data['menu_access'] = $meac;
        $data['content1'] = DB::select("select memb_code, memb_name, memb_phone_code, memb_phone from member");
        session()->forget('search_'.$this->table.'1');
        session()->forget('search_'.$this->table.'2');
        session()->forget('search_'.$this->table.'3');
        session()->forget('search_'.$this->table.'4');
        if($meac->meac_R == 1 and $meac->menu_R == 1){
            return view("backend.page.".$this->table."_admin", $data); 
        } else {
            return redirect('/no_access');
        }    
    }
    
    public function table_task()
    {
        if(!request('page')){
            $a = request('a');
            $b = request('b');
            $c = request('c');
            
            $search1 = ''; if($a <> '' and $c == 1){ session()->put('search_'.$b.'1', $a); $search1 = " and (memb_name like '%".session('search_'.$b.'1')."%' or memb_code like '%".session('search_'.$b.'1')."%')"; } else { session()->forget('search_'.$b.'1'); }
            $search2 = ''; if($a <> '' and $c == 2){ session()->put('search_'.$b.'2', $a); $search2 = " and (coco_status like '%".session('search_'.$b.'2')."%' or memb_name_account like '%".session('search_'.$b.'2')."%' or memb_number_account like '%".session('search_'.$b.'2')."%' or acbc_name like '%".session('search_'.$b.'2')."%' or acbc_number like '%".session('search_'.$b.'2')."%')"; } else { session()->forget('search_'.$b.'2'); }
            $search3 = ''; if($a <> '' and $c == 3){ session()->put('search_'.$b.'3', $a); $search3 = " and (coco_bank_fee like '%".session('search_'.$b.'3')."%' or coco_total like '%".session('search_'.$b.'3')."%')"; } else { session()->forget('search_'.$b.'3'); }
            $search4 = ''; if($a <> '' and $c == 4){ session()->put('search_'.$b.'4', $a); $search4 = " and (substring(coco_date, 1, 10) between '".str_replace('to', "' and '", str_replace(' ', '', session('search_'.$b.'4')))."')"; } else { session()->forget('search_'.$b.'4'); }
        } else {
            $b = $this->table; 
            $search1 = ''; if(session('search_'.$b.'1')){ $search1 = " and (memb_name like '%".session('search_'.$b.'1')."%' or memb_code like '%".session('search_'.$b.'1')."%')"; } else { session()->forget('search_'.$b.'1'); }
            $search2 = ''; if(session('search_'.$b.'2')){ $search2 = " and (coco_status like '%".session('search_'.$b.'2')."%' or memb_name_account like '%".session('search_'.$b.'2')."%' or memb_number_account like '%".session('search_'.$b.'2')."%' or acbc_name like '%".session('search_'.$b.'2')."%' or acbc_number like '%".session('search_'.$b.'2')."%')"; } else { session()->forget('search_'.$b.'2'); }
            $search3 = ''; if(session('search_'.$b.'3')){ $search3 = " and (coco_bank_fee like '%".session('search_'.$b.'3')."%' or coco_total like '%".session('search_'.$b.'3')."%')"; } else { session()->forget('search_'.$b.'3'); }
            $search4 = ''; if(session('search_'.$b.'4')){ $search4 = " and (substring(coco_date, 1, 10) between '".str_replace('to', "' and '", str_replace(' ', '', session('search_'.$b.'4')))."')"; } else { session()->forget('search_'.$b.'4'); }
        }
        
        $meac = \App\Helpers\AppHelper::access_menu($this->menu_id);
        
        $num = 0;
        $querynum = DB::select("select count(coco_id) as total from commission_collective where coco_id <> '' $search1 $search2 $search3 $search4");
        foreach($querynum as $rownum){  
            $num = $rownum->total;    
        }
        
        $cek = 0;
        $halaman=1;
		$offset = request('page');
		if($offset){
		  $halaman = $offset;
		}
		$limit = 5;
		$pages=($halaman-1)*$limit;
		$no = $pages+1;
		$show = $pages+1;
        $lastrow = '';
        $page = $this->table;
        
        $queryTable = "select coco_id, bank_id_from, acbc_name, acbc_number, bank_id_to, memb_name_account, memb_number_account, memb_code, memb_name, 
        coco_bank_fee, coco_total, coco_file, coco_status, DATE_FORMAT(substring(coco_date, 1, 10), '%d %M %Y') as coco_date, substring(coco_date, 11, 6) as waktu
        from commission_collective where coco_id <> '' $search1 $search2 $search3 $search4 order by coco_id desc";
        
        $data['query'] = DB::select($queryTable." limit ".$pages.",".$limit);
        
        $data['no'] = $no;
        $data['table'] = $this->table;
        $data['num'] = $num;
        $data['meac'] = $meac;
        $data['cek'] = $cek;
        $data['queryTable'] = $queryTable;
        $data['pages'] = $pages;
        $data['halaman'] = $halaman;
        $data['page'] = $page;
        $data['show'] = $show;
        $data['lastrow'] = $lastrow;
        $data['limit'] = $limit;
        
        return view("backend.table.commission_collective_table", $data);  
    }

    public function store_task(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'category_task_id' => 'required',
                'task_name' => 'required|min:5',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }

            $post = Task::create($request->all());
            
            return response()->json([
                'message' => 'Data Berhasil disimpan',
                'data' => new TaskResource($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }

    public function update_task(Request $request, $id){
        try {
            $post = Task::where('id', $id)->first();
            if (!$post) {
                return response()->json([
                    'message' => 'Data Not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'category_task_id' => 'required',
                'task_name' => 'required|min:5',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }
            
            $post = Task::where('id', $id)->first();
            $post->update($request->all());
            
            return response()->json([
                'message' => 'Data berhasil diperbaharui',
                'data' => new TaskResource($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }

    public function delete_task(Request $request, $id){
        try {
            $post = Task::where('id', $id)->first();
            if (!$post) {
                return response()->json([
                    'message' => 'Data Not found'
                ], 404);
            }
            
            $post = Task::where('id', $id)->first();
            $post->delete();
            
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => new TaskResource($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }
}
