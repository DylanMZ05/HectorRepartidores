<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    <form onsubmit="event.preventDefault(); validateAndRegister();">
        <label for="nombre">Nombre</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="apellido">Apellido</label><br>
        <input type="text" id="apellido" name="apellido" required><br><br>
        
        <label for="whatsapp">WhatsApp</label><br>
        <input type="number" id="whatsapp" name="whatsapp" required><br><br>
        
        <label>Tipo de cuenta</label><br>
        <input type="radio" id="cliente" name="tipoCuenta" value="Cliente">
        <label for="cliente">Cliente</label><br>
        <input type="radio" id="repartidor" name="tipoCuenta" value="Repartidor">
        <label for="repartidor">Repartidor</label><br><br>
        
        <button type="button" onclick="cancel()">Regresar</button>
        <button type="submit">Registrarme</button>
    </form>
</section>

<script>
    function validateAndRegister() {
        const nombre = document.getElementById('nombre').value;
        const apellido = document.getElementById('apellido').value;
        const whatsapp = document.getElementById('whatsapp').value;
        const tipoCuenta = document.querySelector('input[name="tipoCuenta"]:checked');
        
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
        
        if (!tipoCuenta) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Por favor, seleccione un tipo de cuenta.'
            });
            return;
        }
        
        const tipo = tipoCuenta.value;
        
        Swal.fire({
            icon: 'success',
            title: 'Registro exitoso',
            text: 'Hemos enviado a tu WhatsApp un enlace para completar tu registro.'
        }).then(() => {
            const mensaje = `¡Hola! Me gustaría registrarme como ${tipo.toLowerCase()}. Haz clic en el siguiente enlace para completar tu registro: localhost/HectorRepartidores/pagina_registro/registro_${tipo}.php`;
            window.location.href = `https://api.whatsapp.com/send?phone=${542257538156}&text=${encodeURIComponent(mensaje)}`;
        });
    }

    function cancel() {
        window.location.href = '../index.php';
    }
</script>
</body>
</html>