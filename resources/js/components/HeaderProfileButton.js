const HeaderProfileButton = () => {
    const modal = document.getElementById("profileOptions");
    const btn = document.getElementById('profileButton');

    if ((modal != null) && (btn != null)) {
        btn.addEventListener("click", () => {
            modal.style.display = "block";
        });
        window.addEventListener("click", (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        })
    }
}

export default HeaderProfileButton;