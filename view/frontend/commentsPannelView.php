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

                while ($data = $comments->fetch()){

                ?>
                    <tr>
                        <th><?= $data['id'] ?></th>
                        <td><?= htmlentities(strftime("%d/%m/%y", strtotime($data['comment_date']))) ?></td>
                        <td>
                            <?php 

                            if (strlen($data['author']) > 19) {
                                $data['author'] = substr($data['author'], 0, 16) .'...';

                                echo htmlspecialchars($data['author']);

                            } else {
                                echo htmlspecialchars($data['author']);
                            }

                            ?>
                        </td>
                        <td><?= $data['comment'] ?></td>
                        <td>
                            <a href="index.php?action=approveComment&amp;id=<?= $data['id'] ?>"><i class="fas fa-check-circle fa-2x"></i></a>
                            <a href="index.php?action=disapproveComment&amp;id=<?= $data['id'] ?>"><i class="fas fa-times-circle fa-2x"></i></a>
                        </td>
                    </tr>
                <?php

                }
                $comments->closeCursor();

                ?>
            </tbody>
        </table>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>