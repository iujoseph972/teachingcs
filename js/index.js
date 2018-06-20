$(document).ready(function() {

  $('#standard').on('change', function() {
    var selected = $(this).val();
    $('#grade .label').prop('selected', true);
    $('#concept .label').prop('selected', true);
    if(selected === "ap") {
      $('#grade .label').text('Please Select a Sub-standard');
      $('#grade option:not(.label)').hide();
      $('#grade .ap').show();
    }
    if(selected === "csta") {
      $('#grade .label').text('Please Select a Grade');
      $('#grade option:not(.label)').hide();
      $('#grade .csta').show();
    }
    if(selected === "iste") {
      $('#grade .label').text('Please Select a Sub-standard');
      $('#grade option:not(.label)').hide();
      $('#grade .iste').show();
    }
    if(selected === "indiana") {
      $('#grade .label').text('Please Select a Grade');
      $('#grade option:not(.label)').hide();
      $('#grade .indiana').show();
    }
  });

  $('#grade').on('change', function() {
    var selected = $(this).val();
    $('#concept .label').prop('selected', true);
    if(selected === "practices") {
      $('#concept option:not(.label)').hide();
      $('#concept .app').show();
    }
    if(selected === "concepts") {
      $('#concept option:not(.label)').hide();
      $('#concept .apc').show();
    }
    if(selected === "k-2csta" || selected === "3-5csta" || selected === "6-8csta" || selected === "9-10csta" || selected === "11-12csta") {
      $('#concept option:not(.label)').hide();
      $('#concept .csta').show();
    }
    if(selected === "k-2indiana" || selected === "3-5indiana" || selected === "6-8indiana" ) {
      $('#concept option:not(.label)').hide();
      $('#concept .indiana').show();
    }
    if(selected === "koco" || selected === "etls" || selected === "elev" || selected === "epks") {
      $('#concept option:not(.label)').hide();
      $('#concept .iste').show();
    }
  });

  $('#homesearch').on('click tap', function() {
    var standard = $('#standard').val();
    var grade = $('#grade').val();
    var concept = $('#concept').val();
    if(standard != null && grade != null && concept != null) {
      location.href = '/results/' + standard +'/' + grade + '/' + concept + '/';
    } else {
      var error = '';
      if(standard === null) {
        error += 'standard';
      }
      if(grade === null) {
        error += 'grade';
      }
      if(concept === null) {
        error += 'concept';
      }
      alert(error)
    }
  });

});
