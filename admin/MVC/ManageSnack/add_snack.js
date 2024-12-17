document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("snackForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch("add_snack.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.location.href = 'show_snack.html';  
                } else {
                    alert("Lỗi khi thêm đồ ăn: " + data.message);
                }
            })
            .catch(error => {
                alert("Có lỗi xảy ra: " + error);
            });
    });
});
