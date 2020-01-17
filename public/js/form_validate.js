$(document).ready(function(){

  function validateForm() {

    let formContainer = $('.signup-form');
    
    //Данные из формы
    let fullName = $("[name = 'full_name']").val();
    let email = $("[name = 'email']").val();
    let address = $("[name = 'address']").val();

    //Массив ошибок
    let errors = [];

    //Регулярное выражение для проверки ФИО
    let patternFullName = /^[А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+$/;
    let patternAddress = /[0-9]{10}/;

    //Проверка данных
    if(fullName == false) {errors.push('ФИО не заполнено');}
    else if (!(patternFullName.test(fullName))) {errors.push('ФИО не не корректно');}

    if(email == '') {errors.push('email не заполнен');}

    if(address == '') {errors.push('Район не указан');}
    else if (!(patternAddress.test(address))) {errors.push('Адрес не корректен');}

    //Если есть ошибки отобразить их
    if(errors.length > 0) {
      $(".alert").remove();

      for (i = 0; i < errors.length; i++) {
        $('div', {class: 'alert alert-danger', text: errors[i]}).appendTo(formContainer);
        let error = "<div class='alert alert-danger'>" + errors[i] + "</div>";
  
        formContainer.prepend(error);
      }

      //отменить отправку формы
      return false;
    }

    return true;
  }

  // обработчик отправки формы
  $('#form').submit(validateForm);

});