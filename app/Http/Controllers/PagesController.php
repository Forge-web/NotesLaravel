<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notes;
use App\Repositories\Interfaces\PagesRepositoryInterface;
use App\Services\PagesService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PagesController extends Controller
{
    public function __construct(
        private PagesService $service,
        private PagesRepositoryInterface $repository 
    ){}
    public function index(Request $request): View
    {
        $notes = Notes::all();
        return view('notes.index', ['notes' => $notes]);
    }

    public function show($id): View
    {
        $note = Notes::query()->where('id', $id)->first();
        return view('notes.show', ['note' => $note]);
    }
}
