<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles - Buscador de Películas y Series</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Buscador de Películas y Series</h1>
        <nav>
            <a href="index.html">Inicio</a>
            <a href="about.html">Acerca de</a>
        </nav>
    </header>

    <main id="detalles-container">
        <div id="detalles-pelicula" class="detalles">
            <!-- Los detalles se cargarán aquí dinámicamente -->
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Buscador de Películas y Series. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
    <script>
        // Obtener el ID de la película de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const id = urlParams.get('id');

        if (id) {
            cargarDetallesPelicula(id);
        } else {
            document.getElementById('detalles-pelicula').innerHTML = '<p>Error: No se especificó un ID de película.</p>';
        }

        async function cargarDetallesPelicula(id) {
            try {
                const response = await fetch(`api/buscar.php?id=${id}`);
                const data = await response.json();

                if (data.success && data.peliculas.length > 0) {
                    const pelicula = data.peliculas[0];
                    mostrarDetallesPelicula(pelicula);
                } else {
                    document.getElementById('detalles-pelicula').innerHTML = '<p>Película no encontrada.</p>';
                }
            } catch (error) {
                console.error('Error al cargar detalles:', error);
                document.getElementById('detalles-pelicula').innerHTML = '<p>Error al cargar los detalles.</p>';
            }
        }

        function mostrarDetallesPelicula(pelicula) {
            const container = document.getElementById('detalles-pelicula');
            const fecha = new Date(pelicula.fecha_lanzamiento).toLocaleDateString('es-ES');
            const generos = pelicula.generos ? pelicula.generos.split(',').join(', ') : 'No especificados';

            container.innerHTML = `
                <div class="detalles-header">
                    <img src="${pelicula.imagen_url || 'https://via.placeholder.com/300x450?text=Sin+Imagen'}" alt="${pelicula.titulo}" class="detalles-imagen">
                    <div class="detalles-info">
                        <h2>${pelicula.titulo}</h2>
                        <p><strong>Tipo:</strong> ${pelicula.tipo}</p>
                        <p><strong>Fecha de lanzamiento:</strong> ${fecha}</p>
                        <p><strong>Géneros:</strong> ${generos}</p>
                    </div>
                </div>
                <div class="detalles-descripcion">
                    <h3>Sinopsis</h3>
                    <p>${pelicula.descripcion}</p>
                </div>
                <div class="detalles-acciones">
                    <button onclick="window.history.back()">Volver</button>
                </div>
            `;
        }
    </script>
</body>
</html>