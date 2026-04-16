@extends('layouts.app')
@section('title', 'Notes')
@section('content')

<div>
    <div class="grid grid-cols-2 w-full gap-2">
        <button     
            class="
                font-light
                text-2xl
                p-2
                cursor-pointer 
                block rounded 
                border-2 
                border-pink-700/50
                hover:bg-pink-300/20
                basis-2/3
                
            "
            onclick="NoteMethods.cancelButton()"
        >
            Notes
        </button>
        <button class="
            px-3
            cursor-pointer 
            block rounded 
            border-2
            border-pink-700/50
            hover:bg-pink-300/20 
            text-3xl
            text-center
            text-pink-700/50
            basis-1/3
        "
        onclick="NoteMethods.addButton()"
        >
            +
        </button>

    </div>
    <div class="mt-5">
        <div id="notes-list" class="grid grid-cols-2 gap-5">
            @foreach ($notes as $note)

                <div class="px-5 py-4 flex flex-row gap-3 border border-pink-700/50" id="note-wrapper-{{ $note->id }}">
                    <a href="/note/{{ $note->id }}" class="m-5 w-full">
                        <div class="basis-2/3">
                            <div class="text-xs uppercase tracking-wide text-gray-400">
                                {{ $note->created_at?->format('d.m.Y') }}
                            </div>
        
                            <h3 class=" text-xl font-semibold leading-tight text-black">
                                {{ $note->name }}
                            </h3>
        
                            <p class="text-black">
                                {{ $note->description }}
                            </p>
                        </div>    
                    </a>
                             
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
                        border
             
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
                        border
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