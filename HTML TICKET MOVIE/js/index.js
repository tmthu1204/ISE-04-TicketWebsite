// Lay du lieu tren local
const userLogin = JSON.parse(localStorage.getItem("userLogin")) || {};

const userLoginE = document.getElementById("userLogin");

if (userLogin){
    //Hien thi ten cua user dang dang nhap len header
    userLoginE.innerHTML = userLogin.userName;
}else{
    userLoginE.innerHTML = "";
}