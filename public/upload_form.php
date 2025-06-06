<!DOCTYPE html>
<html>
<head>
    <title>Upload slike</title>
</head>
<body>
    <h2>Upload slike</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit">Pošalji</button>
    </form>
</body>
</html>
