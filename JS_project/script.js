// dom element
const table = document.querySelector('tbody');
const formbox = document.querySelector('.modal1')
const form = document.getElementById('form1');
const newentry = document.querySelector('.button');
const overlay = document.querySelector('.overlay');
const submit = document.querySelector('.submit');
const searchData = document.querySelector('.modal2');

// open form 
newentry.addEventListener('click',function(){
    openform();
});
// hide form
overlay.addEventListener('click',function(){
    overlay.classList.add('hidden');
    formbox.classList.add('hidden'); 
    searchData.classList.add('hidden'); 
    document.getElementById('book-name').value = '';
    document.getElementById('author').value = '';
    document.getElementById('price').value = ''
    document.getElementById('Quantaty').value = '';
    document.getElementById('available').value = ''
});

window.onload = () =>{
    // localStorage.Item('carinfo',JSON.stringify(carinfo));
    showData();
 }

// data maipulation
let id= 'no';

// ManageData
function manageData()
{
    book = document.getElementById('book-name').value;
    author = document.getElementById('author').value;
    price= document.getElementById('price').value;
    Quantaty = document.getElementById('Quantaty').value;
    available =document.getElementById('available').value;

    if(book=='' || author=='' || price=='')
    {
        return 0;
    }
    else
    {
        if(id == 'no')
        {
            let arr = getData();
            if(arr==null)
            {
                let data = [[book, author, price, Quantaty, available]];;
                setData(data);
                //showmsg('Data Added!');
            }
            else{
                let add  = false;
                for(k in arr)
                {
                if(book == arr[k][0] && author == arr[k][1])
                {
                   add = true;
                   msg =`${book} is already available`;
                   //showmsg(msg);
                    break;
                }
                }
                if(add == false){
                    arr.push([book, author, price, Quantaty, available]);
                    setData(arr);
                    //showmsg('Data Added!');
                }
            }
        }
        else{
            let arr = getData();
            arr[id][0] = book; arr[id][1]= author; arr[id][2] = price;
            arr[id][3] = Quantaty; arr[id][4] = available;
            setData(arr);
            //showmsg('Data Updated!');
        }
       
    }
    showData();
    resetform();
    
}

function resetform(){
    document.getElementById('book-name').value = '';
    document.getElementById('author').value = '';
    document.getElementById('price').value = '';
    document.getElementById('Quantaty').value = '';
    document.getElementById('available').value = '';
    formbox.classList.add('hidden');
    overlay.classList.add('hidden');
}

//Select data
function showData()
{
    let arr = getData();
    if(arr!=null)
    {
        let html = '';
        let sno = 1;
        table.innerHTML = '';
        for(let k in arr)
        {
            html += `<tr><td>${sno}</td> 
            <td>${arr[k][0]}</td>
             <td>${arr[k][1]}</td> 
             <td>${arr[k][2]}</td> 
             <td>${arr[k][3]}</td> 
             <td>${arr[k][4]}</td> 
             <td><button onclick="editData(${k})">📝</button><button onclick="deleteData(${k})">🗑</button></td></tr>`;
            sno++;
        }
        table.innerHTML = html;
        
    }
}
//edit data
function editData(rid)
{
    id = rid
    openform();
    let arr = getData();
    console.log(arr[rid][0]);

    document.getElementById('book-name').value = arr[rid][0];
    document.getElementById('author').value = arr[rid][1];
    document.getElementById('price').value = arr[rid][2];
    document.getElementById('Quantaty').value = arr[rid][3];
    document.getElementById('available').value = arr[rid][4];

}

//Delete Data
function deleteData(rid)
{
    let  arr = getData();
    let del = confirm("Are you sure you want to delete this book");
    if(del == true)
    {
        arr.splice(rid,1);
        setData(arr);
        showData();
        searchData.innerHTML = `Data Deleted!`;
        overlay.classList.remove('hidden'); 
        searchData.classList.remove('hidden');
    }
    else{
        return 0;
    }

}
// repeated statment
function getData()
{
    let  arr = JSON.parse(localStorage.getItem('carinfo'));
    return arr;
}

function setData(arr)
{
    localStorage.setItem('carinfo',JSON.stringify(arr));
}
function searchHtml(h,arr)
{
    h = `<div><label>Model No.:</label><label> ${arr[k][0]} </label></div>
            <div><label>Car Name:</label><label >${arr[k][1]} </label></div>
            <div><label>Comapny Name:</label><label> ${arr[k][2]} </label></div>
            <div><label>Engine Type:</label><label> ${arr[k][3]} </label></div>
            <div><label>Milage:</label><label> ${arr[k][4]} </label></div><br><br>`;

            return h;
}
function showmsg(msg)
{
    formbox.classList.add('hidden');
    searchData.innerHTML = msg;
    searchData.classList.remove('hidden');
}
function openform()
{
    formbox.classList.remove('hidden');
    overlay.classList.remove('hidden');
}

//search
function myFunction1() {
    const trs = document.querySelector('tbody').childNodes
    const filter = document.getElementById("searchBar").value
    const regex = new RegExp(filter, 'i')
    const isFoundInTds = td => regex.test(td.innerHTML)
    const isFound = childrenArr => childrenArr.some(isFoundInTds)
    const setTrStyleDisplay = ({ style, children }) => {
      style.display = isFound([
        ...children 
      ]) ? '' : 'none' 
    }
    
    trs.forEach(setTrStyleDisplay)
  }



  // Sort Data
// Name Sort
function SortByName()
{
    let arr = getData();
    arr.sort(sortName);
    setData(arr);
    showData();
}
// Model No sort
function SortByPrice()
{
    let arr = getData();
    arr.sort(sortPrice);
    setData(arr);
    showData();
}

// sorting function
const sortName = function(a,b)
{
    if(a[0] === b[0])
    {
        return 0;
    }
    else{
        return (a[0] < b[0]) ? -1:1;
    }
}

const sortPrice = function(a,b)
{
    if(a[2] === b[2])
    {
        return 0;
    }
    else{
        return (a[2] < b[2]) ? -1:1;
    }
}

















// const myFunction = () => {
//     const trs = document.querySelectorAll('#myTable tr:not(.header)')
//     const filter = document.querySelector('#myInput').value
//     const regex = new RegExp(filter, 'i')
//     const isFoundInTds = td => regex.test(td.innerHTML)
//     const isFound = childrenArr => childrenArr.some(isFoundInTds)
//     const setTrStyleDisplay = ({ style, children }) => {
//       style.display = isFound([
//         ...children // <-- All columns
//       ]) ? '' : 'none' 
//     }
    
//     trs.forEach(setTrStyleDisplay)
//   }