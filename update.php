<?php

include 'db.php';
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $title = $_POST["title"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $sql = $conn ->prepare("update books set price=?,quantity=? where book_title=?");
    $sql->bind_param('dis',$price,$quantity,$title);
    if($sql->execute()){
        header("Location:dashboard.php");
    }
    else {
        echo "<script>alert('Update Failed')</script>";
    }
}

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
                                <a class="nav-link" href="insert.php" aria-current="page"
                                    >Insert Data
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="update.php">Update Data</a>
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

            <h3 class="text-center py-3">Update Book</h3>

            <div class="container col-5 py-3 border rounded shadow">
                <form action="" method="POST">
                
                <div class="mb-3">
                    <label for="" class="form-label">Book Title</label>
                    <input
                        type="text"
                        class="form-control"
                        name="title"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
                
                
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input
                        type="text"
                        class="form-control"
                        name="price"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input
                        type="text"
                        class="form-control"
                        name="quantity"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                    
                </div>
                
                <div
                    class="container text-center"
                >
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Submit
                    </button>
                    
                </div>
                

            </form>
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
