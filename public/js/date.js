function refrClock() {

  var d = new Date();

  var day = d.getDay();

  var date = d.getDate();

  var month = d.getMonth();

  var year = d.getFullYear();

  var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

  var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  var am_pm;

  document.getElementById("clock").innerHTML = days[day] + " " + date + "," + months[month] + "," + year;
  setTimeout("refrClock()", 1000);
}
refrClock();
