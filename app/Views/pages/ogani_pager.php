<?php $pager->setSurroundCount(2) ?>

<?php if ($pager->hasPrevious()) : ?>
<a href="<?= $pager->getPreviousPage() ?>">
    <
</a>
<?php endif ?>

<?php foreach ($pager->links() as $link) : ?>

<a
class="<?= $link['active'] ? 'active' : '' ?>"
href="<?= $link['uri'] ?>">

<?= $link['title'] ?>

</a>

<?php endforeach ?>

<?php if ($pager->hasNext()) : ?>
<a href="<?= $pager->getNextPage() ?>">
    >
</a>
<?php endif ?>