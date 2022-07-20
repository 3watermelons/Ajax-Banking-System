send_btn.addEventListener("click", update_balance);
//function to tell php to update values
function update_balance() {
  let c1 = customer1.value;
  let c2 = customer2.value;
  let a = amount.value;

  //check if request is feasible

  //checking balance
  let insuff_bal = 0;
  $.ajax({
    type: "POST",
    url: "fetch_db.php",
    dataType: "json",
    success: function (data) {
      for (let i = 0; i < data.length - 1; i++) {
        if (data[i]["name"] == c1) {
          let balance = parseInt(data[i]["balance"]);
          if (a > balance) {
            insuff_bal = 1;
            return false;
          }
        }
      }

    }
  })
    .then(() => {
      if (c1 === "" || c2 === "" || a === "0") {
        alert("PlEASE FILL ALL THE FIELDS");
        return false;
      } else if (a <= 0) {
        alert("Please enter a POSITIVE AMOUNT");
        return false;
      } else if (c1 == c2) {
        alert("Select A Different Customer");
        return false;
        console.log("5433");
      } else if (insuff_bal == 1) {
        alert("INSUFFICIENT FUNDS");
        return false;
      } else {
        let formdata = {
          c1: c1,
          c2: c2,
          amount: a,
        };
        jsondata = JSON.stringify(formdata);
        //for some reason giving json creates problems

        $.ajax({
          url: "update_db.php",
          method: "POST",
          data: formdata,
          success: function (res) {
            console.log(res);
            $.ajax({
              url: "js/fetch_db.js",
              method: "POST",
              success: function (res) {
                console.log(res);
              },
            })
          },
        });

        let success_alert_html = `<div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Payment successful!</h4>
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      </div> `;
        document.body.insertAdjacentHTML("beforeBegin", success_alert_html);

      }
    });
}
