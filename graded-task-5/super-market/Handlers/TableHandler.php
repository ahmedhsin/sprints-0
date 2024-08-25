<?php

class TableHandler
{
    private $model;
    private $columns;

    public function __construct($model)
    {
        $this->model = $model;
        $this->columns = $this->model->get_columns();
    }

    public function table_header($include_controllers = true)
    {
        echo '<tr>';
        foreach ($this->columns as $column) {
            echo '<th scope="col">' . $column . '</th>';
        }
        if($include_controllers){
            echo '<th scope="col">Controllers</th>';
        }
        echo '</tr>';
    }

    public function table_body($data, $include_controllers = true)
    {
        $model_name = strtolower(get_class($this->model));
        foreach ($data as $row) {
            echo '<tr>';
            foreach ($this->columns as $col) {
                if($col == 'image'){
                    echo '<td name="'.$col.'"><img src="assets/'.$row[$col].'" alt="image" class="product-img"></td>';
                }else{
                    echo '<td name="'.$col.'">' . $row[$col] . '</td>';
                }
            }
            if ($include_controllers) {
                echo '<td class=""><div class="d-flex gap-2"><a href="update-'.$model_name.'/?id=' . $row['id'] . '" class="btn btn-outline-primary">Edit</a><a href="request-handler.php?model='.$model_name.'&action=delete&id=' . $row['id'] . '" class="btn btn-outline-danger">Delete</a></div></td>';
            }
            echo '</tr>';
        }
    }
}