
// Step 1: Sample JSON data
const jsonData = [
    {
        "name": "Alice",
        "age": 25,
        "city": "New York"
    },
    {
        "name": "Bob",
        "age": 30,
        "city": "Los Angeles"
    },
    {
        "name": "Charlie",
        "age": 35,
        "city": "Chicago"
    }
];

// Step 2: Select HTML table
const table = document.getElementById('dataTable');

// Step 3: Create table header
const createTableHeader = (data) => {

    const header = table.createTHead();
    const row = header.insertRow();

    Object.keys(data[0]).forEach(key => {

        const th = document.createElement('th');

        th.textContent = key.toUpperCase();

        row.appendChild(th);

    });
};

// Step 4: Create table rows
const createTableRows = (data) => {

    const tbody = table.createTBody();

    data.forEach(item => {

        const row = tbody.insertRow();

        Object.values(item).forEach(value => {

            const cell = row.insertCell();

            cell.textContent = value;

        });

    });
};

// Step 5: Render JSON data into table
if (jsonData.length > 0) {

    createTableHeader(jsonData);

    createTableRows(jsonData);

} else {

    table.textContent = "No data available.";

}
