//on profile icon button dropdown option

$(document).ready(() => {
    $('.dropdown__icon-button').on('click', () => {
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




})

