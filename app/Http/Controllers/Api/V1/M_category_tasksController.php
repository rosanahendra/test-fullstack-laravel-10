<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\M_category_taskResource;
use App\Models\M_category_task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class M_category_tasksController extends Controller
{
    //

    public function store_category_task(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'category_task_name' => 'required|unique:m_category_tasks',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }

            $post = M_category_task::create($request->all());
            
            return response()->json([
                'message' => 'Data Berhasil disimpan',
                'data' => new M_category_taskResource($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }

    public function update_category_task(Request $request, $id){
        try {
            $post = M_category_task::where('id', $id)->first();
            if (!$post) {
                return response()->json([
                    'message' => 'Data Not found'
                ], 404);
            }

            $validator = Validator::make($request->all(), [
                'category_task_name' => 'required',
            ]);

            if($validator->fails()){
                return response()->json($validator->errors());       
            }
            
            $post = M_category_task::where('id', $id)->first();
            $post->update($request->all());
            
            return response()->json([
                'message' => 'Data berhasil diperbaharui',
                'data' => new M_category_taskResource($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }

    public function delete_category_task(Request $request, $id){
        try {
            $post = M_category_task::where('id', $id)->first();
            if (!$post) {
                return response()->json([
                    'message' => 'Data Not found'
                ], 404);
            }
            
            $post = M_category_task::where('id', $id)->first();
            $post->delete();
            
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => new M_category_taskResource($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }

    public function data_task_category(Request $request){
        try {
            
            $post = M_category_task::all();
            
            return response()->json([
                'message' => 'Data Berhasil ditampilkan',
                'data' => M_category_taskResource::collection($post)
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ], 500);
            
        }
    }
}
