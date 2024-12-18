document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("snackForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const priceField = document.getElementById("price");
        const price = parseFloat(priceField.value);

        // Kiểm tra nếu giá trị không hợp lệ
        if (isNaN(price) || price <= 0) {
            alert("Giá phải là một số dương.");
            return;
        }

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
