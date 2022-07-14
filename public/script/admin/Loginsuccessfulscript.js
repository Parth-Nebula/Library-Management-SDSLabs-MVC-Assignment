document.getElementById("welcome").innerHTML = "Welcome " + data_one + " !" ;
sessionStorage.setItem("tempPassword", data_two);
sessionStorage.setItem("username", data_one);
document.getElementById("username").defaultValue = data_one;
document.getElementById("tempPassword").defaultValue = data_two;
