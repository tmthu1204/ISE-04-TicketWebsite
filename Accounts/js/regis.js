const formRegis = document.getElementById("formRegis");
const userNameE = document.getElementById("userName");
const emailE = document.getElementById("email");
const passwordE = document.getElementById("password");
const repassE = document.getElementById("repass");

//Element Error
const userNameErr = document.getElementById("userNameErr");
const emailErr = document.getElementById("emailErr");
const passwordErr = document.getElementById("passwordErr");
const repassErr = document.getElementById("repassErr");     

//Lay du lieu tu localStorage
const userLocal = JSON.parse(localStorage.getItem("users")) || [];
/**
 * Validate địa chỉ email
 * @param {*} email : Chuỗi email người dùng nhập vào
 * @returns: Dữ liệu nếu email đúng định dạng, undefined nếu email không đúng định dạng
 */
function validateEmail (email){
    return String(email)
      .toLowerCase()
      .match(
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      );
  };

formRegis.addEventListener("submit", function(e){
    e.preventDefault();

    if(!userNameE.value){
        userNameErr.style.display = "block";
    }else{
        userNameErr.style.display = "none";
    }

    if(!emailE.value){
        emailErr.style.display = "block";
    }else{
        emailErr.style.display = "none";
    // Validate email
    if(!validateEmail(emailE.value)){
        emailErr.style.display = "block";
        emailErr.innerHTML = "Email không đúng định dạng"
    }
    }
    
    if(!passwordE.value){
        passwordErr.style.display = "block";
    }else{
        passwordErr.style.display = "none";
    }

    if(!repassE.value){
        repassErr.style.display = "block";
    }else{
        repassErr.style.display = "none";
    }
    //Check password and repass
    if(passwordE.value !== repassE.value){
        repassErr.style.display = "block";
        repassErr.innerHTML = "Mật khẩu nhập lại không khớp";
    }

    //Send data to storage
    if(userNameE.value && emailE.value && passwordE.value
        && repassE.value && passwordE.value == repassE.value && validateEmail(emailE.value)){

        //Get data from form and merge into user
        const user = {
            userId: Math.ceil(Math.random() *100000000000000),
            userName: userNameE.value,
            email: emailE.value,
            password: passwordE.value,
        };

        //Push user vao userLocal
        userLocal.push(user);
        //Luu tr du lieu len local
        localStorage.setItem("users", JSON.stringify(userLocal));

        //Chuyen huong ve tran dang nhap
        setTimeout(function(){
            window.location.href = "login.html";
        },1000);
        
    }
});

