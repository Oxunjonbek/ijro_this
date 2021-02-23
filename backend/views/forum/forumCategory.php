<?php

/*@var $forumCategory common\models\ForumCategory */

?>
<div class="forum-category-create">
    <?= $this->render("_form", [
        'forumCategory' => $forumCategory,
    ]) ?>
</div>