document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const theaterID = urlParams.get("theaterID");

    if (theaterID) {
        // Fetch theater details and pre-fill the form
        fetch(`../../BE/Admin/edit_theater.php?theaterID=${theaterID}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    document.getElementById("name").value = data.name;
                    document.getElementById("location").value = data.location;
                    document.getElementById("theaterID").value = theaterID;
                }
            })
            .catch(error => {
                alert("Có lỗi khi tải dữ liệu rạp: " + error);
            });
    } else {
        alert("Không tìm thấy thông tin rạp.");
    }

    const form = document.getElementById("editTheaterForm");
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch("../../BE/Admin/edit_theater.php", {
            method: "POST",
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    window.location.href = "add_theater.html"; // Redirect to a theater listing page
                } else {
                    alert("Cập nhật thông tin rạp thất bại: " + data.message);
                }
            })
            .catch(error => {
                alert("Có lỗi khi cập nhật thông tin rạp: " + error);
            });
    });
});
