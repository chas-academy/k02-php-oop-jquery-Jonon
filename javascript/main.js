//on profile icon button dropdown option

$(document).ready(() => {
    $('.dropdown__icon-button').on('click', () => {
        $('.dropdown-active').toggle();
        $('.up').toggleClass('down');
    })

    $('.dropdown-active').on('mouseleave', () => {
        $('.dropdown-active').hide()
        $('.up').removeClass('down');
    })




})

