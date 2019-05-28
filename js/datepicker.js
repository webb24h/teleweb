$(function () {
  $(".datepicker").datepicker({ 
      dateFormat: 'yy-mm-dd',
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update', new Date());
});
