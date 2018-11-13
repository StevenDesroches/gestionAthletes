<?php
$urlToRestApi = $this->Url->build('/api/genres', true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Genres/index', ['block' => 'scriptBottom']);
?>
        <?php
        echo $this->Html->css([
            'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'
        ]);
        ?>
<nav id="actions-sidebar">
    <ul class="side-nav">
<div class="dropdown show">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Menu
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="http://localhost/GestionAthletes/genres">Genres No Admin</a><br>
    <a class="dropdown-item" href="http://localhost/GestionAthletes/">List Athletes</a><br>
    <a class="dropdown-item" href="http://localhost/GestionAthletes/clubs">List Clubs</a><br>
    <a class="dropdown-item" href="http://localhost/GestionAthletes/users">List Users</a><br>
    <a class="dropdown-item" href="http://localhost/GestionAthletes/events">List Events</a><br>
    <a class="dropdown-item" href="http://localhost/GestionAthletes/eventstypes">List Events Types</a>
  </div>
</div>
    </ul>
</nav>
<div class="container">
    <div class="row">
        <div class="panel panel-default genres-content">
            <div class="panel-heading">Genres <a href="javascript:void(0);" class="glyphicon glyphicon-plus" id="addLink" onclick="javascript:$('#addForm').slideToggle();">Add</a></div>

            <div class="panel-body none formData" id="addForm">
                <h2 id="actionLabel">Add Genre</h2>
                <form class="form" id="genreAddForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="description"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#addForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="genreAction('add')">Add Genre</a>
                    <!-- input type="submit" class="btn btn-success" id="addButton" value="Add Genre" -->
                </form>
            </div>
			
            <div class="panel-body none formData" id="editForm">
                <h2 id="actionLabel">Edit Genre</h2>
                <form class="form" id="genreEditForm" enctype='application/json'>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" id="descriptionEdit"/>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="idEdit"/>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('#editForm').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" onclick="genreAction('edit')">Update Genre</a>
                    <!-- input type="submit" class="btn btn-success" id="editButton" value="Update Genre" -->
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="genreData">
                    <?php
                    $count = 0;
                    foreach ($genres as $genre): $count++;
                        ?>
                        <tr>
                            <td><?php echo '#' . $count; ?></td>
                            <td><?php echo $genre['description']; ?></td>
                            <td>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editGenre('<?php echo $genre['id']; ?>')"></a>
                                <a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete data?') ? genreAction('delete', '<?php echo $genre['id']; ?>') : false;"></a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                    <tr><td colspan="5">No genre(s) found......</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

