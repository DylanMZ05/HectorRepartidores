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
            <option value="" disabled selected hidden>Tipo de Paquete</option>
            <option value="computo_electronica">Cómputo y electrónica</option>
            <option value="telefonia_movil">Telefonía Móvil</option>
            <option value="electrodomesticos">Electrodomésticos</option>
            <option value="enseres_domesticos">Enseres domésticos</option>
            <option value="accesorios_personales">Accesorios personales</option>
            <option value="salud_cuidado_personal">Salud y cuidado personal</option>
            <option value="alimentos_bebidas">Alimentos y bebidas</option>
            <option value="despensa_abarrotes">Despensa y abarrotes</option>
        </select>
        <div>
            <label for="descripcion">Descripción del Paquete</label>
        </div>
        <textarea id="descripcion" name="descripcion" placeholder="Describe el paquete" maxlength="500" required></textarea>

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

        <nav>
            <div class="declaración">
                <input type="checkbox" id="declara1" name="declara1" required>
                <label for="declara1">*Declaro bajo protesta de decir verdad que El Paquete no contiene droga, alcohol, armas o explosivos ni ninguna otra sustancia o material prohibido por las leyes de México.</label>
            </div>
            <div class="declaración">
                <input type="checkbox" id="declara2" name="declara2" required>
                <label for="declara2">*Declaro bajo protesta de decir verdad que El Paquete No requiere permiso especial para ser trasladado, enviado o recibido entre particulares dentro del territorio de Ciudad de México.</label>
            </div>
            <div class="declaración">
                <input type="checkbox" id="declara3" name="declara3" required>
                <label for="declara3">*Declaro bajo protesta de decir verdad que El Paquete tiene un peso en kilogramos menor a 15 Kg.</label>
            </div>
            <div class="declaración">
                <input type="checkbox" id="declara4" name="declara4" required>
                <label for="declara4">*Declaro bajo protesta de decir verdad que El Paquete tiene dimensiones menores a 60 cm de Alto, Largo y Fondo.</label>
            </div>
            <div class="declaración">
                <input type="checkbox" id="declara5" name="declara5" required>
                <label for="declara5">*Declaro bajo protesta de decir verdad que El Paquete tiene un valor monetario estimado menor a $1,000 pesos.</label>
            </div>
            <div class="declaración">
                <input type="checkbox" id="declara6" name="declara6" required>
                <label for="declara6">*Acepto el uso y tratamiento que se le darán a mis datos personales antes, durante y después del servicio.</label>
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