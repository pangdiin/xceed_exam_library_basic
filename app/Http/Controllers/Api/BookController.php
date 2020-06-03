<?php

namespace App\Http\Controllers\Api;

use App\Book;
use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $model;

    public function __construct(Book $book)
    {
        $this->model = new BookRepository($book);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->model->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name'   => 'required',
           'author' => ' required'
       ]);

       // create record and pass in only fields that are fillable
       return $this->model->create($request->only($this->model->getModel()->fillable));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->model->show($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
       $response =  $this->model->update($request->only($this->model->getModel()->fillable), $id);

       return response()->json('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
