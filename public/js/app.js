$(function () {
    $(".datepicker").datepicker();
});


$(function () {
    $(".autocomplete").autocomplete({
        source: base_url + "/searchCities",
        minLength: 2,
        select: function (event, ui) {

            console.log(ui.item.value);
        }


    });
});
