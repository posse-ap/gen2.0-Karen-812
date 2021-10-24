let calender = document.getElementById('calender');
let fp = flatpickr(calender, {
    dateFormat: 'Y-n-j(l)' // フォーマットの変更
});

function open_modal(){
    document.getElementById('modal_content').className = 'modal_open';
};

function close_modal(){
    document.getElementById('modal_content').className = 'modal_closed';
};

function post(){
    document.getElementById('posted').className = 'after_post'
    // document.getElementsByClassName('upper_section').className = 'invisible'
    // document.getElementsByClassName('under_section').className = 'invisible'
    document.getElementById('modal_inside').className = 'hidden'
}
