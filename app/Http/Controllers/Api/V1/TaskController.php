<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    private $menu_id = 2;
    private $table = 'task';
    
    public function task()
    {
        if(session('user_id') == ''){
            return redirect('/login');
        }
        $meac = $this->access_menu($this->menu_id);
        $data['page'] = $this->table;
        $data['title'] = $meac->menu_title;
        $data['icon'] = $meac->menu_faIcon;
        $data['menu_id'] = $this->menu_id;
        $data['menu'] = $this->select_menu();
        $data['menu_access'] = $meac;
        session()->forget('search_'.$this->table.'1');
        session()->forget('search_'.$this->table.'2');
        session()->forget('search_'.$this->table.'3');
        session()->forget('search_'.$this->table.'4');
        if($meac->meac_R == 1 and $meac->menu_R == 1){
            return view("backend.page.".$this->table, $data); 
        } else {
            return redirect('/no_access');
        }    
    }
    
    public function table_task()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://127.0.0.1:8000/api/v1/data_task',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer '.session('token')
            ),
        ));
        $response = curl_exec($curl);
        
        $data['query'] = $response;
        $data['table'] = $this->table;
        return view("backend.table.task_table", $data);  
    }

    public function create_task(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/v1/store_task',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('user_id' => session('user_id'),'category_task_id' => $request->category_task_id,'task_name' => $request->task_name),
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer '.session('token')
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		
        return json_encode($response);
    }

    public function edit_task(Request $request)
    {
        $ID = request('table_id');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/v1/update_task/'.$ID,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('category_task_id' => $request->category_task_id,'task_name' => $request->task_name),
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer '.session('token')
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
		
        return json_encode($response);
    }

    public function hapus_task()
    {
        $ID = request('a');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://127.0.0.1:8000/api/v1/delete_task/'.$ID,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer '.session('token')
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_encode($response);
    }
    
    public function data_form_commission_collective()
    {
        $ID = request('a');
        $update = '';
        if(request('a')){
            $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://127.0.0.1:8000/api/v1/data_task_id/'.$ID,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Authorization: Bearer '.session('token')
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            foreach($response as $update){
                $data['update'] = $update;
            }
        } else {
            $data['update'] = '';
        }

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8000/api/v1/data_task_category',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json',
            'Authorization: Bearer '.session('token')
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data['data_task_category'] = $response;
        $data['ID'] = $ID;
        $data['table'] = $this->table;
        return view("backend.form.task_form", $data); 
    }

    public static function access_menu($menu_id)
    {	
        return DB::table('menu as b')
        ->join('menu_access as a', 'a.menu_id', '=', 'b.menu_id')
        ->join('users as d', 'd.user_roles_id', '=', 'a.user_roles_id')
        ->join('user_roles as e', 'd.user_roles_id', '=', 'e.id')
        ->select('d.id as id', 'e.user_role_name as user_role_name', 'b.menu_url as menu_url', 'b.menu_faIcon as menu_faIcon', 'b.menu_title as menu_title', 'd.user_roles_id as user_roles_id', 'a.meac_C as meac_C', 'a.meac_R as meac_R', 'a.meac_U as meac_U', 'a.meac_D as meac_D', 
        'b.menu_C as menu_C', 'b.menu_R as menu_R', 'b.menu_U as menu_U', 'b.menu_D as menu_D', 
        'b.menu_display as menu_display')
        ->where('a.menu_id', '=', $menu_id)
        ->where('b.menu_display', '=',1)
        ->where('d.id', '=', session('user_id'))->first();
    }
    
    public static function select_menu() {
        return DB::table('menu')
        ->where('menu_display', '=', 1)
        ->orderBy('menu_menu_order', 'asc')->get();
    }

    public function data_task(Request $request){
        try {
            
            $post = Task::all();
            
            return response()->json([
                'message' => 'Data Berhasil ditampilkan',
                'data' => TaskResource::collection($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }

    public function data_task_id(Request $request, $id){
        try {
            
            $post = Task::where('id', $id)->first();
            
            return response()->json([
                'message' => 'Data Berhasil ditampilkan',
                'data' => TaskResource::collection($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
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
