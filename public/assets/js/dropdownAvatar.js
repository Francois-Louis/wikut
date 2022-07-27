const dropdownAvatar = {
  init: function() {
    document.addEventListener('click', dropdownAvatar.handleClick);
  },

  handleClick:  function(event) {
    const dropbtn = document.getElementById('avatarBtn');
    const dropdownContent = document.getElementById("avatarDrop");
    if (event.target === dropbtn) {
    dropdownContent.classList.toggle("show");
    }
    else {
    dropdownContent.classList.remove("show");
    }
  },
};