<table class="table table-bordered">
    <tr>
         
        <th>Estacion</th>
        <th>Ubicacion</th>
        <th>Presion</th>
    </tr>
    <?php foreach ($data as $esta): ?>

    
        <tr>
            
            <td><?= $esta->name ?></td>
            <td><?=$esta->live_data->data->location?></td>
            <td><?=$esta->live_data->data->davis_current_observation->pressure_day_high_in?></td>
        </tr>
    <?php endforeach ?>
</table>