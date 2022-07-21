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
cell1.innerHTML = "Book";
cell2.innerHTML = "Available" ;
cell3.innerHTML = "User";
cell4.innerHTML = "Request on" ;
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
    cell1.innerHTML = list_of_requests[i].Title;
    cell2.innerHTML = list_of_requests[i].QuantityAvailable;
    if ( ! (list_of_requests[i].QuantityAvailable) )
    {
        cell2.innerHTML = 0 ;        
    }
    cell3.innerHTML = list_of_requests[i].Username;
    javaDate = new Date(list_of_requests[i].RequestDate);
    cell4.innerHTML = String(javaDate.getFullYear()) + "-" + String(javaDate.getMonth()+1) + "-" + String(javaDate.getDate()) ;
    if (list_of_requests[i].Status == 0)
        {
            if (list_of_requests[i].QuantityAvailable == 0  ||  !( list_of_requests[i].QuantityAvailable ) ) 
            {
                cell5.innerHTML = "Unavailable" ;
            }
            else
            {
                cell5.innerHTML = " <form action='/actOnARequest' method='POST'> <input type='text' class='bookTitle' name='BookTitle' value='" + list_of_requests[i].Title + "' style='display:none'> <input type='text' class='clientName' name='ClientName' value='"+ list_of_requests[i].Username + "' + style='display:none'> <input type='submit' class='actButton' value='Accept'> </form> " ;
            }
        }
    else if (list_of_requests[i].Status == 1)
        {
            cell5.innerHTML = "Accepted";
        }
    else
        {
            if (list_of_requests[i].QuantityAvailable == 0)
            {
                cell5.innerHTML = "Unavailable" ;
            }
            else
            {
                cell5.innerHTML = " <form action='/actOnARequest' method='POST'> <input type='text' class='bookTitle' name='BookTitle' value='" + list_of_requests[i].Title + "' style='display:none'> <input type='text' class='clientName' name='ClientName' value='"+ list_of_requests[i].Username + "' + style='display:none'> <input type='submit' class='actButton' value='Accept'> </form> " ;
            }
        }
}