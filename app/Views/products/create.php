<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body>

<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Add Student
                            <a href="<?= base_url('products/create') ?>" class="btn btn-danger btn-sm float-end">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('products/add') ?>" method="POST">
                            <div class="form-group mb-2">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required="true">
                            </div>
                            <div class="form-group mb-2">
                                <label>Product Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Product Title" required="true">
                            </div>
                            <div class="form-group mb-2">
                                <label>Product Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Enter Product Description" required="true">
                            </div>
                            <div class="form-group mb-2">
                                <label>Product Price</label>
                                <input type="text" name="price" class="form-control" placeholder="Enter Product Price" required="true">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-2">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
