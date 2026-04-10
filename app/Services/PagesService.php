<?php

namespace App\Services;

use App\Models\Notes;
use Illuminate\Support\Facades\DB;

class PagesService
{
    public function create(array $data): Notes
    {
        return DB::transaction(
            function () use ($data){
                $note = Notes::create($data);
                return $note;
            }
        );
    }
    public function update(Notes $note, array $data): Notes
    {
        return DB::transaction(
            function () use ($note, $data) {
                $note->update($data);
                $note->save();
                return $note;
            }
        );
    }
    public function delete(Notes $note): void
    {
        DB::transaction(
            function () use ($note) {
                $note->delete();
            }
        );
    }
}