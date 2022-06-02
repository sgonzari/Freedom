const HeaderNavMore = () => {
    const modal = document.getElementById("navMore");
    const btn = document.getElementById('navButton');

    if ((modal != null) && (btn != null)) {
        btn.addEventListener("click", () => {
            modal.style.display = "block";
        });
        window.addEventListener("click", (event) => {
            if ((event.target == modal)) {
                modal.style.display = "none";
            }
        })
    }
}

export default HeaderNavMore;