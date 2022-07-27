const dropdowns = {
  init: function() {
    document.addEventListener('click', dropdowns.handleClick);
  },

  handleClick:  function(event) {
    const avatarbtn = document.getElementById('avatarBtn');
    const avatarContent = document.getElementById("avatarDrop");
    const wikutBtn = document.getElementById('wikutBtn');
    const wikutLogoMob = document.getElementById('wikutLogoMob');
    const wikutContent = document.getElementById("wikutDrop");

    switch (event.target) {
      case avatarbtn:
        console.log('avatarbtn');
        avatarContent.classList.toggle('show');
        wikutContent.classList.remove('show');
        break;
      case wikutBtn:
        console.log('wikutBtn');
        wikutContent.classList.toggle('show');
        avatarContent.classList.remove('show');
        break;
      case wikutLogoMob:
        console.log('wikutLogoMob');
        wikutContent.classList.toggle('show');
        avatarContent.classList.remove('show');
        break;
      default:
        avatarContent.classList.remove('show');
        wikutContent.classList.remove('show');
        break;
    }



    /*if (event.target === avatarbtn) {
      console.log("avatarbtn");
    avatarContent.classList.toggle("show");
    }
    else {
      console.log("else");
    avatarContent.classList.remove("show");
    }*/
  },
};