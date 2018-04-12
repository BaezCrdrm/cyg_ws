$("document").ready(function()
{
    _url = "../../service/rest/get_item.php";
    // Load items to memory
    $.ajax(
    {
        url: _url,
        success: function(data, status)
        {
            data = JSON.parse(data);
            let table = renderList(data);
            document.getElementById("items").appendChild(table);
        }
    });
});

// Render list
function renderList(data)
{
    var table = document.createElement("table");

    titles = ['Item ID', 'Item title', 'Language', 'Translation title', 'Movie category', 'Year', 'URL', ''];
    var tr = document.createElement("tr");
    titles.forEach(element => {            
        let td = document.createElement("th");
        let text = document.createTextNode(element);
        td.appendChild(text);
        tr.appendChild(td);
    });
    table.appendChild(tr);

    data.forEach(i => {
        let tr = createTr(i);
        let a = document.createElement('a');
        a.href = "item_details.html?id=" + i.item_id;
        a.appendChild(document.createTextNode("Ver"));
        let td = document.createElement("td");
        td.appendChild(a);
        tr.appendChild(td);

        table.appendChild(tr);
    });
    return table;
}

function createTr(i, tc = "td")
{
    var tr = document.createElement("tr");
    for (var key in i) {
        if (i.hasOwnProperty(key)) {
            let td = document.createElement(tc);
            let text = document.createTextNode(i[key]);
            td.appendChild(text);
            tr.appendChild(td);
        }
    }

    return tr;
}