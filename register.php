<?php

include 'db.php';
session_start();

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pass = password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql = $conn -> prepare("insert into users(full_name,email,phone,password_hash) values (?,?,?,?)");
    $sql->bind_param('ssss',$name,$email,$phone,$pass);

    if(empty($name) || empty($email) || empty($phone) || empty($pass)){
        echo "<script>alert('Fields are empty')</script>";
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Email must in proper format')</script>";
    }
    else if($sql->execute()){
        header("Location:login.php");
    }
    else{
        echo "<script>alert('Registration Failed')</script>";
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
            <h3 class="text-center py-3">Register With Us</h3>
            <div
                class="container col-5 py-3 border rounded shadow"
            >
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="name"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input
                            type="text"
                            class="form-control"
                            name="email"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                        
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input
                            type="text"
                            class="form-control"
                            name="phone"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                       
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="text"
                            class="form-control"
                            name="password"
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
