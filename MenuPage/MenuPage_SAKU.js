let shop = document.getElementById('shop');

let basket = JSON.parse(localStorage.getItem("data")) || [];

let generateShop =()=>{
    return (shop.innerHTML = menu.map((x)=>{
        let {id, name, price,desc, img} = x;
        let search = basket.find((x) => x.id === id) || []; // cek id satu per satu

        return `<div id=product-id-${id} class="item">
        <img src=${img} class="food" alt="">
        <div class="details">
            <h3>${name}</h3>
            <p>${desc}</p>
            <div class="price-quantity">
                <h3>Rp. ${price}</h3>
                <div class="button-quantity">
                    <img src="../menu_img/minus.svg" onclick="decrement(${id})" alt="">
                    <div id=${id} class="quantity">${search.item === undefined? 0: search.item}</div>
                    <img src="../menu_img/plus.svg" onclick="increment(${id})" alt="">
                </div>
            </div>
        </div>
    </div>`
    // untuk menghilangkan koma join
    }).join(""))};

generateShop();

let increment =(id)=>{
    let selectedItem = id; //unik
    // mencari objek apakah ada atau tidak secara satu persatu
    let search = basket.find((x)=> x.id === selectedItem.id);

    if(search === undefined){
        basket.push({id: selectedItem.id, item: 1});
    }else{
        search.item += 1;
    }

    // console.log(basket);
    update(selectedItem.id);
    localStorage.setItem("data", JSON.stringify(basket));
};

let decrement =(id)=>{
    let selectedItem = id; //unik
    // mencari objek apakah ada atau tidak secara satu persatu
    let search = basket.find((x)=> x.id === selectedItem.id);

    // jika basket atau lokal storage maka akan mengembalikan nilai kosong agar tidak error
    if(search === undefined){
        return;
    }

    if(search.item === 0){
        return;
    }else{
        search.item -= 1;
    }

    update(selectedItem.id);
    basket = basket.filter((x) => x.item !== 0);
    // console.log(basket);
    localStorage.setItem("data", JSON.stringify(basket));
};

let update =(id)=>{
    let search = basket.find((x)=> x.id === id);
    // console.log(search.item);
    document.getElementById(id).innerHTML = search.item;
    calculation();
};

let calculation =()=>{
    let cartIcon = document.getElementById("cartAmount");
    cartIcon.innerHTML = basket.map((x) => x.item).reduce((x,y) => x+y, 0); // 0 adalah value awal
}

calculation();