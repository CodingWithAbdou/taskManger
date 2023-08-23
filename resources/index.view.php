



<!DOCTYPE html>
<html lang="en" dir='rtl'>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>مدير المهام </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous"> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <style>
        .list-group  .list-group-item .trash {
            visibility: hidden ;
        }
        .list-group .list-group-item:hover .trash {
            visibility: visible;
        }
        .list-group .description.line-throw {
            text-decoration: line-through;
        }
        .nav-item .nav-link.active {
            text-decoration: underline;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid px-2">
            <a class="navbar-brand text-primary " href="#"><i class="bi bi-app-indicator "></i> مدير المهام</a>
            </div>
        </nav>
        <main>
            <div class="container my-4">
                <div class="row">
                    <div class="card border-primary col-md-8 mx-auto p-0">
                        <div class="card-header  ">
                            <form action="create/task" method="POST" class="input-group">
                                <input type="text" class="form-control" name="description" placeholder="مهمة جديدة ...." >
                                <input type="submit" value="إضافة" class="btn btn-outline-primary">
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="filter">
                                <ul class="nav  nav-justified  mb-3">
                                    <li class="nav-item"  >
                                        <a class="nav-link " href="<?= home() ?>">الكل</a>
                                    </li>
                                    <li class="nav-item" >
                                        <a class="nav-link"  href="?completed=0"> قيد التنفيذ</a>
                                    </li>
                                    <li class="nav-item" >
                                        <a class="nav-link"  href="?completed=1">مكتملة</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <ul class="list-group">
                                <?php foreach($tasks as $task) : ?>
                                    <li class="list-group-item list-group-item-action d-flex justify-content-between">
                                        <div>
                                            <a href="update/task?id=<?=$task->id ?>&completed=<?= $task->completed ?>" class="px-2"><i class="<?= $task->completed  ? "bi bi-check2-circle " : 'bi bi-clock-history' ?> "></i></a>
                                            <span class="description <?= $task->completed ? 'line-throw' : '' ?>"><?= $task->description?></span>
                                        </div>
                                        <a href="delete/task?id=<?=$task->id ?>" class="trash"><i class="bi bi-trash3 text-danger "></i></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script>
        const links = document.querySelectorAll('.nav-item')

        for(let i = 0 , len = links.length ; i < len ; i++ ) {
            links[i].addEventListener('click' , (event) => {
                localStorage.setItem('active' , event.target.dataset.id)
            })  
        }
        // addEventListener("load", () => {
            
        // });

    </script>
</html>

