<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro Cliente</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .error {
        color: #000;
        font-weight: bold;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-checkbox label {
        font-weight: normal;
    }

    #imagePreviewContainer {
        width: 150px;
        height: 150px;
        background-color: #f0f0f0;
        border-radius: 50%;
        border: 1px solid #000;
        margin: 5px 0;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        overflow: hidden;
    }
    #previewImage {
        max-width: 100%;
        max-height: 100%;
        display: none;
    }

    #imageInput {
        visibility: hidden;
    }

    #imageInput {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    #imageInput + label {
        font-size: 1em;
        font-weight: 300;
        color: white;
        background-color: #4CAF50;
        display: inline-block;
        cursor: pointer;
        padding: 1px 5px;
        border-radius: 5px;
    }
    #imageInput + label:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <section class="first_section">
        <h2>Registrarse</h2>
        <div id="errorContainer" class="error" style="display: none;">
            La imagen seleccionada debe tener una relación de aspecto 1:1.
        </div>
        
        <div id="imagePreviewContainer">
            <img id="previewImage" src="#" alt="Vista previa de la imagen">
        </div>

        <form id="imageForm" enctype="multipart/form-data">

            <div>
                <input type="file" id="imageInput" accept="image/*">
                <label for="imageInput">Selecciona una imagen</label>
                <br>
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" required><br><br>
            </div>


            <div class="form-group">
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" required><br><br>
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label><br>
                <input type="text" id="apellido" name="apellido" required><br><br>
            </div>

            <div class="form-group">
                <label for="whatsapp">WhatsApp</label><br>
                <input type="text" id="whatsapp" name="whatsapp" pattern="[0-9]{10}" required><br><br>
            </div>

            <div class="form-group">
                <label for="codigo_postal">Mi Código Postal</label><br>
                <input type="text" id="codigo_postal" name="codigo_postal" pattern="[0-9]{5}" required><br><br>
            </div>

            <div class="form-group form-checkbox">
                <label>Configuración</label><br>
                <input type="checkbox" id="cobrar_efectivo" name="configuracion" value="Cobrar en efectivo">
                <label for="cobrar_efectivo">Cobrar en efectivo</label><br>
                <input type="checkbox" id="cobrar_transferencia" name="configuracion" value="Cobrar con Transferencia">
                <label for="cobrar_transferencia">Cobrar con Transferencia</label><br>
                <input type="checkbox" id="solo_cp_cliente" name="configuracion" value="Sólo Clientes con mi Código Postal">
                <label for="solo_cp_cliente">Sólo Clientes con mi Código Postal</label><br>
                <input type="checkbox" id="solo_3_estrellas" name="configuracion" value="Sólo Clientes con 3 Estrellas o más">
                <label for="solo_3_estrellas">Sólo Clientes con 3 Estrellas o más</label><br><br>
            </div>

            <div class="form-group">
                <label for="banco">Banco para transferencias</label><br>
                <input type="text" id="banco" name="banco"><br><br>
            </div>

            <div class="form-group">
                <label for="beneficiario">Beneficiario</label><br>
                <input type="text" id="beneficiario" name="beneficiario"><br><br>
            </div>

            <div class="form-group">
                <label for="tarjeta">Tarjeta (16 dígitos)</label><br>
                <input type="text" id="tarjeta" name="tarjeta" pattern="[0-9]{16}"><br><br>
            </div>

            <div class="form-group">
                <label for="current_password">Contraseña actual</label><br>
                <input type="password" id="current_password" name="current_password"><br><br>
            </div>

            <div class="form-group">
                <label for="new_password">Nueva contraseña</label><br>
                <input type="password" id="new_password" name="new_password" minlength="8"><br><br>
            </div>

            <div class="form-group">
                <label for="repeat_password">Repetir contraseña</label><br>
                <input type="password" id="repeat_password" name="repeat_password" minlength="8"><br><br>
            </div>

            <button type="submit">Actualizar</button>
            <button type="button" onclick="cancel()">Regresar</button>
        </form>
    </section>

    <script>
        document.getElementById('imageForm').addEventListener('submit', function(event) {
            event.preventDefault();
            validateAndRegister();
        });

        function validateAndRegister() {
            const nombre = document.getElementById('nombre').value;
            const apellido = document.getElementById('apellido').value;
            const whatsapp = document.getElementById('whatsapp').value;
            const codigoPostal = document.getElementById('codigo_postal').value;
            const newPassword = document.getElementById('new_password').value;
            const repeatPassword = document.getElementById('repeat_password').value;

            const nombreCompleto = nombre + ' ' + apellido;

            if (nombre.length === 0 || apellido.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor, ingresa tanto el nombre como el apellido.'
                });
                return;
            }

            if (nombreCompleto.length <= 10) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El nombre completo debe tener más de 10 caracteres.'
                });
                return;
            }

            const whatsappNumber = parseInt(whatsapp);
            if (whatsappNumber < 1000000000 || whatsappNumber >= 9999999999) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El número de WhatsApp debe ser un número válido.'
                });
                return;
            }

            const codigoPostalNumber = parseInt(codigoPostal);
            if (codigoPostalNumber <= 1000 || codigoPostalNumber >= 99999) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El código postal debe ser un número válido.'
                });
                return;
            }

            if (newPassword && newPassword.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La nueva contraseña debe tener al menos 8 caracteres.'
                });
                return;
            }

            if (newPassword !== repeatPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las nuevas contraseñas no coinciden.'
                });
                return;
            }

            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: '¡Se ha registrado exitosamente!'
            }).then(() => {
                document.getElementById('imageForm').reset();
            });
        }

        function cancel() {
            window.location.href = '../1_inicio.php';
        }
    </script>
</body>
</html>