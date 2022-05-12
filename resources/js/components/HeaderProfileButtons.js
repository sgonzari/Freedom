const HeaderProfileButtons = () => {
    var modal = document.getElementById("profileOptions");
    var btn = document.getElementById('profileButton');

    btn.onclick = function () {
        modal.style.display = "block";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

export default HeaderProfileButtons;