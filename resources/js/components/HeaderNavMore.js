const HeaderNavMore = () => {
    var modal = document.getElementById("navMore");
    var modal2 = document.getElementById("navMore2");
    var btn = document.getElementById('navButton');

    if ((modal != null) && (modal2 != null) && (btn != null)) {
        btn.addEventListener("click", () => {
            modal.style.display = "block";
        });
        window.addEventListener("click", (event) => {
            if ((event.target == modal) || (event.target == modal2)) {
                modal.style.display = "none";
            }
        })
    }
}

export default HeaderNavMore;