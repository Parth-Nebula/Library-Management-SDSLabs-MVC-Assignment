let list_of_books = data_one;
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
    cell1.innerHTML = list_of_books[i].Title;
    cell2.innerHTML = list_of_books[i].Quantity;
    cell3.innerHTML = list_of_books[i].QuantityAvailable;
    cell4.innerHTML = "  <form action='/removeABook' method='POST'> <div class='lineBox'> <input type='text' class='bookTitle' name='BookTitle' value='" + list_of_books[i].Title + "' style='display:none'> <input type='text' class='quantBox' placeholder ='Amnt' name=QuantityFilled> <input type='submit' class='removeButton' value='Remove'> </div> </form>  ";
}