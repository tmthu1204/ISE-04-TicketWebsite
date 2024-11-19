const formLogin = document.getElementById("formLogin");
const emailE = document.getElementById("email");
const passwordE = document.getElementById("password");
const errorMess = document.getElementById("errorMess");

//Element Error
const emailErr = document.getElementById("emailErr");
const passwordErr = document.getElementById("passwordErr");

/**
 * Validate địa chỉ email
 * @param {*} email : Chuỗi email người dùng nhập vào
 * @returns: Dữ liệu nếu email đúng định dạng, undefined nếu email không đúng định dạng
 */
function validateEmail(email) {
    return String(email)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
};

formLogin.addEventListener("submit", function (e) {
    e.preventDefault();


    if (!emailE.value) {
        emailErr.style.display = "block";
    } else {
        emailErr.style.display = "none";
        // Validate email
        if (!validateEmail(emailE.value)) {
            emailErr.style.display = "block";
            emailErr.innerHTML = "Email không đúng định dạng"
        }
    }

    if (!passwordE.value) {
        passwordErr.style.display = "block";
    } else {
        passwordErr.style.display = "none";
    }

    //Lay du lieu tu local ve
    const userLocal = JSON.parse(localStorage.getItem("users")) || {};

    //Tim kiem email va mat khau nguoi dung
    const findUser = userLocal.find(
        (user) => 
        user.email === emailE.value
        && user.password === passwordE.value);

    if(!findUser){
        errorMess.style.display = "block";
    }else{
        window.location.href = "bst.html";

        //Luu thong tin cua user dang nhap len local
        localStorage.setItem("userLogin", JSON.stringify(findUser));
    }
});

