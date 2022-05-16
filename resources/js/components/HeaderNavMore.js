const HeaderNavMore = () => {
    var modal = document.getElementById("navMore");
    var btn = document.getElementById('navButton');

    btn.addEventListener("click", () => {
        modal.style.display = "block";
    });
    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    })
}

export default HeaderNavMore;