document.getElementById("welcome").innerHTML = "Welcome " + data_one + " !" ;
sessionStorage.setItem("username", data_one);
document.getElementById("username").defaultValue = data_one;