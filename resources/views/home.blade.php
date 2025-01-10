@extends('layouts.app')

@section('content')
    <main>
        <h2>My Tasks</h2>
        <form action="{{ route('index') }}" method="get" style="margin-bottom: 1rem">
            @csrf
            <input type="search" name="search" id="search-input" value="{{ $search }}" placeholder="Search Title">
            <select name="status" id="type-input">
                <option value="" @selected($status == '')>All</option>
                <option value="0" @selected($status == '0')>Unfinished</option>
                <option value="1" @selected($status == '1')>Finished</option>
            </select>
            <input type="submit" class="submit-button" value="Apply Filter" style="font-size: .9rem">
        </form>
        @if (count($tasks) == 0)
            <h3>No Tasks Yet...</h3>
            <p style="margin: 0rem">Can't find any tasks with current parameters</p>
        @else
            <ul>
                @foreach ($tasks as $task)
                    <li>
                        <div style="width: 100%">
                            <a href="{{ route('tasks.show', ['task' => $task['id']]) }}">
                                <h3>{{ $task['title'] }}</h3>
                            </a>
                            @if ($task['deadline'])
                                <span>{{ date('d M Y', strtotime($task['deadline'])) }}</span>
                            @endif
                        </div>
                        <form action="/tasks/status/{{ $task['id'] }}" method="post">
                            @csrf
                            <input type="checkbox" name="isFinished" id="isFinished" onchange="this.form.submit()" @if ($task['status']) checked @endif>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </main>
@endsection

@section('style')
    <style>
        ul {
            margin: 0rem;
            padding: 0rem;
        }
        li {
            margin-bottom: .5rem;
            display: flex;
            justify-content: space-between;
            list-style: none;
        }

        h2 {
            margin-bottom: .25rem;
        }

        form {
            margin: 0rem;
            display: flex;
        }
        #search-input {
            width: 100%;
            margin-right: .5rem;
        }
        #type-input {
            margin-right: .5rem;
        }

        .card-header {
            margin-bottom: .1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-header > span {
            font-size: .85rem;
        }
        .card-content {
            margin: 0.5rem 0rem;
        }
        .card-tags {
            padding: .25rem .5rem;
            display: inline-block;
            border-radius: .25rem;
            font-family: Arial, Helvetica, sans-serif;
            font-size: .75rem;
            font-weight: 700;
            color: white;
            background-color: cadetblue;
        }
    </style>
@endsection