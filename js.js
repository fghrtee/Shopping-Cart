function addItem() {
    alert("Item added Successfully");
    var name = document.getElementById("name1").innerText;
    var price = document.getElementById("price1").innerText;
    var table = document.getElementById("table1");
    var cartEmptyMessage = document.getElementById("cartEmptyMessage");

    // Create a table row
    var tr = document.createElement("tr");

    // Create a table cell for the name
    var tdName = document.createElement("td");
    var spanName = document.createElement("span");
    spanName.innerText = name;
    tdName.appendChild(spanName);

    // Create a table cell for the price
    var tdPrice = document.createElement("td");
    var pPrice = document.createElement("p");
    pPrice.innerText = price;
    tdPrice.appendChild(pPrice);

    // Create a table cell for the delete button
    var tdDelete = document.createElement("td");
    var deleteButton = document.createElement("button");
    deleteButton.innerText = "Remove";
    deleteButton.className = "btn btn-danger";
    deleteButton.addEventListener("click", function() {
        // Function to delete the row when the button is clicked
        table.deleteRow(tr.rowIndex);
        checkCartEmpty();
    });
    tdDelete.appendChild(deleteButton);

    // Append the cells to the row
    tr.appendChild(tdName);
    tr.appendChild(tdPrice);
    tr.appendChild(tdDelete);

    // Append the row to the table
    table.appendChild(tr);

    // Hide the cart empty message
    cartEmptyMessage.style.display = "none";

    // Check if the cart is empty
    checkCartEmpty();
}

function checkCartEmpty() {
    var table = document.getElementById("table1");
    var cartEmptyMessage = document.getElementById("cartEmptyMessage");

    // Check if the table has rows
    if (table.rows.length === 1) { // Assuming the first row is the header
        // Show the cart empty message
        cartEmptyMessage.style.display = "block";
    } else {
        // Hide the cart empty message
        cartEmptyMessage.style.display = "none";
    }
   
}