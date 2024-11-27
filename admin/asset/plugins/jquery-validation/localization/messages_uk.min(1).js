/*! jQuery Validation Plugin - v1.19.3 - 1/9/2021
 * https://jqueryvalidation.org/
 * Copyright (c) 2021 Jörn Zaefferer; Licensed MIT */
!function(a){"function"==typeof define&&define.amd?define(["jquery","../jquery.validate.min"],a):"object"==typeof module&&module.exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){return a.extend(a.validator.messages,{required:"Це поле необхідно заповнити.",remote:"Будь ласка, введіть правильне значення.",email:"Будь ласка, введіть коректну адресу електронної пошти.",url:"Будь ласка, введіть коректний URL.",date:"Будь ласка, введіть коректну дату.",dateISO:"Будь ласка, введіть коректну дату у форматі ISO.",number:"Будь ласка, введіть число.",digits:"Вводите потрібно лише цифри.",creditcard:"Будь ласка, введіть правильний номер кредитної карти.",equalTo:"Будь ласка, введіть таке ж значення ще раз.",extension:"Будь ласка, виберіть файл з правильним розширенням.",maxlength:a.validator.format("Будь ласка, введіть не більше {0} символів."),minlength:a.validator.format("Будь ласка, введіть не менше {0} символів."),rangelength:a.validator.format("Будь ласка, введіть значення довжиною від {0} до {1} символів."),range:a.validator.format("Будь ласка, введіть число від {0} до {1}."),max:a.validator.format("Будь ласка, введіть число, менше або рівно {0}."),min:a.validator.format("Будь ласка, введіть число, більше або рівно {0}.")}),a});