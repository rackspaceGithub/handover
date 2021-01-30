function fetch_results(value) {
  let results = value;
  let xmlhttp = new XMLHttpRequest();
  let display_results = document.getElementById('results');
  xmlhttp.open("GET", "../src/config/ticket_search.php?search=" + results);
  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlhttp.send();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      display_results.innerHTML = this.responseText;
    } 
    else {
      display_results.innerHTML = "Searching...";
    };
  }
}