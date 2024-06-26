<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Repartidores</title>
        <link rel="stylesheet" href="../inicio.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

<body>
    <header class="header">
        <b>Logo</b>
        <div>
            <a href="../1_inicio.php">Regresar</a>
        </div>
    </header>

    <section class="first_section">
        <select id="categoria" name="categoria">
            <option value="" disabled selected hidden>Tipo de compra</option>
            <option value="alimentos_bebidas">Alimentos y bebidas</option>
            <option value="despensa_abarrotes">Despensa y abarrotes</option>
            <option value="salud_cuidado_personal">Salud y cuidado personal</option>
            <option value="enseres_domesticos">Enseres domésticos</option>
            <option value="accesorios_personales">Accesorios personales</option>
            <option value="telefonia_movil">Telefonía Móvil</option>
            <option value="electrodomesticos">Electrodomésticos</option>
            <option value="computo_electronica">Cómputo y electrónica</option>
        </select>
        <div>
            <label for="descripcion">Descripción de la compra</label>
        </div>
        <textarea id="descripcion" name="descripcion" placeholder="Descripción de la compra" maxlength="500" required></textarea>

        <div class="form-group">
            <label for="lugar1">Domicilio de Recolección del Dinero</label>
            <br>
            <input type="text" id="lugar1" name="direccion1" placeholder="Ingrese la dirección" required>
        </div>

        <div class="form-group">
            <label for="lugar3">Domicilio de Entrega de la Compra</label>
            <br>
            <input type="text" id="lugar3" name="direccion1" placeholder="Ingrese la dirección" required>
        </div>
        
    </section>

    <section class="second_section">
        <button type="button" class="button" onclick="confirmSolicitar();">Solicitar</button>
        <button type="button" class="button" onclick="window.location.href='3.2_realizar_pago.php';">Programar</button>
        <button type="button" class="button" onclick="window.location.href='3.3_realizar_compra.php';">Cancelar</button>
        <button type="button" class="button" onclick="window.location.href='3.3_realizar_compra.php';">Regresar</button>
    </section>

    <p>PIE DE PÁGINA</p>
    <footer class="footer">
        <b>Logo</b>
        <div>
            <a href="">Privcacidad</a>
            <a href="">Términos</a>
            <a href="">Ayuda</a>
        </div>
    </footer>

    <script>
        document.getElementById('descripcion').addEventListener('input', function () {
            let palabras = this.value.trim().split(/\s+/);
            document.getElementById('contador-palabras').textContent = palabras.length + ' palabras';
        });

        function agregarDireccion() {
            var select = document.getElementById('direccionExtra');
            var nuevaDireccion = document.createElement('option');
            nuevaDireccion.value = 'nuevaDireccion';
            nuevaDireccion.textContent = 'Nueva Dirección, Ciudad de México';
            select.appendChild(nuevaDireccion);
        }

        function toggleFields(checkboxId, extraFieldsId) {
            var checkbox = document.getElementById(checkboxId);
            var extraFields = document.getElementById(extraFieldsId);
            if (checkbox.checked) {
                extraFields.classList.remove('hidden');
            } else {
                extraFields.classList.add('hidden');
            }
        }

        function confirmSolicitar() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Estás seguro que deseas Solicitar este Servicio? Tu solicitud será enviada a todos nuestros repartidores inmediatamente.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'SÍ',
            cancelButtonText: 'NO'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '3.1_enviar_recoger_paquete.php';
            }
        });
        }
    </script>
</body>
</html>