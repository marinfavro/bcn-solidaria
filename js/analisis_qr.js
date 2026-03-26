const html5QrCode = new Html5Qrcode("reader");

const input = document.getElementById("qr-input");
const preview = document.getElementById("preview-img");
const btn = document.getElementById("btn-analizar");
const statusText = document.getElementById("qr-status");
const removeBtn = document.getElementById("removeBtn");

let selectedFile = null;

function resetQR() {
    selectedFile = null;
    input.value = "";

    preview.src = "";
    preview.style.display = "none";

    document.getElementById("preview-container").style.display = "none";

    btn.style.display = "none";
}
// 📸 PREVIEW DE IMAGEN
input.addEventListener("change", function(e) {

    const file = e.target.files[0];
    if (!file) return;

    selectedFile = file;

    const reader = new FileReader();
    reader.onload = function(event) {
    preview.src = event.target.result;
    preview.style.display = "block";
    document.getElementById("preview-container").style.display = "block";
    btn.style.display = "inline-block";
    removeBtn.style.display = "flex";
};

    reader.readAsDataURL(file);
});

// ❌ ELIMINAR IMAGEN
document.getElementById("preview-container").style.display = "none";

removeBtn.addEventListener("click", function() {
    selectedFile = null;
    input.value = "";
    preview.src = "";
    preview.style.display = "none";
    btn.style.display = "none";
    removeBtn.style.display = "none";
    statusText.innerText = "";
});

// 🔍 ANALIZAR QR
btn.addEventListener("click", function() {

    if (!selectedFile) return;

    statusText.innerText = "Analitzant QR...";
    statusText.className = "";

    html5QrCode.scanFile(selectedFile, true)
        .then(decodedText => {

            console.log("QR leído:", decodedText);

            setTimeout(() => {

                if (decodedText.toUpperCase().includes("BCN")) {

                    statusText.innerText = "QR validat correctament ✅";
                    statusText.className = "qr-ok";

                    setTimeout(() => {
                        window.location.href = "/confirmar.php?id=" + DONACION_ID;
                    }, 1000);

                } else {

                   statusText.innerText = "QR no vàlid ❌";
                    statusText.className = "qr-error";

                    setTimeout(() => {
                    resetQR();
                    }, 1500); // 1.5 segundos

                }

            }, 2000);

        })
                .catch(err => {
            console.error(err);
            statusText.innerText = "Error llegint el QR ❌";
            statusText.className = "qr-error";

            setTimeout(() => {
            resetQR();
            }, 1500); // 1.5 segundos 
        });
});