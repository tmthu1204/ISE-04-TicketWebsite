document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const snackID = urlParams.get("snackID");

    if (snackID) {
        // Fetch snack details and pre-fill the form
        fetch(`edit_snack.php?snackID=${snackID}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById("name").value = data.name;
                    document.getElementById("price").value = data.price;
                    document.getElementById("snackID").value = snackID;
                }
            })
            .catch(error => {
                alert("Có lỗi khi tải dữ liệu đồ ăn nhẹ: " + error);
            });
    } else {
        alert("Không tìm thấy thông tin đồ ăn nhẹ.");
    }

    const form = document.getElementById("editSnackForm");
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

        fetch("edit_snack.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.location.href = "show_snack.html"; // Redirect to a snack listing page
                } else {
                    alert("Cập nhật thông tin đồ ăn nhẹ thất bại: " + data.message);
                }
            })
            .catch(error => {
                alert("Có lỗi khi cập nhật thông tin đồ ăn nhẹ: " + error);
            });
    });
});
