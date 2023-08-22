<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main Page</title>
    </head>
    <body>
        <h1>Welcome Main Page</h1>
        <form action="create/task" method="POST">
            <input type="text" name="description" >
            <input type="submit" value="Save">
        </form>
        <ul>
            <?php foreach ( $tasks as $task) : ?>
                <li><?=  $task->description  ?></li>
            <?php  endforeach?>            
        </ul>
    </body>
</html>