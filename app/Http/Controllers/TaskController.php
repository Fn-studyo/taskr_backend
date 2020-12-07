<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $task = new Task();
        $task->user_id = $request->get('user_id');
        $task->title = $request->get('title');
        $task->color = $request->get('color');
        $task->description = $request->get('description');
        $task->due_date = $request->get('due_date');
        if($task->save()){
            return response()->json(['message' => 'Task created successfully']);
        }
    }


        /**
     * Show the form for listing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        // $task = new Task();
        // $data = $task->find($request->get('id'))->users;
        // return new TaskResource($data);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = new Task();
        $data = $task->where('user_id', $id)->get();
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task= Task::find($id);
        $task->title = $request->get('title');
        $task->color = $request->get('color');
        $task->description = $request->get('description');
        $task->due_date = $request->get('due_date');   
        $task->save();
        return response()->json(['message' => 'Task updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Task::find($id);
        $delete = $car->delete();
        if($delete){
            return response()->json(['message' => 'Task deleted successfully']);
        }

    }
}
