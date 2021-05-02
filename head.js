function myBtn() {
    document.getElementById("Dropdown").classList.toggle("show");
}
document.getElementById("Dropdown").addEventListener('click', function (event) {
    event.stopPropagation();
});
window.onclick = function(event) {
    if (!event.target.matches('.icon_bg') && !event.target.matches('.icon_img')) {
      
        var dropdowns = 
        document.getElementsByClassName("hamberg");
          
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}