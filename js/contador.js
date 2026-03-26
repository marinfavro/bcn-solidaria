document.addEventListener("DOMContentLoaded", () => {
    const contador = document.getElementById("contador-dinero");

    if (!contador) return;

    const total = parseFloat(contador.dataset.total) || 0;
    let actual = 0;

    const duracion = 2000; // 2 segundos
    const pasos = 60;
    const incremento = total / pasos;

    let contadorInterval = setInterval(() => {
        actual += incremento;

        if (actual >= total) {
            actual = total;
            clearInterval(contadorInterval);
        }

        contador.textContent = formatearNumero(actual) + "€";

    }, duracion / pasos);

    function formatearNumero(numero) {
        return numero.toLocaleString("es-ES", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }
});