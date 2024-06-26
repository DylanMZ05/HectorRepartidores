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
            <input type="file" id="imageInput" accept="image/*">
            <label for="imageInput">Selecciona una imagen</label>
            <br>
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellido">Apellido</label><br>
            <input type="text" id="apellido" name="apellido" required><br><br>

            <label for="whatsapp">WhatsApp</label><br>
            <input type="number" id="whatsapp" name="whatsapp" required><br><br>

            <label for="codigo_postal">Código Postal</label><br>
            <input type="number" id="codigo_postal" name="codigo_postal" min="10001" max="99998" required><br><br>

            <label>Configuración</label><br>
            <input type="checkbox" id="pagar_efectivo" name="configuracion" value="Pagar en Efectivo">
            <label for="pagar_efectivo">Pagar en Efectivo</label><br>
            <input type="checkbox" id="pagar_transferencia" name="configuracion" value="Pagar con Transferencia">
            <label for="pagar_transferencia">Pagar con Transferencia</label><br>
            <input type="checkbox" id="solo_repartidores_cp" name="configuracion" value="Sólo Repartidores con mi Código Postal">
            <label for="solo_repartidores_cp">Sólo Repartidores con mi Código Postal</label><br>
            <input type="checkbox" id="solo_repartidores_estrellas" name="configuracion" value="Sólo Repartidores con 3 Estrellas o más">
            <label for="solo_repartidores_estrellas">Sólo Repartidores con 3 Estrellas o más</label><br><br>

            <label for="current_password">Contraseña actual</label><br>
            <input type="password" id="current_password" name="current_password"><br><br>

            <label for="new_password">Nueva contraseña</label><br>
            <input type="password" id="new_password" name="new_password"><br><br>

            <label for="repeat_password">Repetir contraseña</label><br>
            <input type="password" id="repeat_password" name="repeat_password"><br><br>

            <button type="submit">Actualizar</button>
            <button type="button" onclick="cancel()">Regresar</button>
        </form>
    </section>

    <script>
        document.getElementById('nombre').addEventListener('input', function() {
            this.value = this.value.replace(/[0-9]/g, '');
        });

        document.getElementById('apellido').addEventListener('input', function() {
            this.value = this.value.replace(/[0-9]/g, '');
        });

        document.getElementById('whatsapp').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        document.getElementById('codigo_postal').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        function validateAndRegister() {
            const nombre = document.getElementById('nombre').value;
            const apellido = document.getElementById('apellido').value;
            const whatsapp = document.getElementById('whatsapp').value;
            const codigoPostal = document.getElementById('codigo_postal').value;
            const tipoCuenta = document.querySelector('input[name="tipoCuenta"]:checked');
            const currentPassword = document.getElementById('current_password').value;
            const newPassword = document.getElementById('new_password').value;
            const repeatPassword = document.getElementById('repeat_password').value;

            if (nombre.length <= 1 || apellido.length <= 1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El nombre y apellido deben tener más de 1 carácter cada uno.'
                });
                return;
            }

            const nombreCompleto = nombre + ' ' + apellido;
            if (nombreCompleto.length <= 7) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El nombre completo debe tener más de 8 caracteres.'
                });
                return;
            }

            const whatsappNumber = parseInt(whatsapp);
            if (whatsappNumber < 1000000000 || whatsappNumber > 9999999999) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El número de WhatsApp debe ser un número válido.'
                });
                return;
            }

            const codigoPostalNumber = parseInt(codigoPostal);
            if (codigoPostalNumber <= 10000 || codigoPostalNumber >= 99999) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El código postal debe ser un número válido.'
                });
                return;
            }

            if (!tipoCuenta) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor, seleccione un tipo de cuenta.'
                });
                return;
            }

            if (currentPassword && (!newPassword || !repeatPassword)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Si desea cambiar la contraseña, debe completar los tres campos de contraseña.'
                });
                return;
            }

            if (newPassword.length < 8) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La nueva contraseña debe tener al menos 8 caracteres.'
                });
                return;
            }

            if (newPassword && newPassword !== repeatPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Las nuevas contraseñas no coinciden.'
                });
                return;
            }
        }

        document.getElementById('imageForm').addEventListener('submit', function(event) {
            event.preventDefault();
            validateAndRegister();
        });

        function cancel() {
            window.location.href = '../1_inicio.php';
        }

        document.getElementById('current_password').addEventListener('input', function() {
            const currentPassword = this.value;
            const newPasswordInput = document.getElementById('new_password');
            const repeatPasswordInput = document.getElementById('repeat_password');

            if (currentPassword) {
                newPasswordInput.setAttribute('required', 'required');
                repeatPasswordInput.setAttribute('required', 'required');
            } else {
                newPasswordInput.removeAttribute('required');
                repeatPasswordInput.removeAttribute('required');
            }
        });
    </script>
</body>
</html>