function predict(){
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200){
      let response = JSON.parse(this.responseText);
      console.log(response);
      zombie_label = ["Sain", "Infecté"];
      zombie_color = ["green", "red"];
      console.log(document.getElementById("result"));
      document.getElementById("result").innerHTML = zombie_label[response["result"]];
      document.getElementById("result").style.color = zombie_color[response["result"]];
    }
  };
  xmlhttp.open("POST", "/zombie", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  dataset = document.querySelector('input[name="dataset"]:checked').value;
  x1 = document.getElementById("x1").value;
  x2 = document.getElementById("x2").value;
  xmlhttp.send("dataset="+dataset+"&x1="+x1+"&x2="+x2);
}

submit_btn = document.getElementById("submit-btn");
console.log(submit_btn);
submit_btn.addEventListener("click", predict);
