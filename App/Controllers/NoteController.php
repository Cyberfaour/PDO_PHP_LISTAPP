<?php
namespace App\Controllers;
use App\Models\Note;

class NoteController{
    public function getAllNotes() {
        $notes = [
            new Note('Note 1', 'Lorem ipsum dolor sit amet.'),
            new Note('Note 2', 'Consectetur adipiscing elit.'),
            new Note('Note 3', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
        ];
        return $notes;;
    }

}
?>