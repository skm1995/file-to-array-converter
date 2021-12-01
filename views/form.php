Possible file extensions: <?= $possibleExtensionsString ?>
<form action="<?= \App\Util\RoutePathFinder::findByName('form-process') ?>" method="post">
    <input name="filename" type="text" placeholder="File name" required>
    <input name="csrf" type="hidden" value="<?= \App\Util\CsrfGenerator::generate(\App\Enum\CsrfIntentionEnum::PROCESS_FORM) ?>">
    <button type="submit">Submit</button>
</form>
