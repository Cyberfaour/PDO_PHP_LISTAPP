<?php
require_once 'bootstrap.php';

use App\Controllers\NoteController;

$noteController = new NoteController();
$notes = $noteController->getAllNotes();

include 'views/header.php';
include 'views/list.php';
include 'views/footer.php';
?>