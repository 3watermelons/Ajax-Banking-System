//adding page switching mechanism
let ctmr = document.getElementsByClassName('table');
ctmr[0].style.display = 'block'; 
let tw =  document.getElementsByClassName('transfer_window');
tw[0].style.display = 'none';
let trw =  document.getElementsByClassName('transaction_window');
trw[0].style.display = 'none';      

let tab = document.getElementsByClassName('tab1');

tab[0].addEventListener('click', ()=>{
    ctmr[0].style.display = 'block';
    tw[0].style.display = 'none';
    trw[0].style.display = 'none';          
});

tab[1].addEventListener('click', ()=>{
    ctmr[0].style.display = 'none';
    tw[0].style.display = 'block';
    trw[0].style.display = 'none';             
});

tab[2].addEventListener('click', ()=>{
    ctmr[0].style.display = 'none';
    tw[0].style.display = 'none';
    trw[0].style.display = 'block';             
    });