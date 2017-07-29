<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests;

class TodoController extends Controller
{
	
	private $todo;

	public function __construct(Todo $todo){
		$this->todo = $todo;
	}
	
	/**
	* Display a listing of the resource.
	*
	* @return Response
	*/
	public function index(){
		$todos = $this->todo->all();
		return view('todo.index', compact('todos'));
	}
	public function create(){
		return view('todo.create');
	}
	public function store(Request $request)
	{
    		$input =  $request->all();
    		$this->todo->fill($input);
    		$this->todo->save();

    		return redirect()->to('todo');
	}
}