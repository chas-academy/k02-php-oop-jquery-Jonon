//on profile icon button dropdown option

$(document).ready(() => {
    $('.dropdown__icon-button').on('click', () => {
        $('.dropdown-active').toggle();
    })

    $('.dropdown-active').on('mouseleave', () => {
        $('.dropdown-active').hide()
    })


})

