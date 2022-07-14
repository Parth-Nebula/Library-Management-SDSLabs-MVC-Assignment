let list_of_books = data_one;
let list_of_issue_requests = data_two;
let list_of_issued_books = data_three;
let table = document.getElementById("booksTable");
let row;
let cell1;
let cell2; 
let cell3;
let cell4;
row = table.insertRow(0);
cell1 = row.insertCell(0);
cell1.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell2 = row.insertCell(1);
cell2.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell3 = row.insertCell(2);
cell3.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell4 = row.insertCell(3);
cell4.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell1.innerHTML = "Title";
cell2.innerHTML = "Total" ;
cell3.innerHTML = "Available";
cell4.innerHTML = "Request";
for (let i = 0 ; i < list_of_books.length ; i++)
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
    cell1.innerHTML = list_of_books[i].title;
    cell2.innerHTML = list_of_books[i].quantity;
    cell3.innerHTML = list_of_books[i].quantityavailable;
    let check = 0 ;
    for (let j = 0 ; j < list_of_issue_requests.length ; j++)
    {
        if (list_of_issue_requests[j].username == sessionStorage.getItem("username") && list_of_issue_requests[j].title == list_of_books[i].title)
        {
            check = 1 ;
            break;
        }
    }
    if (!(check))
    {
        for (let j = 0 ; j < list_of_issued_books.length ; j++)
            {
                if (list_of_issued_books[j].username == sessionStorage.getItem("username") &&  list_of_issued_books[j].title == list_of_books[i].title)
                {
                    check = 2 ;
                    break;
                }
            } 
    }
    if (check == 1)
    {
        cell4.innerHTML = "Requested";
    }
    else if (check == 2)
    {
        cell4.innerHTML = "Issued";
    }
    else
    {
        cell4.innerHTML = " <form action='/makeArequest' method='POST'> <input type='text' class='username' name='username' value=" + sessionStorage.getItem("username") + " style='display:none'> <input type='text' class='tempPassword' name='temppassword' value=" + sessionStorage.getItem("tempPassword") + " style='display:none'> <input type='text' class='bookTitle' name='booktitle' value='" + list_of_books[i].title + "' style='display:none'> <input type='submit' class='requestButton' value='Request'> </form> ";
    }
}
document.getElementById("username").defaultValue = sessionStorage.getItem("username");
document.getElementById("tempPassword").defaultValue = sessionStorage.getItem("tempPassword");