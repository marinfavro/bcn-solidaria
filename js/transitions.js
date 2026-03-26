/**
 * GESTOR DE TRANSICIONS ESTIL FRAMER MOTION
 * Simula initial, animate i exit de Framer Motion en JS pur
 */

document.addEventListener('DOMContentLoaded', () => {
    const wrapper = document.getElementById('page-wrapper');
    
    // 1. ANIMATE (Entrada): Apareix des de baix (y: 20 -> y: 0)
    // Afegim la classe després d'un mini-timeout per assegurar que el navegador detecti el canvi
    setTimeout(() => {
        if (wrapper) wrapper.classList.add('is-visible');
    }, 50);

    // 2. EXIT (Sortida): Desapareix cap a dalt (y: 0 -> y: -20)
    // Interceptem tots els clics en enllaços interns
    const links = document.querySelectorAll('a[href]');
    
    links.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            
            // Només gestionem enllaços a pàgines internes (no ancores # ni enllaços externs)
            if (href && !href.startsWith('#') && !href.startsWith('http') && !link.hasAttribute('target')) {
                e.preventDefault(); // Aturem la navegació instantània
                
                // Activem l'animació de sortida
                if (wrapper) wrapper.classList.add('is-exiting');
                
                // Esperem que acabi l'animació (250ms) i naveguem
                setTimeout(() => {
                    window.location.href = href;
                }, 250); 
            }
        });
    });
});
