<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Códigos Postales</title>
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
        <h2>Lista de códigos postales</h2>
        <table id="postalTable">
            <thead>
                <tr>
                    <th>Código Postal</th>
                    <th>Cobro Base</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>25684</td>
                    <td>$50</td>
                    <td>
                        <button onclick="editarCodigoPostal(this)">Editar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="buttons">
            <button onclick="mostrarFormularioAgregar()">Agregar Código Postal</button>
            <button onclick="window.history.back()">Regresar</button>
        </div>
        
        <div id="formularioAgregar" style="display:none;">
            <h2>Nuevo Código Postal</h2>
            <form onsubmit="agregarCodigoPostal(event)">
                <label for="codigo-postal">Código Postal:</label><br>
                <input type="number" id="codigo-postal" name="codigo-postal" min="1001" max="99998" required><br><br>
                
                <div class="buttons">
                    <button type="submit">Agregar</button>
                    <button type="button" onclick="ocultarFormularioAgregar()">Cancelar</button>
                </div>
            </form>
        </div>

        <div id="formularioEditar" style="display:none;">
            <h2>Editar Código Postal</h2>
            <form onsubmit="guardarEdicionCodigoPostal(event)">
                <input type="hidden" id="edit-row-index">
                <label for="editar-codigo-postal">Código Postal:</label><br>
                <input type="number" id="editar-codigo-postal" name="codigo-postal" min="10000" max="99999" required><br><br>
                
                <label for="editar-cobro-base">Cobro base:</label><br>
                <input type="number" id="editar-cobro-base" name="cobro-base" min="50" max="100" required readonly><br><br>
                
                <div class="buttons">
                    <button type="submit">Guardar</button>
                    <button type="button" onclick="ocultarFormularioEditar()">Cancelar</button>
                </div>
            </form>
        </div>
        
        <div class="note">
            <p>Los usuarios con Membresía Básica pueden agregar máximo 3 códigos postales.</p>
        </div>
    </nav>
</section>

<script>
    function editarCodigoPostal(button) {
        const row = button.closest('tr');
        const rowIndex = row.rowIndex - 1;
        const codigoPostal = row.cells[0].innerText;
        const cobroBase = row.cells[1].innerText.replace('$', '');
        
        document.getElementById('edit-row-index').value = rowIndex;
        document.getElementById('editar-codigo-postal').value = codigoPostal;
        document.getElementById('editar-cobro-base').value = cobroBase;

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
                text: 'No puedes agregar más de 3 códigos postales. Para ampliar tu límite de códigos postales, actualiza a una membresía superior.',
            });
            return;
        }

        const codigoPostal = document.getElementById('codigo-postal').value;

        const newRow = table.insertRow();

        const cell1 = newRow.insertCell(0);
        const cell2 = newRow.insertCell(1);
        const cell3 = newRow.insertCell(2);

        cell1.innerHTML = codigoPostal;
        cell2.innerHTML = `$50`;
        cell3.innerHTML = `
            <button onclick="editarCodigoPostal(this)">Editar</button>
            <button onclick="eliminarCodigoPostal(this)">Eliminar</button>
        `;

        ocultarFormularioAgregar();
        document.getElementById('codigo-postal').value = '';
    }

    function guardarEdicionCodigoPostal(event) {
        event.preventDefault();
        const rowIndex = document.getElementById('edit-row-index').value;
        const codigoPostal = document.getElementById('editar-codigo-postal').value;
        const cobroBase = document.getElementById('editar-cobro-base').value;

        const table = document.getElementById('postalTable').getElementsByTagName('tbody')[0];
        const row = table.rows[rowIndex];

        row.cells[0].innerText = codigoPostal;
        row.cells[1].innerText = `$${cobroBase}`;

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