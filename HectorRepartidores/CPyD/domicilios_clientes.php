<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Direcciones</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons button {
            margin-right: 10px;
        }
        .note {
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<section class="first_section">
    <nav class="container">
        <h2>Lista de Direcciones</h2>
        <table id="postalTable">
            <thead>
                <tr>
                    <th>Nombre del Lugar</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Casa</td>
                    <td>Dirección 123</td>
                    <td>
                        <button onclick="editarCodigoPostal(this)">Editar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="buttons">
            <button onclick="mostrarFormularioAgregar()">Agregar Dirección</button>
            <button onclick="window.history.back()">Regresar</button>
        </div>
        
        <div id="formularioAgregar" style="display:none;">
            <h2>Nueva Dirección</h2>
            <form onsubmit="agregarCodigoPostal(event)">
                <label for="nombre-lugar">Nombre del lugar:</label><br>
                <input type="text" id="nombre-lugar" name="nombre-lugar" required><br><br>

                <label for="direccion">Dirección:</label><br>
                <input type="text" id="direccion" name="direccion" required><br><br>

                <label for="tipo-vialidad">Tipo de vialidad:</label><br>
                <select id="tipo-vialidad" name="tipo-vialidad" required>
                    <option value="Calle">Calle</option>
                    <option value="Avenida">Avenida</option>
                    <option value="Bulevar">Bulevar</option>
                    <option value="Calzada">Calzada</option>
                    <option value="Andador">Andador</option>
                    <option value="Privada">Privada</option>
                </select><br><br>

                <label for="nombre-vialidad">Nombre de la vialidad:</label><br>
                <input type="text" id="nombre-vialidad" name="nombre-vialidad" required><br><br>

                <label for="numero-exterior">Número Exterior:</label><br>
                <input type="text" id="numero-exterior" name="numero-exterior" required><br><br>

                <label for="numero-interior">Número Interior:</label><br>
                <input type="text" id="numero-interior" name="numero-interior"><br><br>

                <label for="colonia">Colonia:</label><br>
                <input type="text" id="colonia" name="colonia" required><br><br>

                <label for="codigo-postal">Código Postal:</label><br>
                <input type="text" id="codigo-postal" name="codigo-postal" required><br><br>

                <label for="pais">País:</label><br>
                <input type="text" id="pais" name="pais" required><br><br>

                <label for="estado">Estado:</label><br>
                <input type="text" id="estado" name="estado" required><br><br>

                <label for="ciudad">Ciudad:</label><br>
                <input type="text" id="ciudad" name="ciudad" required><br><br>

                <label for="referencia">Referencia:</label><br>
                <input type="text" id="referencia" name="referencia" required><br><br>

                <div class="buttons">
                    <button type="submit">Agregar</button>
                    <button type="button" onclick="ocultarFormularioAgregar()">Cancelar</button>
                </div>
            </form>
        </div>

        <div id="formularioEditar" style="display:none;">
            <h2>Editar Dirección</h2>
            <form onsubmit="guardarEdicionCodigoPostal(event)">
                <input type="hidden" id="edit-row-index">
                
                <label for="editar-nombre-lugar">Nombre del lugar:</label><br>
                <input type="text" id="editar-nombre-lugar" name="nombre-lugar" required><br><br>

                <label for="editar-direccion">Dirección:</label><br>
                <input type="text" id="editar-direccion" name="direccion" required><br><br>

                <label for="editar-tipo-vialidad">Tipo de vialidad:</label><br>
                <select id="editar-tipo-vialidad" name="tipo-vialidad" required>
                    <option value="Calle">Calle</option>
                    <option value="Avenida">Avenida</option>
                    <option value="Bulevar">Bulevar</option>
                    <option value="Calzada">Calzada</option>
                    <option value="Andador">Andador</option>
                    <option value="Privada">Privada</option>
                </select><br><br>

                <label for="editar-nombre-vialidad">Nombre de la vialidad:</label><br>
                <input type="text" id="editar-nombre-vialidad" name="nombre-vialidad" required><br><br>

                <label for="editar-numero-exterior">Número Exterior:</label><br>
                <input type="text" id="editar-numero-exterior" name="numero-exterior" required><br><br>

                <label for="editar-numero-interior">Número Interior:</label><br>
                <input type="text" id="editar-numero-interior" name="numero-interior"><br><br>

                <label for="editar-colonia">Colonia:</label><br>
                <input type="text" id="editar-colonia" name="colonia" required><br><br>

                <label for="editar-codigo-postal">Código Postal:</label><br>
                <input type="text" id="editar-codigo-postal" name="codigo-postal" required><br><br>

                <label for="editar-pais">País:</label><br>
                <input type="text" id="editar-pais" name="pais" required><br><br>

                <label for="editar-estado">Estado:</label><br>
                <input type="text" id="editar-estado" name="estado" required><br><br>

                <label for="editar-ciudad">Ciudad:</label><br>
                <input type="text" id="editar-ciudad" name="ciudad" required><br><br>

                <label for="editar-referencia">Referencia:</label><br>
                <input type="text" id="editar-referencia" name="referencia" required><br><br>

                <div class="buttons">
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="ocultarFormularioEditar()">Cancelar</button>
                </div>
            </form>
        </div>
        
        <div class="note">
            <p>Los usuarios con Membresía Básica pueden agregar máximo 3 direcciones.</p>
        </div>
    </nav>
</section>

<script>
    function editarCodigoPostal(button) {
        const row = button.closest('tr');
        const rowIndex = row.rowIndex - 1;
        const nombreLugar = row.cells[0].innerText;

        const direccion = row.cells[1].innerText;

        const direccionCompleta = row.cells[1].getAttribute('data-direccion-completa');
        const [tipoVialidad, nombreVialidad, numeroExterior, numeroInterior, colonia, codigoPostal, pais, estado, ciudad, referencia] = direccionCompleta.split(', ');

        document.getElementById('edit-row-index').value = rowIndex;
        document.getElementById('editar-nombre-lugar').value = nombreLugar;
        document.getElementById('editar-direccion').value = direccion;
        document.getElementById('editar-tipo-vialidad').value = tipoVialidad;
        document.getElementById('editar-nombre-vialidad').value = nombreVialidad;
        document.getElementById('editar-numero-exterior').value = numeroExterior;
        document.getElementById('editar-numero-interior').value = numeroInterior;
        document.getElementById('editar-colonia').value = colonia;
        document.getElementById('editar-codigo-postal').value = codigoPostal;
        document.getElementById('editar-pais').value = pais;
        document.getElementById('editar-estado').value = estado;
        document.getElementById('editar-ciudad').value = ciudad;
        document.getElementById('editar-referencia').value = referencia;

        document.getElementById('formularioEditar').style.display = 'block';
        document.getElementById('formularioAgregar').style.display = 'none';
    }

    function eliminarCodigoPostal(button) {
        const row = button.closest('tr');
        row.parentNode.removeChild(row);
        Swal.fire({
            icon: 'success',
            title: 'Código Postal Eliminado',
            showConfirmButton: false,
            timer: 1500
        });
    }

    function mostrarFormularioAgregar() {
        document.getElementById('formularioAgregar').style.display = 'block';
        document.getElementById('formularioEditar').style.display = 'none';
    }

    function ocultarFormularioAgregar() {
        document.getElementById('formularioAgregar').style.display = 'none';
    }

    function mostrarFormularioEditar() {
        document.getElementById('formularioEditar').style.display = 'block';
    }

    function ocultarFormularioEditar() {
        document.getElementById('formularioEditar').style.display = 'none';
    }

    function agregarCodigoPostal(event) {
        event.preventDefault();
        const table = document.getElementById('postalTable').getElementsByTagName('tbody')[0];
        const rowCount = table.rows.length;

        if (rowCount >= 3) {
            Swal.fire({
                icon: 'warning',
                title: 'Límite Alcanzado',
                text: 'No puedes agregar más de 3 direcciones. Para ampliar tu límite, actualiza a una membresía superior.',
            });
            return;
        }

        const nombreLugar = document.getElementById('nombre-lugar').value;
        const direccion = document.getElementById('direccion').value;
        const tipoVialidad = document.getElementById('tipo-vialidad').value;
        const nombreVialidad = document.getElementById('nombre-vialidad').value;
        const numeroExterior = document.getElementById('numero-exterior').value;
        const numeroInterior = document.getElementById('numero-interior').value;
        const colonia = document.getElementById('colonia').value;
        const codigoPostal = document.getElementById('codigo-postal').value;
        const pais = document.getElementById('pais').value;
        const estado = document.getElementById('estado').value;
        const ciudad = document.getElementById('ciudad').value;
        const referencia = document.getElementById('referencia').value;

        const direccionCompleta = `${direccion}, ${tipoVialidad}, ${nombreVialidad}, ${numeroExterior}, ${numeroInterior}, ${colonia}, ${codigoPostal}, ${pais}, ${estado}, ${ciudad}, ${referencia}`;

        const newRow = table.insertRow();

        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);

        cell1.innerHTML = nombreLugar;
        cell2.innerHTML = direccion;
        cell2.setAttribute('data-direccion-completa', direccionCompleta);
        cell3.innerHTML = `
            <button onclick="editarCodigoPostal(this)">Editar</button>
            <button onclick="eliminarCodigoPostal(this)">Eliminar</button>
        `;

        ocultarFormularioAgregar();
        document.getElementById('nombre-lugar').value = '';
        document.getElementById('direccion').value = '';
        document.getElementById('tipo-vialidad').value = '';
        document.getElementById('nombre-vialidad').value = '';
        document.getElementById('numero-exterior').value = '';
        document.getElementById('numero-interior').value = '';
        document.getElementById('colonia').value = '';
        document.getElementById('codigo-postal').value = '';
        document.getElementById('pais').value = '';
        document.getElementById('estado').value = '';
        document.getElementById('ciudad').value = '';
        document.getElementById('referencia').value = '';
    }

    function guardarEdicionCodigoPostal(event) {
        event.preventDefault();
        const rowIndex = document.getElementById('edit-row-index').value;
        const nombreLugar = document.getElementById('editar-nombre-lugar').value;
        const direccion = document.getElementById('editar-direccion').value;
        const tipoVialidad = document.getElementById('editar-tipo-vialidad').value;
        const nombreVialidad = document.getElementById('editar-nombre-vialidad').value;
        const numeroExterior = document.getElementById('editar-numero-exterior').value;
        const numeroInterior = document.getElementById('editar-numero-interior').value;
        const colonia = document.getElementById('editar-colonia').value;
        const codigoPostal = document.getElementById('editar-codigo-postal').value;
        const pais = document.getElementById('editar-pais').value;
        const estado = document.getElementById('editar-estado').value;
        const ciudad = document.getElementById('editar-ciudad').value;
        const referencia = document.getElementById('editar-referencia').value;

        const direccionCompleta = `${direccion}, ${tipoVialidad}, ${nombreVialidad}, ${numeroExterior}, ${numeroInterior}, ${colonia}, ${codigoPostal}, ${pais}, ${estado}, ${ciudad}, ${referencia}`;

        const table = document.getElementById('postalTable').getElementsByTagName('tbody')[0];
        const row = table.rows[rowIndex];

        row.cells[0].innerText = nombreLugar;
        row.cells[1].innerText = direccion;
        row.cells[1].setAttribute('data-direccion-completa', direccionCompleta);

        ocultarFormularioEditar();
        Swal.fire({
            icon: 'success',
            title: 'Cambios Guardados',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>

</body>
</html>