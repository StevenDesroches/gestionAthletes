<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="basic.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="crud.js"></script>
        <title>Crud PHP Ajax Example</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="panel panel-default genres-content">
                    <div class="panel-heading">Genres <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>
                    <div class="panel-body none formData" id="addForm">
                        <h2 id="actionLabel">Add Genre</h2>
                        <form class="form" id="genreForm">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email"/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone"/>
                            </div>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="genreAction('add')">Add Genre</a>
                        </form>
                    </div>
                    <div class="panel-body none formData" id="editForm">
                        <h2 id="actionLabel">Edit Genre</h2>
                        <form class="form" id="genreForm">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="nameEdit"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="emailEdit"/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" id="phoneEdit"/>
                            </div>
                            <input type="hidden" class="form-control" name="id" id="idEdit"/>
                            <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="genreAction('edit')">Update Genre</a>
                        </form>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="genreData">
                            <?php
                            include 'db.php';
                            $db = new DB();
                            $genres = $db->getRows('genres', array('order_by' => 'id DESC'));
                            if (!empty($genres)): $count = 0;
                                foreach ($genres as $genre): $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo '#' . $count; ?></td>
                                        <td><?php echo $genre['name']; ?></td>
                                        <td><?php echo $genre['email']; ?></td>
                                        <td><?php echo $genre['phone']; ?></td>
                                        <td>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editGenre('<?php echo $genre['id']; ?>')"></a>
                                            <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? genreAction('delete', '<?php echo $genre['id']; ?>') : false;"></a>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else: ?>
                                <tr><td colspan="5">No genre(s) found......</td></tr>
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
