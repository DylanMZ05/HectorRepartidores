<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Repartidores</title>
        <link rel="stylesheet" href="inicio.css">
    </head>

<body>
    <header class="header">
        <b>Logo</b>
        <div>
            <a href="1_inicio.php">Regresar</a>
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

        <nav>
            <input type="checkbox" id="pagar1" name="pagar1" onclick="toggleFields('pagar1', 'extraFields1')">
            <label for="pagar1">Pagar al recolectar</label>
            <br>
            <div id="extraFields1" class="hidden">
                <label for="cantidad1">Cantidad:</label>
                <input type="number" id="cantidad1" name="cantidad1" max="1000" placeholder="Cantidad (max $1000)">
                <br>
                <div class="form-group">
                    <label for="lugar1">Entregar dinero en:</label>
                    <input type="text" id="lugar1" name="direccion1" placeholder="Ingrese la dirección" required>
                </div>
            </div>
        </nav>

        <nav>
            <div class="form-group">
                <label for="direccion2">Domicilio de Entrega:</label>
                <br>
                <input type="text" id="direccion2" name="direccion2" placeholder="Ingrese la dirección" required>
            </div>
            <input type="checkbox" id="pagar2" name="pagar2" onclick="toggleFields('pagar2', 'extraFields2')">
            <label for="pagar2">Pagar al recolectar</label>
            <br>
            <div id="extraFields2" class="hidden">
                <label for="cantidad2">Cantidad:</label>
                <input type="number" id="cantidad2" name="cantidad2" max="1000" placeholder="Cantidad (max $1000)">
                <br>
                <div class="form-group">
                    <label for="lugar2">Entregar dinero en:</label>
                    <input type="text" id="lugar2" name="direccion3" placeholder="Ingrese la dirección" required>
                </div>
            </div>
        </nav>

        
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
    </script>
</body>
</html>