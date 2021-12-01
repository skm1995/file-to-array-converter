<a href="<?= \App\Util\RoutePathFinder::findByName('form-index') ?>">back</a>
<table>
    <?php foreach ($items as $rowKey => $rowItems): ?>
        <tr>
        <?php if ($rowKey == 0): ?>
            <?php foreach ($rowItems as $key => $data): ?>
                <th><?= $data ?></th>
            <?php endforeach; ?>
        <?php else: ?>
            <?php foreach ($rowItems as $key => $data): ?>
                <td><?= $data ?></td>
            <?php endforeach; ?>
        <?php endif ?>
        <tr>
    <?php endforeach; ?>
</table>
