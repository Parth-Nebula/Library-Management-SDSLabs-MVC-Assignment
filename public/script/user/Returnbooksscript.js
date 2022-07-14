let list_of_books = data_one;
let table = document.getElementById("booksTable");
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
cell1.innerHTML = "Title";
cell2.innerHTML = "Requested on" ;
cell3.innerHTML = "Accepted on" ;
cell4.innerHTML = "Issued on" ;
var javadate ; 
for (let i = 0 ; i < list_of_books.length ; i++)
{
    row = table.insertRow(i+1);
    cell1 = row.insertCell(0);
    cell1.style = "padding: 1vw; width: 27vw;";
    cell2 = row.insertCell(1);
    cell2.style = "padding: 1vw; width: 27vw;";
    cell3 = row.insertCell(2);
    cell3.style = "padding: 1vw; width: 27vw;";
    cell4 = row.insertCell(3);
    cell4.style = "padding: 1vw; width: 27vw;";
    cell5 = row.insertCell(4);
    cell5.style = "padding: 1vw; width: 27vw;";
    cell1.innerHTML = list_of_books[i].title;
    javaDate = new Date(list_of_books[i].requestdate);
    cell2.innerHTML = String(javaDate.getFullYear()) + "-" + String(javaDate.getMonth()+1) + "-" + String(javaDate.getDate()) ;
    javaDate = new Date(list_of_books[i].acceptdate);
    cell3.innerHTML = String(javaDate.getFullYear()) + "-" + String(javaDate.getMonth()+1) + "-" + String(javaDate.getDate()) ;
    javaDate = new Date(list_of_books[i].issuedate);
    cell4.innerHTML = String(javaDate.getFullYear()) + "-" + String(javaDate.getMonth()+1) + "-" + String(javaDate.getDate()) ;
    if ( list_of_books[i].returndate == null)
    {
        cell5.innerHTML = " <form action='/makeAreturn' method='POST'> <input type='text' class='username' name='username' value=" + sessionStorage.getItem("username") + " style='display:none'> <input type='text' class='tempPassword' name='temppassword' value=" + sessionStorage.getItem("tempPassword") + " style='display:none'> <input type='text' class='title' name='title' value='" + list_of_books[i].title + "' style='display:none'> <input type='submit' class='returnButton' value='Return'> </form> ";
    }
    else
    {
        cell5.innerHTML = "Returning..." ;
    }
}
document.getElementById("username").defaultValue = sessionStorage.getItem("username");
document.getElementById("tempPassword").defaultValue = sessionStorage.getItem("tempPassword");
