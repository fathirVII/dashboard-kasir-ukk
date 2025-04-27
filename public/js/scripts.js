

window.addEventListener("DOMContentLoaded", () => {
    const toggleModal = document.getElementById("toggleModal");
    const toggleModal2 = document.getElementById("toggleModal2");
    const pelangganModal = document.getElementById("pelangganModal");

    toggleModal.addEventListener("click", () => {
        pelangganModal.classList.remove("displayModal");
        pelangganModal.classList.add("hiddenModal");
    });
    toggleModal2.addEventListener("click", () => {
        pelangganModal.classList.remove("hiddenModal");
        pelangganModal.classList.add("displayModal");
    });
});

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

document.querySelectorAll(".jumlah-input").forEach((input) => {
    input.addEventListener("input", hitungTotal);
});

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
}
$(document).ready(function () {
    $("#select-pelanggan").select2({
        placeholder: "Cari atau pilih pelanggan",
        width: "100%",
        theme: "classic",
    });
});
