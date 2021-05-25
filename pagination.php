<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #page {
            margin-top: 10px;
        }
        #page>a {
            border: 1px solid black;
            padding: 4px 8px;
            margin-left: 2px;
        }
    </style>
</head>

<body>
    <div id="page">
        <?php
        for ($num = 1; $num <= $totalPages; $num++) { ?>
            <a class="page-item" href="?itemPerPage=<?= $itemPerPage ?>&page=<?= $num ?>"><?= $num ?></a>
        <?php } ?>
    </div>
</body>

</html>