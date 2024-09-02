<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Http\Resources\DeletedTodoResource;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return TodoResource::collection(
            Todo::whereNull('deleted_at')->get()
        );
        
    }

    public function deleted()
    {
        return DeletedTodoResource::collection(
            Todo::history()->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoStoreRequest $request)
    {
        $todo = Todo::create($request->validated());

        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoUpdateRequest $request, Todo $todo)
    {
        //
        $todo->update($request->validated());

        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();

        return response()->noContent();

    }
}
