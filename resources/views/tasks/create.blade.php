@extends('layouts.form')

@section('content')
    <h2>Create new task</h2>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="input-container">
            <label for="title">Title</label>
            <input type="text" name="title" @error('title') style="border: 1px solid var(--error-color)" @enderror>
            @error('title')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-container">
            <label for="description">Description</label>
            <textarea name="description" id="description-input" cols="30" rows="10" @error('description') style="border: 1px solid var(--error-color)" @enderror></textarea>
            @error('description')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-container">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" @error('deadline') style="border: 1px solid var(--error-color)" @enderror>
            @error('deadline')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="submit-button">Create</button>
    </form>
@endsection

@section('style')
    <style>
        h2 {
            margin: 1rem 0rem;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .input-container {
            margin-bottom: .5rem;
            display: flex;
            flex-direction: column;
        }
        .submit-button {
            margin-top: .5rem;
        }
    </style>
@endsection