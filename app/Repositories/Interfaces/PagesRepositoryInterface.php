<?php

namespace App\Repositories\Interfaces;

use App\Models\Notes;

interface PagesRepositoryInterface
{
    public function getNotDoneNotes();
}