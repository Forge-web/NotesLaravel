@extends('layouts.app')
@section('title', 'Notes')
@section('content')

<div class="w-150">
    <div id="notes-view">
        <a     
            class="
                font-light
                text-2xl
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-gray-700/60 
                hover:bg-gray-300/20
                text-center
                mb-5


            "
            href="{{ route('index') }}"
        >
            Notes
        </a>
        <div class="grid grid-cols-3 gap-5 w-max float-right">
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border
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
                border
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
                border
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
                border
                font-light
                text-lg"
                onclick="NoteMethods.cancelEditButton()"
            >Cancel</button>
            <button class="
                p-2
                cursor-pointer 
                block rounded 
                border
                font-light
                text-lg"
                onclick="NoteMethods.saveEditButton(id={{ $note->id }}, url_replace='/note/{{ $note->id }}')"
            >Save</button>
        </div>
    </div>
</div>

@endsection