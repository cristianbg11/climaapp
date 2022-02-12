<h2>Lectura Estaciones Actual</h2>
<table class="table table-bordered table-striped" style="background-color:white">
    <thead>
        <tr>

            <th>Estacion</th>
            <th>Ubicacion</th>
            <th>Fecha</th>
            <th>Temp</th>
            <th>ET</th>
            <th>Precipitacion/Lluvia</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $esta) : ?>



            <tr>

                <td><?= $esta->name ?></td>
                <?php if (!empty($esta->live_data->data->location)) : ?>
                    <td>
                        <?= $esta->live_data->data->location ?>
                    </td>
                <?php endif ?>
                <td>
                <?php if (!empty($esta->live_data->data->observation_time_rfc822)):?>
                <?=date('Y-m-d H:i',strtotime($esta->live_data->data->observation_time_rfc822))?>
                <?php endif;?>
                </td>
                <td>
                    <?php if (!empty($esta->live_data->data->davis_current_observation->pressure_day_low_in)) : ?>
                        <?= $esta->live_data->data->davis_current_observation->pressure_day_low_in ?>
                    <?php endif ?>
                </td>

                <td>
                    <?php if (!empty($esta->live_data->data->davis_current_observation->et_day)) : ?>
                        <?= $esta->live_data->data->davis_current_observation->et_day ?>
                    <?php endif ?>
                </td>

                <td>
                    <?php if (!empty($esta->live_data->data->davis_current_observation->rain_day_in)) : ?>
                        <?= $esta->live_data->data->davis_current_observation->rain_day_in ?>
                    <?php endif ?>
                </td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>