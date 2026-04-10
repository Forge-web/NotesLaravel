<?php

namespace App\Repositories;

use App\Models\Notes;
use App\Repositories\Interfaces\PagesRepositoryInterface;

class PagesRepository implements PagesRepositoryInterface
{
    public function getNotDoneNotes()
    {
        $notDoneNotes = Notes::query()->where('done', false);
        return $notDoneNotes;
    }
}