Possible file extensions: <?= $possibleExtensionsString ?>
<form action="<?= \App\Util\RoutePathFinder::findByName('form-process') ?>" method="post">
    <input name="filename" type="text" placeholder="File name" required>
    <button type="submit">Submit</button>
</form>
