<div class="barra">
    <div class="avatar">
        <p class="inicial"><?php echo substr($nombre, 0, 1);?></p>
    </div>
    <p><?php echo $nombre ?? '';?></p>
    <a class="boton" href="/logout">Cerrar Sessión</a>
</div>

<?php if(isset($_SESSION['admin'])) { ?>
    <div class="barra-servicios">
        <a href="/admin" class="boton">Ver Citas</a>
        <a href="/servicios" class="boton">Ver Servicios</a>
        <a href="/servicios/crear" class="boton">Crear Servicio</a>
    </div>
<?php } ?>