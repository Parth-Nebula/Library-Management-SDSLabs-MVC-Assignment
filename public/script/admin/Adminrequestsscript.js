let list_of_requests = data_one;
let list_of_admins = data_two;
let table = document.getElementById("booksTable");
let row;
let cell1;
let cell2; 
let cell3; 
row = table.insertRow(0);
cell1 = row.insertCell(0);
cell1.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell2 = row.insertCell(1);
cell2.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell3 = row.insertCell(2);
cell3.style = "padding: 1vw; width: 27vw; font-size: 2.4vw;";
cell1.innerHTML = "Username";
for (let i = 0 ; i < list_of_requests.length ; i++)
{
    row = table.insertRow(i+1);
    cell1 = row.insertCell(0);
    cell1.style = "padding: 1vw; width: 27vw;" ;
    cell2 = row.insertCell(1);
    cell2.style = "padding: 1vw; width: 27vw;" ;
    cell3 = row.insertCell(2);
    cell3.style = "padding: 1vw; width: 27vw;" ;
    cell1.innerHTML = list_of_requests[i].Username;
    check = 0
    for (let j = 0 ; j < list_of_admins.length ; j++)
    {
        if (list_of_requests[i].Username == list_of_admins[j].Username)
        {
            check = 1;
            break;
        }
    }
    if (check)
    {
        cell2.innerHTML = "Username Taken";
        cell3.innerHTML = "  <form action='/approveAnAdmin' method='POST'> <input type='text' class='adminUsername' name='AdminUsername' value='" + list_of_requests[i].Username + "' style='display:none'> <input type='text' class='action' name='Action' value = 2 style='display:none'> <input type='submit' class='approveButton' value='Deny'> </form>  ";
    }
    else
    {
        cell2.innerHTML = "  <form action='/approveAnAdmin' method='POST'> <input type='text' class='adminUsername' name='AdminUsername' value='" + list_of_requests[i].Username + "' style='display:none'> <input type='text' class='action' name='Action' value = 1 style='display:none'> <input type='submit' class='approveButton' value='Approve'> </form>  ";
        cell3.innerHTML = "  <form action='/approveAnAdmin' method='POST'> <input type='text' class='adminUsername' name='AdminUsername' value='" + list_of_requests[i].Username + "' style='display:none'> <input type='text' class='action' name='Action' value = 2 style='display:none'> <input type='submit' class='approveButton' value='Deny'> </form>  ";
    }
}