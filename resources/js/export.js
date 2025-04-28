window.addEventListener("DOMContentLoaded", () => {
    document
        .getElementById("downloadImage")
        .addEventListener("click", function () {
            const node = document.querySelector(
                ".w-full.flex.justify-center.mt-5"
            );

            domtoimage
                .toPng(node)
                .then(function (dataUrl) {
                    const link = document.createElement("a");
                    link.download = "penjualan.png";
                    link.href = dataUrl;
                    link.click();
                })
                .catch(function (error) {
                    console.error("Oops, something went wrong!", error);
                });
        });

    document
        .getElementById("downloadPdf")
        .addEventListener("click", function () {
            const node = document.querySelector(
                ".w-full.flex.justify-center.mt-5"
            );

            domtoimage
                .toPng(node)
                .then(function (dataUrl) {
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF();
                    const imgProps = pdf.getImageProperties(dataUrl);
                    const pdfWidth = pdf.internal.pageSize.getWidth();
                    const pdfHeight =
                        (imgProps.height * pdfWidth) / imgProps.width;

                    pdf.addImage(dataUrl, "PNG", 0, 0, pdfWidth, pdfHeight);
                    pdf.save("penjualan.pdf");
                })
                .catch(function (error) {
                    console.error("Oops, something went wrong!", error);
                });
        });
});
