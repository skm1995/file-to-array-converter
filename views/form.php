Possible file extensions: <?= ! empty(getenv('supported_extensions')) ? getenv('supported_extensions') : 'none' ?>
<form action="#" method="post">
    <input name="filename" type="text" placeholder="File name" required>
    <button type="submit">Submit</button>
</form>
