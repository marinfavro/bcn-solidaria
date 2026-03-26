/**
 * LÒGICA DEL MAPA INTERACTIU
 */

document.addEventListener('DOMContentLoaded', () => {
    const mapPointsContainer = document.getElementById('map-points');
    if (!mapPointsContainer) return;

    // Dades dels punts (Barris de Barcelona)
    const points = [
        {
            barri: "El Raval",
            necessitat: "Alta",
            color: "alta",
            addr: "Carrer de l'Hospital, 94",
            x: "48%", 
            y: "78%" // Baixat de 72% a 78%
        },
        {
            barri: "Horta Guinardó",
            necessitat: "Molt Alta",
            color: "alta",
            addr: "Passeig de la Vall d'Hebron, 138",
            x: "65%",
            y: "25%"
        },
        {
            barri: "Gràcia",
            necessitat: "Mitjana",
            color: "mitjana",
            addr: "Carrer de Verdi, 12",
            x: "52%",
            y: "40%"
        },
        {
            barri: "Poblenou",
            necessitat: "Baixa",
            color: "baixa",
            addr: "Rambla del Poblenou, 102",
            x: "75%",
            y: "82%" // Baixat de 75% a 82%
        },
        {
            barri: "Sants",
            necessitat: "Mitjana",
            color: "mitjana",
            addr: "Carrer de Sants, 150",
            x: "35%",
            y: "60%"
        },
        {
            barri: "Eixample",
            necessitat: "Baixa",
            color: "baixa",
            addr: "Carrer d'Aragó, 311",
            x: "58%",
            y: "48%"
        }
    ];

    // Generar els punts al mapa
    points.forEach(point => {
        const dot = document.createElement('div');
        dot.className = 'map-dot';
        dot.style.left = point.x;
        dot.style.top = point.y;

        dot.innerHTML = `
            <div class="map-tooltip">
                <span class="tooltip-barri">${point.barri}</span>
                <span class="tooltip-need need-${point.color}">NECESSITAT: ${point.necessitat}</span>
                <p class="tooltip-addr">Punt de recollida: ${point.addr}</p>
            </div>
        `;

        mapPointsContainer.appendChild(dot);
    });
});
