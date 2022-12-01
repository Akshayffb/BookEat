function Open(evt, Name) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("mainaside");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].classList.remove("active");
  }
  document.getElementById(Name).style.display = "block";
  if (evt) {
    evt.currentTarget.classList.add("active");
  } 
}