<!-- Main Content -->
<main class="container mt-5">
    <h2>Note List</h2>
    <ul class="list-group">
        <?php foreach ($notes as $note): ?>
            <li class="list-group-item">
                <h5><?php echo $note['title']; ?></h5>
                <p><?php echo $note['content']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</main>