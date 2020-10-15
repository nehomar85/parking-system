$(function() {
  $('input[name="rangofechas"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="rangofechas"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
  });

  $('input[name="rangofechas"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});