$(function(){
  if (!window.history || !history.pushState)
    $('nav a[href], #home a[href]').attr('href', function(i, href){
      return href.replace(/^\//, '#');
    });
  
  $('nav a, #home a').click(function(){
    var target = $(this.href.replace(/^.*\/#?(.*)/, function(m, id){
      return '#' + (id || 'home');
    }));
    $('html, body').animate({ scrollTop: target.offset().top }, function(){
      window.scrollTo(0, target.offset().top);
    });
    
    if (window.history && history.pushState) {
      history.pushState({}, '', this.href );
      return false;
    } 
  });
  
  location.href.replace(/(\w+)\/?$/, function(loc, hash){
    $('nav a[href*="'+hash+'"]').click();
  });
  
  $('input[name=email], input[name=phone]').change(function(){
    var input = this;
    $('input[name=email], input[name=phone]')
      .attr('required', true)
      .not(input).attr('required', function(){
        if (!input.value.match(/^\s*$/)) return false;
        return true;
      });  
  });
  
  $('form').submit(function(e){
    e.preventDefault();
    $('.error').remove();
    var data = $(this).serialize();
    $('input, button', this).attr('disabled', true);
    $.ajax({
      type: 'POST',
      url: '/ajax',
      data: data,
      statusCode: {
        204: function(data){
          $('form button').text('Thank you! I will be in touch shortly.');
        },
        400:function(xhr){
          $('input, button').removeAttr('disabled');
          $.each($.parseJSON(xhr.responseText), function(i, error){
            $.each(error, function(name, text){
              $('<div class=error>'+text+'</div>').prependTo('form');
              $('[name='+name+']').focus().select();
            });
          });
          
        } 
      }
    });
  });
  

  $('input[placeholder]').placehold();
});


