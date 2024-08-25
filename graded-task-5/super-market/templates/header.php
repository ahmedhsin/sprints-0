<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="templates/css/style.css">
    <title><?php if(isset($title)) echo $title; else echo 'Home';?></title>
</head>
<body>

<!--start of navbar-->
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">SuperMarket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-2 <?php if(isset($_SESSION['logged_in'])) echo "d-none"; ?>">
                <li class="nav-item">
                    <a class="btn btn-primary" aria-current="page" href="#">SignIn</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="#">SignUp</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto gap-2 <?php if(!isset($_SESSION['logged_in']) or $_SESSION['type'] == 'admin') echo "d-none"; ?>">
                <li class="nav-item">
                    <a class="btn btn-primary" aria-current="page" href="my-orders.php">My Cart</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="logout.php">LogOut</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto gap-2 <?php if(!isset($_SESSION['logged_in']) or $_SESSION['type'] != 'admin') echo "d-none"; ?>">
                <li class="nav-item">
                    <a class="btn btn-outline-primary <?php if(isset($title) && $title == 'Users') echo 'active' ?>" aria-current="page" href="?model=users"
                    >Users</a
                    >
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary <?php if(isset($title) && $title== 'Orders') echo 'active' ?>" href="?model=orders">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary <?php if(isset($title) && $title == 'Products') echo 'active' ?>" href="?model=products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="logout.php">LogOut</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--end of navbar-->