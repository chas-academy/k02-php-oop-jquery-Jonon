//on profile icon button dropdown option

$(document).ready(() => {
    $('.dropdown__icon-button').on('click', (e) => {
        e.stopPropagation();
        $('.dropdown-active').toggle();
        if ($('.arrow-down').toggleClass('arrow-up')) {
            $('.arrow-up').toggleClass('arrow-down');
        } 
        else {
            $('.arrow-down').toggleClass('arrow-up')
        }
        $('.arrow-down').toggleClass('arrow-up')
       
    })

    $('.dropdown-active').on('mouseleave', () => {
        $('.dropdown-active').hide()
        if ($('.arrow-up').toggleClass('arrow-down')) {
            $('.arrow-down').toggleClass('arrow-up');
        }
    })

    // close dropdown on click outside menu
    $("body").on('click', () => {
        $('.dropdown-active').hide();
        if ($('.arrow-up').toggleClass('arrow-down')) {
            $('.arrow-down').toggleClass('arrow-up');
        }
    })


    // Add active class to active menu element
    $('#mainnav[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
})