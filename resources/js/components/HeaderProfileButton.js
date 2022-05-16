const HeaderProfileButton = () => {
    var modal = document.getElementById("profileOptions");
    var btn = document.getElementById('profileButton');

    btn.addEventListener("click", () => {
        modal.style.display = "block";
    });
    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    })
}

export default HeaderProfileButton;