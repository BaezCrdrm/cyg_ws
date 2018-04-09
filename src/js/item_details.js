$("document").ready(function()
{
    document_Load('itid', '../../src/php/adm/items_sub.php');
});

function getInfoFromServer()
{
    $.ajax(
        {
            type: "GET",
            data: {action:'consult', id:params["id"]},
            url: "../../src/php/adm/items_sub.php",
            success: postToPage
        }
    );
}

function loadPageData()
{
    loadCatalogData('cat', '#sel_category');
    loadCatalogData('movcat', '#sel_mov_category');
}

function changed_category(_select)
{
    if(_select.value == 1)
    {
        $("#lab_mov_category").show();
        $("#sel_mov_category").show();
    } else {
        $("#lab_mov_category").hide();
        $("#sel_mov_category").hide();
    }
}