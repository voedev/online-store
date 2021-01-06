<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <title>Ошибка</title>
    <link rel="stylesheet" href="errors/css/error.css">
</head>
<body>

<h1>Произошла ошибка</h1>
<div><b>Код ошибки:</b> <code><?= $errno ?></code> </div>
<div><b>Текст:</b> <code><?= $errstr ?></code> </div>
<div><b>Файл:</b> <code><?= $errfile ?></code> </div>
<div><b>Строка:</b> <code><?= $errline ?></code> </div>

</body>
</html>