// ELEMENTOS
const dropArea = document.getElementById("drop-area");
const input = document.getElementById("fotoInput");
const preview = document.getElementById("preview");
const removeBtn = document.getElementById("removeBtn");

const tipoSelect = document.getElementById("tipo");
const formDinero = document.getElementById("formDinero");
const formComida = document.getElementById("formComida");

const metodoPago = document.getElementById("metodoPago");
const bizumFields = document.getElementById("bizumFields");
const tarjetaFields = document.getElementById("tarjetaFields");
const transferenciaFields = document.getElementById("transferenciaFields");

const tarjetaNumero = document.querySelector("input[name='tarjeta_numero']");
const tarjetaFecha = document.querySelector("input[name='tarjeta_fecha']");
const tarjetaCVV = document.querySelector("input[name='tarjeta_cvv']");
const telefono = document.querySelector("input[name='telefono']");
const iban = document.querySelector("input[name='iban']");

// CAMBIO FORMULARIO
tipoSelect?.addEventListener("change", () => {
    formDinero.classList.add("hidden");
    formComida.classList.add("hidden");

    if (tipoSelect.value === "dinero") formDinero.classList.remove("hidden");
    if (tipoSelect.value === "comida") formComida.classList.remove("hidden");
});

// MÉTODO PAGO
metodoPago?.addEventListener("change", () => {

    bizumFields.classList.add("hidden");
    tarjetaFields.classList.add("hidden");
    transferenciaFields.classList.add("hidden");

    // QUITAR required a todos
    telefono?.removeAttribute("required");
    tarjetaNumero?.removeAttribute("required");
    tarjetaFecha?.removeAttribute("required");
    tarjetaCVV?.removeAttribute("required");
    iban?.removeAttribute("required");

    if (metodoPago.value === "bizum") {
        bizumFields.classList.remove("hidden");
        telefono?.setAttribute("required", "true");
    }

    if (metodoPago.value === "tarjeta") {
        tarjetaFields.classList.remove("hidden");
        tarjetaNumero?.setAttribute("required", "true");
        tarjetaFecha?.setAttribute("required", "true");
        tarjetaCVV?.setAttribute("required", "true");
    }

    if (metodoPago.value === "transferencia") {
        transferenciaFields.classList.remove("hidden");
        iban?.setAttribute("required", "true");
    }
});

// DRAG & DROP
if (dropArea) {
    dropArea.addEventListener("click", () => input.click());

    dropArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropArea.style.borderColor = "#000";
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.style.borderColor = "#ccc";
    });

    dropArea.addEventListener("drop", (e) => {
        e.preventDefault();
        dropArea.style.borderColor = "#ccc";

        const file = e.dataTransfer.files[0];
        input.files = e.dataTransfer.files;
        mostrarImagen(file);
    });
}

input?.addEventListener("change", (e) => {
    mostrarImagen(e.target.files[0]);
});

// MOSTRAR IMAGEN
function mostrarImagen(file) {
    if (!file) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        preview.src = e.target.result;
        preview.style.display = "block";
        removeBtn.style.display = "flex";
        dropArea.style.display = "none";
    };

    reader.readAsDataURL(file);
}

// LIMPIAR
function limpiarImagen() {
    input.value = "";
    preview.src = "";
    preview.style.display = "none";
    removeBtn.style.display = "none";
    dropArea.style.display = "block";
}

removeBtn?.addEventListener("click", limpiarImagen);

// FORMATEOS
tarjetaNumero?.addEventListener("input", (e) => {
    let value = e.target.value.replace(/\D/g, "").substring(0,16);
    value = value.replace(/(.{4})/g, "$1 ").trim();
    e.target.value = value;
});

tarjetaFecha?.addEventListener("input", (e) => {
    let value = e.target.value.replace(/\D/g, "").substring(0,4);
    if (value.length >= 3) value = value.substring(0,2) + "/" + value.substring(2);
    e.target.value = value;
});

tarjetaCVV?.addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/\D/g, "").substring(0,3);
});

telefono?.addEventListener("input", (e) => {
    e.target.value = e.target.value.replace(/\D/g, "").substring(0,9);
});

iban?.addEventListener("input", (e) => {
    let value = e.target.value.replace(/\s/g, "").toUpperCase();
    value = value.replace(/(.{4})/g, "$1 ").trim();
    e.target.value = value;
});

// CADUCIDAD TARJETA

const caducidad = document.getElementById("caducidad");

caducidad.addEventListener("input", function(e) {
    let valor = this.value.replace(/\D/g, ""); // solo números

    if (valor.length >= 3) {
        valor = valor.substring(0,2) + "/" + valor.substring(2,4);
    }

    this.value = valor;
});