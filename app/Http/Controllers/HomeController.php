<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::where('title', 'LIKE', '%' . $request['search'] . '%');
        if ($request['status'] != '') {
            $tasks = $tasks->where('status', '=', $request['status']);
        }
        $tasks = $tasks->where('user_id', '=', Auth::id())->get();
        return view('home', ['tasks' => $tasks, 'status' => $request['status'], 'search' => $request['search']]);
    }
}
