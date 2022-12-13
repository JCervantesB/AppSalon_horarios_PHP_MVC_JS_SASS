<h1 class="nombre-pagina">Crear Nueva Cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<?php
    include_once __DIR__ . '/../templates/barra.php';
?>

<div class="app" id="app">
    <div class="tabs">
        <button type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Informacion Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </div>

    <div class="seccion" id="paso-1">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación.</p>
        <div class="listado-servicios" id="servicios"></div>
    </div>
    <div class="seccion" id="paso-2">
        <h2>Tus Datos y Cita</h2>
        <p class="text-center">Coloca tus datos y fecha de tu cita.</p>

        <form class="formulario">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                    type="text"
                    id="nombre"
                    placeholder="Tu Nombre"
                    value="<?php echo $nombre; ?>"
                    disabled
                />
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input 
                    type="date"
                    id="fecha"
                    min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                />
            </div>
            
            <div class="campo">
                <label for="hora">Hora</label>
                <select id="hora">
                    <option value="">-- Selecciona --</option>
                </select>
                
                
            </div>
            <input type="hidden" id="id" value="<?php echo $id; ?>"/>
        </form>
    </div>
    <div class="seccion contenido-resumen" id="paso-3">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta.</p>
    </div>

    <div class="paginacion">
        <button id="anterior" class="boton">
            &laquo; Anterior
        </button>
        <button id="siguiente" class="boton">
            Siguiente &raquo;
        </button>
    </div>
</div>

<?php
    $script = "
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='build/js/app.js'></script>
    ";
?>