/*
json = [
    {
        "Name":"A",
        "Age": 12,
        "MonHoc": {
            "1":"Toán",
            "2":"Lý"
        }
    },
    {
        "Name":"A",
        "Age": 12,
        "MonHoc": {
            "1":"Toán",
            "2":"Lý"
        }
    }
];
var enc = JSON.stringify(json);
var dec = JSON.parse(enc);
console.log(enc,dec);
*/

function POST() // public void
{
    // Đọc dữ liệu bên trong 2 input
    var inp1 = document.getElementById('value1').value;
    var inp2 = document.getElementById('value2').value;

    //var val = "value="+inp1+"&value2="+inp2;
    //console.log(val);

    var json = 
        {
            "input1": inp1,
            "input2":inp2
        }
    ;
    var enc = JSON.stringify(json);
    var request= new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = request.responseText;
            console.log(data);
        }
    };
    //request.open("GET", "test.php?"+val, true);
    request.open("POST", "test.php", true);
    request.setRequestHeader("Content-type", "application/json");
    request.send(enc);
}

