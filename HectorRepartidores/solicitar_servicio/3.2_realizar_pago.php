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
            <a href="../index.php">Regresar</a>
        </div>
    </header>

    <section class="first_section">
        <select id="categoria" name="categoria">
            <option value="" disabled selected hidden>Pago a realizar</option>
            <option value="recibo_agua">Recibo de Agua</option>
            <option value="recibo_luz">Recibo de Luz</option>
            <option value="recibo_gas">Recibo de Gas</option>
            <option value="recibo_tv">Recibo de TV</option>
            <option value="recibo_telefonia_internet">Recibo de Telefonía/Internet</option>
            <option value="pago_oficina">Pago en Oficina</option>
            <option value="pago_banco">Pago en Banco</option>
        </select>
        <div>
            <label for="descripcion">Notas sobre el Pago</label>
        </div>
        <textarea id="descripcion" name="descripcion" placeholder="Detalles del pago" maxlength="500" required></textarea>

        <div class="form-group">
            <label for="lugar1">Domicilio de Recolección del Recibo y Dinero</label>
            <br>
            <input type="text" id="lugar1" name="direccion1" placeholder="Ingrese la dirección" required>
        </div>

        <div class="form-group">
            <label for="lugar2">Domicilio de Pago del Recibo</label>
            <br>
            <input type="text" id="lugar2" name="direccion1" placeholder="Ingrese la dirección" required>
        </div>

        <div class="form-group">
            <label for="lugar3">Domicilio de Entrega del Recibo Pagado</label>
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