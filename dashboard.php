<?php

include 'db.php';
session_start();

$result = $conn->query("select * from books");

?>

<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <nav class="navbar navbar-expand-sm navbar-light bg-light">
                <div class="container">
                    <h3> Hello <?php echo $_SESSION['name']; ?></h3>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="insert.php" aria-current="page"
                                    >Insert Data
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="update.php">Update Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete.php">Delete Data</a>
                            </li>
                            
                        </ul>
                        <form class="d-flex my-2 my-lg-0" action="logout.php">
                            
                            <button
                                class="btn btn-outline-success my-2 my-sm-0"
                                type="submit"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <h3 class="text-center py-3">Book Records</h3>

            <div
                class="container py-3 col-5"
            >
                <div class="table-responsive">
                <table
                    class="table table-primary table-bordered table-striped shadow"
                >
                    <thead>
                        <tr class="table-danger">
                            <th scope="col">ID</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()){ ?>
                        <tr class="table-success">
                            <td scope="row"><?php echo $row["id"] ?></td>
                            <td><?php echo $row["book_title"] ?></td>
                            <td><?php echo $row["author"] ?></td>
                            <td><?php echo $row["category"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["quantity"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            </div>
            
            
            
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
