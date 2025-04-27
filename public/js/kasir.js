function toggleJumlah(checkbox) {
    const id = checkbox.value;
    const jumlahContainer = document.getElementById("jumlah_" + id);
    const inputJumlah = document.getElementById("jumlah_" + id + "_input");

    if (checkbox.checked) {
        jumlahContainer.style.display = "block";
        inputJumlah.disabled = false;
    } else {
        jumlahContainer.style.display = "none";
        inputJumlah.disabled = true;
    }
    hitungTotal();
}
function hitungTotal() {
    let total = 0;

    document.querySelectorAll(".jumlah-input").forEach((input) => {
        if (!input.disabled) {
            const harga = parseInt(input.dataset.harga);
            const jumlah = parseInt(input.value) || 0;
            total += harga * jumlah;
        }
    });

    document.getElementById("totalTagihan").textContent =
        "Rp " + total.toLocaleString("id-ID");

    kembalian();
}
function kembalian() {
    const totalTagihan = getTotalFromText(
        document.getElementById("totalTagihan").textContent
    );
    const bayar = parseInt(document.getElementById("bayar").value) || 0;
    const hasilKembalian = bayar - totalTagihan;

    document.getElementById("kembalian").textContent =
        "Rp " + hasilKembalian.toLocaleString("id-ID");
}
// Helper
function getTotalFromText(text) {
    return parseInt(text.replace(/[^\d]/g, ""));
}
function tambahBayar(nominal) {
    const bayarInput = document.getElementById("bayar");
    let currentValue = parseInt(bayarInput.value) || 0;
    bayarInput.value = currentValue + nominal;

    // Karena value berubah, kamu mungkin mau langsung update kembalian juga
    if (typeof kembalian === "function") {
        kembalian();
    }
}


window.addEventListener("DOMContentLoaded", () => {
    const sidebarToggle = document.getElementById("modalCardToggle");
    const sidebarToggle2 = document.getElementById("modalCardToggle2");
    const modalCardJumlah = document.getElementById("modalCardJumlah");

    sidebarToggle.addEventListener("click", () => {
        modalCardJumlah.classList.add("translate-x-full");
    });

    sidebarToggle2.addEventListener("click", () => {
        modalCardJumlah.classList.remove("translate-x-full");
    });

    const handleResize = () => {
        if (window.innerWidth <= 1024) {
            modalCardJumlah.classList.add("translate-x-full");
        } else {
            modalCardJumlah.classList.remove("translate-x-full");
        }
    };

    handleResize();
    window.addEventListener("resize", handleResize);

    document.querySelectorAll(".jumlah-input").forEach((input) => {
        input.addEventListener("input", hitungTotal);
    });

    document.getElementById("bayar").addEventListener("input", kembalian);
});

