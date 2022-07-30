<?php

$title = 'Gestion des commentaires';
$description = '';
$page = 'admin';

?>

<?php ob_start(); ?>

<div class="comments-manage col-md-8">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="id">#</th>
                    <th class="date">Date</th>
                    <th class="author">Auteur</th>
                    <th class="comment">Commentaire</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($comments as $comment) {
                ?>
                    <tr>
                        <th><?= ($comment->id) ?></th>
                        <td><?= strftime("%d/%m/%y", strtotime($comment->comment_date)) ?></td>
                        <td>
                            <?php
                            if (strlen($comment->author) > 19) {
                                $comment->author = substr($comment->author, 0, 16) . '...';

                                echo ($comment->author);
                            } else {
                                echo htmlspecialchars($comment->author);
                            }
                            ?>
                        </td>
                        <td><?= ($comment->comment) ?></td>
                        <td>
                            <a href="index.php?action=approveComment&amp;id=<?= ($comment->id) ?>"><i class="fas fa-check-circle fa-2x"></i></a>
                            <a href="index.php?action=disapproveComment&amp;id=<?= ($comment->id) ?>"><i class="fas fa-times-circle fa-2x"></i></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>