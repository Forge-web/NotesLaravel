@extends('layouts.app')
@section('title', 'Notes')
@section('content')

<div>
    <div class="flex flex-col-2 gap-50">
        
        <div>
            <button     
                class="
                    font-light
                    text-2xl
                    p-2
                    cursor-pointer 
                    block rounded 
                    border-2 
                    border-gray-700/60 
                    hover:bg-gray-300/20
                "
                onclick="NoteMethods.cancelButton()"
            >
                Notes
            </button>
        </div>
        <button class="
            p-2
            cursor-pointer 
            block rounded 
            border-2 
            border-green-700/60 
            hover:bg-green-300/20
            font-light
            text-lg
        "
        onclick="NoteMethods.addButton()"
        >
            Add new
        </button>
    </div>
    <div class="mt-5">
        <div id="notes-list">
            @foreach ($notes as $note)

                <div class="rounded-xl px-5 py-4 flex flex-row gap-3 border border-black" id="note-wrapper-{{ $note->id }}">
                    <a href="/note/{{ $note->id }}" class="m-5 w-full">
                        <div class="basis-2/3">
                            <div class="text-xs uppercase tracking-wide text-gray-400">
                                {{ $note->created_at?->format('d.m.Y') }}
                            </div>
        
                            <h3 class="text-xl font-semibold leading-tight text-black">
                                {{ $note->name }}
                            </h3>
        
                            <p class="text-black">
                                {{ $note->description }}
                            </p>
                        </div>    
                    </a>
                    <div class="">
                        <button onclick="NoteMethods.destroy({{ $note->id }})" class="hover:bg-red-500/50 cursor-pointer px-5 py-2 rounded-xl w-full border-2 border-red-400">
                            Del
                        </button>
                    </div>                
                </div>
                
            @endforeach
        </div>
        <div id="notes-add" class="hidden">
            <div class="grid grid-cols-1 grid-rows-2 mb-5">
                <div class="flex flex-col">

                    <label for="name" class="font-medium text-lg">Name</label>
                    <input type="text" name="name" id="name" class="p-2 outline-0 border border-black/50 rounded-xl">
                    
                </div>

                <div class="flex flex-col">

                    <label for="description" class="font-medium text-lg">Description</label>
                    <textarea type="text" name="description" id="description" class="p-2 outline-0 border border-black/50 rounded-xl"></textarea>

                </div>

            </div>
            <div class="grid grid-cols-2 gap-5">
                <button 
                    id="notes-button-cancel" 
                    class="
                        p-2
                        cursor-pointer 
                        block rounded 
                        border-2 
                        border-red-700/60 
                        hover:bg-red-300/20
                        font-light
                        text-lg"
                    onclick="NoteMethods.cancelButton()"
                >
                    Cancel
                </button>
                <button 
                    id="notes-button-save" 
                    class="
                        p-2
                        cursor-pointer 
                        block
                        rounded 
                        border-2 
                        border-green-700/60 
                        hover:bg-green-300/20
                        font-light
                        text-lg
                        "
                    onclick="NoteMethods.saveButton()"
                >
                    Save
                </button>
            </div>
        </div>
    </div>
</div>


@endsection