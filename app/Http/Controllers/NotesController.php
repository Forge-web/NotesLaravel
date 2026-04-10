<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotesRequest;
use App\Models\Notes;
use App\Repositories\PagesRepository;
use App\Services\PagesService;



class NotesController extends Controller
{
    public function __construct(
        private PagesRepository $repository,
        private PagesService $service,
    ){}
    public function index()
    {
        // return $this->repository->getNotDoneNotes();
        return Notes::all();
    }

    public function store(NotesRequest $request)
    {
        return $this->service->create($request->validated());
    }

    public function update(NotesRequest $request, string $id)
    {
        $note = Notes::findOrFail($id);
        $note->fill($request->except(['id']));
        $note->save();
        return response()->json($note);
    }

    public function destroy(NotesRequest $request, string $id)
    {
        $note = Notes::findOrFail($id);
        if ($note->delete()) return response(null, 204);
    }
}
