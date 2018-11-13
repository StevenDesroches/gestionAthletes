<?php

include 'DB.php';
$db = new DB();
$tblName = 'genres';
if (isset($_POST['action_type']) && !empty($_POST['action_type'])) {
    if ($_POST['action_type'] == 'data') {
        $conditions['where'] = array('id' => $_POST['id']);
        $conditions['return_type'] = 'single';
        $genre = $db->getRows($tblName, $conditions);
        echo json_encode($genre);
    } elseif ($_POST['action_type'] == 'view') {
        $genres = $db->getRows($tblName, array('order_by' => 'id DESC'));
        if (!empty($genres)) {
            $count = 0;
            foreach ($genres as $genre): $count++;
                echo '<tr>';
                echo '<td>#' . $count . '</td>';
                echo '<td>' . $genre['description'] . '</td>'
                echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editGenre(\'' . $genre['id'] . '\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?genreAction(\'delete\',\'' . $genre['id'] . '\'):false;"></a></td>';
                echo '</tr>';
            endforeach;
        }else {
            echo '<tr><td colspan="5">No genre(s) found......</td></tr>';
        }
    } elseif ($_POST['action_type'] == 'add') {
        $genreData = array(
            'description' => $_POST['description']
        );
        $insert = $db->insert($tblName, $genreData);
        echo $insert ? 'ok' : 'err';
    } elseif ($_POST['action_type'] == 'edit') {
        if (!empty($_POST['id'])) {
            $genreData = array(
                'description' => $_POST['description'],
            );
            $condition = array('id' => $_POST['id']);
            $update = $db->update($tblName, $genreData, $condition);
            echo $update ? 'ok' : 'err';
        }
    } elseif ($_POST['action_type'] == 'delete') {
        if (!empty($_POST['id'])) {
            $condition = array('id' => $_POST['id']);
            $delete = $db->delete($tblName, $condition);
            echo $delete ? 'ok' : 'err';
        }
    }
    exit;
}

