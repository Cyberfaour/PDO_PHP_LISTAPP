<?php
use App\Models\Note;
use PHPUnit\Framework\TestCase;

class NoteTest extends TestCase{
    public function testNoteGetters(){
        $note = new Note('Test Title', 'Test Content');

        $this->assertEquals('Test Title', $note->getTitle());
        $this->assertEquals('Test Content', $note->getContent());
    }
}
?>