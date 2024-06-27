<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Usuario</title>
    <link rel="stylesheet" href="registro.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
    </style>
</head>
<body>
<section>
    <h1>Editar perfil</h1>
    <form method="post" action="#" enctype="multipart/form-data" onsubmit="return validateForm()">
        <div>
            <img src="../imgperfil.jpg" alt="avatar" id="img" />
            <input type="file" name="foto" id="foto" accept="image/*" />
            <label for="foto">Cambiar foto</label>
        </div>
        <div>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" autocomplete="off" required />
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" autocomplete="off" required />
        </div>
        <div>
            <label for="whatsapp">WhatsApp</label>
            <input type="number" name="whatsapp" autocomplete="off" required min="1000000000" max="9999999999" />
        </div>
        <div>
            <label for="codigo-postal">Mi Código Postal</label>
            <input type="number" name="codigo-postal" autocomplete="off" required min="10000" max="99999" />
        </div>
        <p>Para desbloquear la configuración debes tener una membresía superior.</p>
        <fieldset>
            <legend>Configuración</legend>
            <div>
                <input type="checkbox" name="pagar-efectivo" id="pagar-efectivo" checked disabled />
                <label for="pagar-efectivo">Pagar en Efectivo</label>
            </div>
            <div>
                <input type="checkbox" name="pagar-transferencia" id="pagar-transferencia" checked disabled />
                <label for="pagar-transferencia">Pagar con Transferencia</label>
            </div>
            <div>
                <input type="checkbox" name="repartidores-codigo-postal" id="repartidores-codigo-postal" checked disabled />
                <label for="repartidores-codigo-postal">Sólo Repartidores con mi Código Postal</label>
            </div>
            <div>
                <input type="radio" name="repartidores-estrellas" id="repartidores-estrellas" checked disabled />
                <label for="repartidores-estrellas">Sólo Repartidores con 3 Estrellas o más</label>
            </div>
        </fieldset>

        <button style="margin-top: 10px;"type="button" onclick="window.location.href='../CPyD/codigos_postales_clientes.php';">Modificar Códigos Postales</button>
        <button type="button" class="boton_contraseñas" onclick="togglePasswordFields()">Cambiar Contraseñas</button>

        <div id="passwordFields" style="display: none;">
            <div></div>
            <div>
                <label for="password-nueva">Contraseña actual</label>
                <input type="password" name="password-nueva" id="password-nueva" autocomplete="off" minlength="8"/>
            </div>
            <div>
                <label for="password-nueva">Nueva contraseña</label>
                <input type="password" name="password-nueva" id="password-nueva" autocomplete="off" minlength="8"/>
            </div>
            <div>
                <label for="password-repetir">Repetir contraseña</label>
                <input type="password" name="password-repetir" id="password-repetir" autocomplete="off" minlength="8"/>
            </div>
        </div>

        <div class="buttons">
            <button type="submit">Actualizar</button>
            <button type="button" onclick="window.location.href='../index.php';">Regresar</button>
        </div>
    </form>
</section>
<script>
    const file = document.getElementById('foto');
    const img = document.getElementById('img');
    const aspectRatioMin = 0.9;
    const aspectRatioMax = 1.1;
    const passwordFields = document.getElementById('passwordFields');

    file.addEventListener('change', e => {
        if (e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const imgElement = new Image();
                imgElement.src = event.target.result;
                imgElement.onload = function() {
                    const aspectRatio = imgElement.width / imgElement.height;
                    if (aspectRatio >= aspectRatioMin && aspectRatio <= aspectRatioMax) {
                        img.src = event.target.result;
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'La imagen debe tener un aspecto cuadrado o cercano a 1:1.',
                        });
                        img.src = '../imgperfil.jpg';
                        file.value = '';
                    }
                }
            }
            reader.readAsDataURL(e.target.files[0]);
        } else {
            img.src = '../imgperfil.jpg';
        }
    });

    function validateForm() {
        const nombre = document.getElementById('nombre').value.trim();
        const apellido = document.getElementById('apellido').value.trim();
        const totalLength = nombre.length + apellido.length;

        if (totalLength < 7) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El nombre y el apellido deben sumar al menos 7 caracteres.',
            });
            return false;
        }

        const passwordNueva = document.getElementById('password-nueva').value.trim();
        const passwordRepetir = document.getElementById('password-repetir').value.trim();

        if (passwordNueva !== passwordRepetir) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Las contraseñas nuevas no coinciden.',
            });
            return false;
        }

        return true;
    }

    function togglePasswordFields() {
        if (passwordFields.style.display === 'none') {
            passwordFields.style.display = 'block';
        } else {
            passwordFields.style.display = 'none';
            document.getElementById('password-actual').value = '';
            document.getElementById('password-nueva').value = '';
            document.getElementById('password-repetir').value = '';
        }
    }
</script>
</body>
</html>