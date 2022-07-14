let list_of_requests = data_one;
let table = document.getElementById("requestsTable");
let row;
let cell1;
let cell2; 
let cell3;
let cell4;
let cell5;
row = table.insertRow(0);
cell1 = row.insertCell(0);
cell1.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell2 = row.insertCell(1);
cell2.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell3 = row.insertCell(2);
cell3.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell4 = row.insertCell(3);
cell4.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell5 = row.insertCell(4);
cell5.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell1.innerHTML = "User";
cell2.innerHTML = "Book" ;
cell3.innerHTML = "Request on";
cell4.innerHTML = "Accept on" ;
for (let i = 0 ; i < list_of_requests.length ; i++)
{
    row = table.insertRow(i+1);
    cell1 = row.insertCell(0);
    cell1.style = "padding: 1vw; width: 27vw;" ;
    cell2 = row.insertCell(1);
    cell2.style = "padding: 1vw; width: 27vw;" ;
    cell3 = row.insertCell(2);
    cell3.style = "padding: 1vw; width: 27vw;" ;
    cell4 = row.insertCell(3);
    cell4.style = "padding: 1vw; width: 27vw;" ;
    cell5 = row.insertCell(4);
    cell5.style = "padding: 1vw; width: 27vw;" ;
    cell1.innerHTML = list_of_requests[i].username;
    cell2.innerHTML = list_of_requests[i].title;
    javaDate = new Date(list_of_requests[i].requestdate);
    cell3.innerHTML = String(javaDate.getFullYear()) + "-" + String(javaDate.getMonth()+1) + "-" + String(javaDate.getDate()) ;
    javaDate = new Date(list_of_requests[i].replydate);
    cell4.innerHTML = String(javaDate.getFullYear()) + "-" + String(javaDate.getMonth()+1) + "-" + String(javaDate.getDate()) ;
    cell5.innerHTML = " <form action='/giveAbook' method='POST'> <input type='text' class='username' name='username' value=" + sessionStorage.getItem("username") + " style='display:none'> <input type='text' class='tempPassword' name='temppassword' value=" + sessionStorage.getItem("tempPassword") + " style='display:none'> <input type='text' class='bookTitle' name='booktitle' value='" + list_of_requests[i].title + "' style='display:none'> <input type='text' class='clientName' name='clientname' value='"+ list_of_requests[i].username + "' + style='display:none'> <input type='submit' class='giveButton' value='Give'> </form> " ;
}
document.getElementById("username").defaultValue = sessionStorage.getItem("username");
document.getElementById("tempPassword").defaultValue = sessionStorage.getItem("tempPassword");