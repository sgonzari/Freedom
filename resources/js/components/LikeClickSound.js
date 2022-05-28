const LikeClickSound = () => {
    var likes = document.querySelectorAll('.button__action--like')

    if (likes != null) {
        likes.forEach(like => {
            like.addEventListener('click', () => {
                var audio = document.getElementById('likeSound');
                
                if (like.classList.contains('notLiked')) {
                    audio.play();
                }
            })
        });
    }
}

export default LikeClickSound;