$('.toggle-all').on('click', function() {
  $('#infinite_carousel .row').toggleClass('flex-nowrap');
  $('#infinite_carousel .control').toggleClass('d-none');
  $(this).html($('#infinite_carousel .row').hasClass('flex-nowrap') ? '<i class="fa fa-th" aria-hidden="true"></i> Show All' : '<i class="fa fa-chevron-right" aria-hidden="true"></i> Show Slider');
});

$('#infinite_carousel .fa-chevron-right').on('click', () => {
  let $infinite_carousel_row = $('#infinite_carousel .row');
  let $col = $infinite_carousel_row.find('.col-3:first');
  $infinite_carousel_row.append($col[0].outerHTML);
  $col.remove();
});

$('#infinite_carousel .fa-chevron-left').on('click', () => {
  let $infinite_carousel_row = $('#infinite_carousel .row');
  let $col = $infinite_carousel_row.find('.col-3:last');
  $infinite_carousel_row.prepend($col[0].outerHTML);
  $col.remove();
});