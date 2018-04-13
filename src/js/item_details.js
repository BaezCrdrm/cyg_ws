$("document").ready(function()
{
    document_Load('id', '../../src/php/adm/items_sub.php');
    changed_category({value:1});
});

function getInfoFromServer()
{
    $.ajax(
        {
            type: "GET",
            data: {action:'consult', id:params["id"]},
            url: "../../src/php/adm/items_sub.php",
            success: function(data){
                console.log(data);
                data = JSON.parse(data);
                
                renderItemData(data);
            }
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
    hide_all_items_divs();
    if(_select.value == 1 || _select.value == 2)
    {
        $("#div_movie_item").show();
    } else if(_select.value == 3)
    {
        $("#div_song_item").show();
    }
}

function hide_all_items_divs()
{
    $("#div_movie_item").hide();
    $("#div_song_item").hide();
}

function renderItemData(data)
{
    $("#inp_action").val('modify');
    $("#inp_id").val(data.id);
    $("#sel_category").val(data.itemCategory);
    $("#inp_title").val(data.originalTitle);
    $("#inp_year").val(data.year);
    $("#sel_mov_category").val(data.movieCategory.id);
    $("#inp_info").val(data.info);
}