//on profile icon button dropdown option

$(document).ready(() => {
    $('.dropdown__icon-button').on('click', (e) => {
        e.stopPropagation();
        $('.dropdown-active').fadeToggle(400);
        $('.arrow-down').toggleClass('rotate');
        
    })

    $('.dropdown-active').on('mouseleave', () => {
        $('.dropdown-active').fadeOut(400)
        $('.arrow-down').removeClass('rotate');
    })

    // close dropdown on click outside menu
    $("body").on('click', () => {
        $('.dropdown-active').fadeOut(400)
        $('.arrow-down').removeClass('rotate');
    })

    
    // Add active class to active menu element
    $('#mainnav[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');

    $('.tweet-button').on('click', () => {
        $('.main-modal').show();
        $('.tweet-button').hide();
      
    })

    $('.close').on('click', () => {
        $('.main-modal').hide();
        $('.tweet-button').show();
    })
    
})