var chairState = [];

function togglechair(chairId) {
  var chair = document.getElementById(chairId);
  if (chairState[chairId] == undefined || chairState[chairId] == false) {
    chairState[chairId] = true;
    chair.src="seat (1).png";
  } else {
    chairState[chairId] = false;
    chair.src="seat.png";
  }
}
