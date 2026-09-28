// Datos de películas y series (ejemplos ilustrativos)
const moviesData = [
    {
        id: 1,
        title: "Inception",
        type: "movie",
        description: "Un ladrón que roba secretos corporativos a través del uso de la tecnología de compartir sueños.",
        image: "https://image.tmdb.org/t/p/w200/9gk7adHYeDvHkCSEqAvQNLV5Uge.jpg",
        year: 2010
    },
    {
        id: 2,
        title: "The Dark Knight",
        type: "movie",
        description: "Batman se enfrenta al Joker, un criminal que busca sumir a Gotham en el caos.",
        image: "https://image.tmdb.org/t/p/w200/qJ2tW6WMUDux911r6m7haRef0WH.jpg",
        year: 2008
    },
    {
        id: 3,
        title: "Breaking Bad",
        type: "series",
        description: "Un profesor de química diagnosticado con cáncer se convierte en fabricante de metanfetaminas.",
        image: "https://image.tmdb.org/t/p/w200/ggFHVNu6YYI5L9pCfOacjizRGt.jpg",
        year: 2008
    },
    {
        id: 4,
        title: "Stranger Things",
        type: "series",
        description: "Un grupo de niños descubre fenómenos sobrenaturales en su pequeño pueblo.",
        image: "https://image.tmdb.org/t/p/w200/49WJfeN0moxb9IPfGn8AIqMGskD.jpg",
        year: 2016
    },
    {
        id: 5,
        title: "The Matrix",
        type: "movie",
        description: "Un hacker descubre que el mundo en que vive es una simulación creada por máquinas.",
        image: "https://image.tmdb.org/t/p/w200/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg",
        year: 1999
    },
    {
        id: 6,
        title: "Game of Thrones",
        type: "series",
        description: "Nobles familias luchan por el control del Trono de Hierro en los Siete Reinos.",
        image: "https://image.tmdb.org/t/p/w200/u3bZgnGQ9T01sWNhyveQz0wH0Hl.jpg",
        year: 2011
    },
    {
        id: 7,
        title: "Interstellar",
        type: "movie",
        description: "Un equipo de exploradores viaja a través de un agujero de gusano en busca de un nuevo hogar.",
        image: "https://image.tmdb.org/t/p/w200/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg",
        year: 2014
    },
    {
        id: 8,
        title: "The Mandalorian",
        type: "series",
        description: "Un cazarrecompensas solitario navega por las estrellas en los confines de la galaxia.",
        image: "https://image.tmdb.org/t/p/w200/sWgBv7LV2PRoQgkxwlibdGXKz1S.jpg",
        year: 2019
    }
];

// Elementos del DOM
const searchInput = document.getElementById('search');
const filterSelect = document.getElementById('filter');
const resultsDiv = document.getElementById('results');

// Función para mostrar resultados
function displayResults(items) {
    resultsDiv.innerHTML = '';

    if (items.length === 0) {
        resultsDiv.innerHTML = '<p class="no-results">No se encontraron resultados</p>';
        return;
    }

    items.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'result-item';
        itemDiv.innerHTML = `
            <img src="${item.image}" alt="${item.title}" class="result-image">
            <h3 class="result-title">${item.title}</h3>
            <p class="result-description">${item.description}</p>
            <p class="result-meta">${item.type === 'movie' ? 'Película' : 'Serie'} • ${item.year}</p>
        `;
        resultsDiv.appendChild(itemDiv);
    });
}

// Función para filtrar y buscar
function filterAndSearch() {
    const searchTerm = searchInput.value.toLowerCase();
    const filterType = filterSelect.value;

    let filteredItems = moviesData.filter(item => {
        const matchesSearch = item.title.toLowerCase().includes(searchTerm) ||
                             item.description.toLowerCase().includes(searchTerm);
        const matchesType = filterType === 'all' ||
                           (filterType === 'movie' && item.type === 'movie') ||
                           (filterType === 'series' && item.type === 'series');

        return matchesSearch && matchesType;
    });

    displayResults(filteredItems);
}

// Event listeners
searchInput.addEventListener('input', filterAndSearch);
filterSelect.addEventListener('change', filterAndSearch);

// Cargar todos los resultados al inicio
window.addEventListener('load', () => {
    displayResults(moviesData);
});