<?php if(isset($order) && isset($cols) && isset($data) && sizeof($data) > 0) { ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
        <?php
            foreach ($cols as $access){
                echo "<th>".$access."</th>";
            }
        ?>
        </thead>
        <tbody>
        <?php
        foreach($data as $user){
            echo '<tr>';
            foreach($cols as $access){
                echo '<td>'.$user[$access].'</td>';
            }
            echo '<td><button class="btn btn-primary">edit</button><button class="btn btn-danger">delete</button></td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

    <form class="form-group" method="POST">
        <select name="order" class="form-control">
            <option value="ASC">ascending</option>
            <option value="DESC" <?php if($order == "DESC") {echo "SELECTED";} ?>> descending</option>
        </select>
    </form>
    <script>
        document.querySelector('form select').onchange = function (e){
            document.querySelector('form').submit()
        }
    </script>
<?php } else {
    echo '<p class="alert alert-danger text-center m-3">There is no data</p>';
}?>