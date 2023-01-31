
const menud = document.getElementById("menudd"),
chevron = document.getElementById("chevron");

const toggleDropdown = () => {
  menud.classList.toggle("open");
};

const handleMenuButtonClicked = () => {
   toggleDropdown();
   window.location.href = "salir.php";
};
