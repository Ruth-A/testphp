$(document).ready(function(){

  let citySelector = $('#city');
  let districtSelector = $('#district');

  let groupCity = $('#group-city');
  let groupDistrict = $('#group-district');

  groupCity.hide();
  groupDistrict.hide();


  // Обновить варианты выбора адреса
  function updateOptions(selector, group, id) {

    group.hide();
    districtSelector.removeAttr("name");

    // Удалисть устаревшие варианты
    selector.children("option").remove();
    selector.append($('<option>', { value: '',}));

    // Запросить актуальные варианты
    $.ajax({
      url: '/ajax'+selector.attr("id")+'s/'+id,
      type: 'get',
      dataType: 'JSON',
      success: function(response){

          console.log(response.length);

          for(let i=0; i<response.length; i++){
  
              let option = "<option " +
                  "value='" + response[i].id + "'>" +
                  response[i].name +
                  "</option>";
  
              selector.append(option);
          }
          
            selector.chosen({ width: '100%' });
            selector.trigger("chosen:updated");

            if (response.length>0) {
              selector.attr("name", "address");
              group.show();
            }
      }
    });
  }

  // Обработчик события измения выбора региона
  $('#region').on('change', function(evt, params) {
    updateOptions(citySelector, groupCity, params.selected);
    groupDistrict.hide();
  });

  // Обработчик события измения выбора города
  $('#city').on('change', function(evt, params) {
    updateOptions(districtSelector, groupDistrict, params.selected)
  });

});