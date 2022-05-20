const ScrollToComment = () => {
    if ($('#comment').length) {
        $('#main').animate({
            scrollTop: $('#comment').offset().top - 50
        }, 'slow');
    }
}

export default ScrollToComment;