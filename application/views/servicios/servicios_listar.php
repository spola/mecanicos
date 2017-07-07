<table class="table table-responsive">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripci&oacute;n</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($servicios as $servicio):?>
        <tr>
            <td><?php echo $servicio->nombre?></td>
            <td><?php echo $servicio->descripcion?></td>
            <td>$<?php echo $servicio->precio?></td>            
        </tr>
        <?php endforeach?>
    </tbody>
</table>