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


    <!-- STYLES -->

    
</head>
<body>

<div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
            <?php
                    if(session()->getFlashdata('status'))
                    {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Hey ! </strong><?= session()->getFlashdata('status');?>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php        
                    } 
                ?>

                <div class="card">
                    <div class="card-header">
                        <h5>
                            Product Data
                            <a href="<?= base_url('products/create') ?>" class="btn btn-info btn-sm float-end">Add</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table-table-bordered" id="users-list">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($products): ?>
                                    <?php foreach($products as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
