$ ->
    $('#app').text('Hello')
    .delay(3000).slideUp(1000).delay(3000).slideDown 1000,-> 
        document.title='Title'