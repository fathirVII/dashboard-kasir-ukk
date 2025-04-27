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
