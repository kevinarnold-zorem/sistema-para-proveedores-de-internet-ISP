const driver = new Driver();
var myid = document.getElementById('myform');
myid.onclick = function(){
    driver.highlight({
        element: '#myform',
        popover: {
            title: 'Please input only text and number',
            description: 'This is form for comment, and you can input text, link or whatever',
        }
    });
}