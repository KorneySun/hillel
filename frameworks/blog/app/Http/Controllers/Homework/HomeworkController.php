<?php
namespace App\Http\Controllers\Homework;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('layouts.welcome');
    }
}