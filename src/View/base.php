<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Note taking app</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--  Add HTMX and TailwindCss  -->
    <script src="https://unpkg.com/htmx.org@1.9.6"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    <?php use View\Render; ?>

    <?php $activeFH && Render::render("components/Header") ?>

    <?php Render::render($main) ?>

    <?php $activeFH && Render::render("components/Footer") ?>

</body>
</html>