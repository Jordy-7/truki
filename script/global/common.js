    /*// Función para cargar dinámicamente el contenido de un archivo HTML
    function loadHTML(url, elementId) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                const container = document.getElementById(elementId);
                container.innerHTML = html;
            })
            .catch(error => console.error('Error al cargar el archivo HTML:', error));
    }
    
    // Cargar el encabezado y el pie de página
    loadHTML('./components/header.html', 'headerContainer');
    loadHTML('./components/footer.html', 'footerContainer');*/