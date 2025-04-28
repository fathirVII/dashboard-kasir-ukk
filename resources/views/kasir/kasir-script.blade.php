<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

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
        toggleCheckboxState();

        // Karena value berubah, kamu mungkin mau langsung update kembalian juga
        if (typeof kembalian === "function") {
            kembalian();
            toggleCheckboxState();
        }
    }

    function clearBayar() {
        const bayarInput = document.getElementById("bayar");
        bayarInput.value = 0;

        if (typeof kembalian === "function") {
            kembalian();
            toggleCheckboxState();
        }
    }

    function toggleCheckboxState() {
        const totalTagihanElement = document.getElementById("totalTagihan");
        const bayarInput = document.getElementById("bayar");
        const confirmCheckbox = document.getElementById("confirmCheckbox");
        const totalTagihan =
            parseInt(getTotalFromText(totalTagihanElement.textContent)) || 0;
        const bayar = parseInt(bayarInput.value) || 0;
        if (bayar >= totalTagihan) {
            confirmCheckbox.disabled = false; // Aktifkan checkbox jika bayar >= total tagihan
        } else {
            confirmCheckbox.disabled = true; // Nonaktifkan checkbox jika bayar < total tagihan
        }
    }

    window.addEventListener("DOMContentLoaded", () => {
        // const toggleModal = document.getElementById("toggleModal");
        // const toggleModal2 = document.getElementById("toggleModal2");
        // const pelangganModal = document.getElementById("pelangganModal");

        // toggleModal.addEventListener("click", () => {
        //     pelangganModal.classList.remove("displayModal");
        //     pelangganModal.classList.add("hiddenModal");
        // });
        // toggleModal2.addEventListener("click", () => {
        //     pelangganModal.classList.remove("hiddenModal");
        //     pelangganModal.classList.add("displayModal");
        // });

        const toggleModal = document.getElementById("toggleModal");
        const pelangganModal = document.getElementById("pelangganModal");
        pelangganModal.style.display = "none";

        toggleModal.addEventListener("click", () => {
            pelangganModal.style.display = "none";
        });

        const activeArrow = document.getElementById("ActiveArrow");
        activeArrow.classList.add('translate-x-full');


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

        document.getElementById("bayar").addEventListener("input", () => {
            kembalian();
            toggleCheckboxState();
        });

        toggleCheckboxState();
    });
</script>
