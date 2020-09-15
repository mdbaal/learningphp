<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <title>Order system</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-3">
            <h2>Order List<h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6 mx-auto">
            <a class="btn btn-primary" href="/ordersystem/">Dashboard</a>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addOrderModal">Add Order
            </button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#removeOrderModal">Remove
                Order
            </button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editOrderModal">Edit
                Order
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php include "src/Orders/GetOrdersFromDB.php"; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addOrderModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new Order</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="src/Orders/AddOrderToDB.php" method="post">
                        <label for="OrderIDAdd">Order ID</label>
                        <input class="form-control" type="text" required id="OrderIDAdd" name="OrderID">
                        <label for="OrderNameAdd">Order Name</label>
                        <input class="form-control" type="text" required id="OrderNameAdd" name="OrderName">
                        <label for="OrderNameAdd">Order Stock</label>
                        <input class="form-control" type="text" required id="OrderStockAdd" name="OrderStock">

                        <input class="btn btn-primary my-2" type="submit" value="Add Order">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeOrderModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remove Order</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="src/Orders/RemoveOrderFromDB.php" method="post" target="_self">
                        <label for="OrderIDRemove">OrderID</label>
                        <input class="form-control" type="text" required id="OrderIDRemove" name="OrderID">

                        <input class="btn btn-primary my-2" type="submit" value="Remove Order">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editOrderModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Order</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="src/Orders/EditOrderInDB.php" method="post" target="_self">
                        <label for="OrderIDEdit">Order ID</label>
                        <input class="form-control" type="text" id="OrderIDEdit" name="OrderID">
                        <label for="OrderNameEdit">Order Name</label>
                        <input class="form-control" type="text" id="OrderNameEdit" name="OrderName">
                        <label for="OrderStockEdit">Order Stock</label>
                        <input class="form-control" type="text" id="OrderStockEdit" name="OrderStock">

                        <input class="btn btn-primary my-2" type="submit" value="Edit Order">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>