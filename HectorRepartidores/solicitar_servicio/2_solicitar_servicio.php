<!DOCTYPE php>
<php lang="es">
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
            <a href="">Registro</a>
            <a href="">Acceso</a>
        </div>
    </header>

    <section class="first_section">
        <h1>Datos del solicitante</h1>
        <form id="cuestionarioForm">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>
            </div>
            <div class="form-group">
                <label for="whatsapp">WhatsApp</label>
                <input type="text" id="whatsapp" name="whatsapp" inputmode="numeric" placeholder="Ingrese su número" required>
            </div>
            <div class="buttons">
                <button type="button" id="regresar" onclick="window.location.href='1_inicio.php';">Regresar</button>
                <button type="button" id="siguiente">Siguiente</button>
            </div>
            <div class="confirmation" style="display: none;">
                <p>¿Los datos son correctos?</p>
                <button type="button" id="si" onclick="window.location.href = '2.2_tipo_de_servicio.php';">SÍ</button>
                <button type="button" id="no">NO</button>
            </div>
        </form>
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
        document.getElementById('siguiente').addEventListener('click', function() {
            var nombre = document.getElementById('nombre').value;
            var apellido = document.getElementById('apellido').value;
            var whatsapp = document.getElementById('whatsapp').value;

            if (!nombre || !whatsapp || !apellido) {
                alert('Por favor, rellene todos los campos obligatorios.');
            } else {
                document.querySelector('.confirmation').style.display = 'block';
            }
        });

        document.getElementById('regresar').addEventListener('click', function() {
            document.querySelector('.confirmation').style.display = 'none';
        });

        document.getElementById('si').addEventListener('click', function() {
            alert('Datos enviados correctamente.');
        });

        document.getElementById('no').addEventListener('click', function() {
            document.querySelector('.confirmation').style.display = 'none';
        });

        document.getElementById('nombre').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúñÑ\s'-]/g, '');
        });

        document.getElementById('apellido').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúñÑ\s'-]/g, '');
        });

        document.getElementById('whatsapp').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    
    </script>
</body>
</php>