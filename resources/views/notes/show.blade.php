@extends('layouts.app')
@section('title', 'Notes')
@section('content')

<div class="w-150">
    <div id="notes-view">
        <div class="grid grid-cols-3 gap-5 w-max float-right">
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-blue-700/60 
                hover:bg-blue-300/20
                font-light
                text-lg"
                onclick="NoteMethods.editButton()"
            >
                Edit
            </button>
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-green-700/60 
                hover:bg-green-300/20
                font-light
                text-lg"
                onclick="NoteMethods.updateButton(id={{ $note->id }}, data={'done': true})"
            >
                Done
            </button>
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-red-700/60 
                hover:bg-red-300/20
                font-light
                text-lg"
                onclick="NoteMethods.destroy({{ $note->id }}, true)"
            >
                Del
            </button>
            
        </div>
        <div id="note-view" class="p-10">
            <h1 class="my-5 font-medium text-lg" id="note-view-name">{{ $note->name }}</h1>
            <p class="font-normal text-lg text-gray-500" id="note-view-description">{{ $note->description }}</p>
        </div>
    </div>
    <div id="notes-edit" class="p-10 hidden">
        <div class="flex flex-col">
            <input type="text" name="name" id="name" class="mb-5 p-2 outline-0 border border-black/50 rounded-xl" value="{{ $note->name }}">
            <textarea name="description" id="description" class="p-2 outline-0 border border-black/50 rounded-xl">{{ $note->description }}</textarea>
        </div>
        <div class="mt-5 grid grid-cols-2 gap-5 w-max float-right">
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-red-700/60 
                hover:bg-red-300/20
                font-light
                text-lg"
                onclick="NoteMethods.cancelEditButton()"
            >Cancel</button>
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-green-700/60 
                hover:bg-green-300/20
                font-light
                text-lg"
                onclick="NoteMethods.saveEditButton(id={{ $note->id }}, url_replace='/note/{{ $note->id }}')"
            >Save</button>
        </div>
    </div>
</div>

@endsection