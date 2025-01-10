@extends('layouts.app')

@section('content')
    <main>
        <div class="header">
            <div class="header-data">
                <h2>{{ $task['title'] }}</h2>
                <span>Deadline - {{ $task['deadline'] ?? 'No deadline set' }}</span>
            </div>
            <div class="header-action">
                <a href="{{ route('tasks.edit', ['task' => $task['id']]) }}" id="edit-button">Edit</a>
                <form action="{{ route('tasks.destroy', ['task' => $task['id']]) }}" method="post" onsubmit="confirm('This action will delete this task. Are you sure?')">
                    @csrf
                    @method('delete')
                    <button type="submit" id="delete-button">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <hr>
        <p>{{ $task['description'] ?? 'No Description' }}</p>
    </main>
@endsection

@section('style')
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-data {
            display: flex;
            flex-direction: column;
        }
        .header-action {
            display: flex;
        }
        #edit-button {
            margin-right: .5rem;
            padding: .4rem .8rem;
            display: inline-block;
            border-radius: .2rem;
            font-size: .8rem;
            font-weight: 600;
            background-color: var(--warning-color);
        }
        #delete-button {
            padding: .4rem .8rem;
            display: inline-block;
            border-style: none;
            border-radius: .2rem;
            font-size: .8rem;
            font-weight: 600;
            background-color: var(--error-color);
        }

        form {
            margin: 0rem;
        }
    </style>
@endsection
