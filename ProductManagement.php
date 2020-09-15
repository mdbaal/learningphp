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
            <h2>Product List<h2>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6 mx-auto">
            <a class="btn btn-primary" href="/ordersystem/">Dashboard</a>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addProductModal">Add Product
            </button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#removeProductModal">Remove
                Product
            </button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editProductModal">Edit
                Product
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <?php include "src/Products/GetProductsFromDB.php"; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addProductModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add new Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="OldCode/AddProductToDB.php" method="post">
                        <label for="productNameAdd">Product Name</label>
                        <input class="form-control" type="text" required id="productNameAdd" name="productName">

                        <label for="productDescAdd">Product Description</label>
                        <textarea class="form-control" type="text" required id="productDescAdd" name="productDesc"></textarea>

                        <label for="productPriceAdd">Product Price</label>
                        <input class="form-control" type="number" required id="productPriceAdd" name="productPrice">

                        <input class="btn btn-primary my-2" type="submit" value="Add Product">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removeProductModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remove Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="OldCode/RemoveProductFromDB.php" method="post">
                        <label for="productIDRemove">ProductID</label>
                        <input class="form-control" type="text" required id="productIDRemove" name="productID">

                        <input class="btn btn-primary my-2" type="submit" value="Remove Product">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editProductModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-group" action="OldCode/EditProductInDB.php" method="post">
                        <label for="productIDEdit">Product ID</label>
                        <input class="form-control" type="text" id="productIDEdit" name="productID">

                        <label for="productNameEdit">Product Name</label>
                        <input class="form-control" type="text" id="productNameEdit" name="productName">

                        <label for="productStockEdit">Product Stock</label>
                        <textarea class="form-control" type="text" id="productDescEdit" name="productDesc"></textarea>

                        <label for="producPriceEdit">Product Price</label>
                        <input class="form-control" type="nuber" id="productPriceEdit" name="productPrice">

                        <input class="btn btn-primary my-2" type="submit" value="Edit Product">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>