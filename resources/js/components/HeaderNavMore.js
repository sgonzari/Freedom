const HeaderNavMore = () => {
    const modalMore = document.getElementById("navMore");
    const btnMore = document.getElementById("navButton");

    btnMore.onclick = function () {
        modalMore.style.display = "block";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modalMore.style.display = "none";
        }
    }
}

export default HeaderNavMore;