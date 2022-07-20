$.ajax({
    type: "POST",
    url: "fetch_db.php",
    dataType: "json",

    success: function (data) {
        //displaying customers from DB
        n = Object.keys(data).length;
        let ctmr_list = document.getElementsByClassName('table_body');
        ctmr_list[0].innerHTML="";
        customer1.innerHTML="";
        customer2.innerHTML="";
        for (let i = 0; i < n - 1; i++) {
            let id = data[i]['id'];
            let ctmr_row_html = `<tr>
            <th scope="row" style="padding-left:1.4em ;">${id}</th>
            <td class="ctmr">${data[i]['name']}</td>
            <td>${data[i]['number']}</td>
            </tr> `;
            ctmr_list[0].insertAdjacentHTML('beforeEnd', ctmr_row_html);

            //adding to customer options for transfer page
            let option_html = `<option >${data[i]['name']}</option>`;
            
            customer1.insertAdjacentHTML('beforeEnd', option_html);
            customer2.insertAdjacentHTML('beforeEnd', option_html);

        }

        //displaying transactions
        let t_data = data[n - 1]['transaction'];
        let transaction_window = document.getElementsByClassName("transaction_window");
        transaction_window[0].innerHTML="";
        tn = Object.keys(t_data).length;
        for (let i = 0; i < tn; i++) {
            let transaction_html = `<div class="transaction" > ${i+1}.  ${t_data[i]['c1']}        send Rs. ${t_data[i]['Amount']}  to         ${t_data[i]['c2']}</div>`;
            transaction_window[0].insertAdjacentHTML('beforeEnd', transaction_html);
        }


    }
})
    .then(() => {
        // adding event listeners
        let ctmr = document.getElementsByClassName("ctmr");
        for (let i = 0; i < ctmr.length; i++) {
            ctmr[i].addEventListener('click', showprofile);
        }

    });

//shows more detail box of customers 
function showprofile(event) {
    let ctmrbox = event.target;
    ctmrbox.classList.add('ctmrbox');
    let ctmrbox2 = document.getElementsByClassName('ctmrbox');
    if (ctmrbox2.length > 1) {
        prev.getElementsByClassName('table')[0].remove();
        prev.classList.remove('ctmrbox');
    }
    prev = ctmrbox;

    $.ajax({
        type:"POST",
        url:"fetch_db.php",
        dataType:"json",
        success: function(data){

            // find index of ctmrbox being displayed
            for (let i = 0; i < data.length; i++) {
                if(ctmrbox2[0].innerText==data[i]['name']){
                    var index = data[i]['id'];
                }              
            }
            //displaying more details
            let ctmrbox = document.getElementsByClassName('ctmrbox');
            let more_details_html = `<table class="table" style="margin-top:.7em">
            <thead>
            </thead>
            <tbody class="table_body">
            <tr>
                <th scope="col" style="padding-left:1em ;">Balance:</th>
                <td scope="col">${data[index-1]['balance']}</td>
            </tr>
            <tr>
                <th scope="col" style="padding-left:1em ;">Age:</th>
                <td scope="col">${data[index-1]['age']}</td>
            </tr>
            <tr>
                <th scope="col" style="padding-left:1em ;">Credit Score:</th>
                <td scope="col">${data[index-1]['credit_score']}</td>
            </tr>
            </tbody>
            </table>`;
            ctmrbox[0].insertAdjacentHTML('beforeEnd', more_details_html);


        },
    });


}