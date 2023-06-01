let label = document.getElementById("label");
let shoppingCart = document.getElementById("shopping-cart");

let basket = JSON.parse(localStorage.getItem("data")) || [];

let calculation =()=>{
    let cartIcon = document.getElementById("cartAmount");
    cartIcon.innerHTML = basket.map((x) => x.item).reduce((x,y) => x+y, 0); // 0 adalah value awal
}

calculation();

let generateCartItems =()=>{
    if(basket.length !== 0){
        return (shoppingCart.innerHTML = basket.map((x) => {
            let {id, item} = x;
            let search = menu.find((x) => x.id === id) || [];

            return `
            <div class="cart-item">
                <img src=${search.img} alt=""/>
                <div class="details">

                    <div class="title-price">
                        <h4 class="title">
                            <p>${search.name}</p>
                            <p class="cart-item-price">Rp ${search.price}</p>
                        </h4>
                        <img src="../menu_img/x.svg" onclick="removeItem(${id})" alt="">
                    </div>

                    <div class="button-quantity">
                        <img src="../menu_img/minus.svg" onclick="decrement(${id})" alt="">
                        <div id=${id} class="quantity">${item}</div>
                        <img src="../menu_img/plus.svg" onclick="increment(${id})" alt="">
                    </div>

                    <h4>Total: Rp ${item * search.price}</h4>
                </div>
            </div>
            
            `;
        }).join(""));
    }else{
        shoppingCart.innerHTML = ``;
        label.innerHTML = `
        <h2>Cart is Empty</h2>
        <a href="MenuPage_SAKU.html">
            <button class="homebtn">Back to Menu</button>
        </a>
        `;
    }
}

generateCartItems();

let increment =(id)=>{
    let selectedItem = id; //unik
    // mencari objek apakah ada atau tidak secara satu persatu
    let search = basket.find((x)=> x.id === selectedItem.id);

    if(search === undefined){
        basket.push({id: selectedItem.id, item: 1});
    }else{
        search.item += 1;
    }

    generateCartItems();
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
    generateCartItems();
    localStorage.setItem("data", JSON.stringify(basket));
};

let update =(id)=>{
    let search = basket.find((x)=> x.id === id);
    // console.log(search.item);
    document.getElementById(id).innerHTML = search.item;
    calculation();
    totalAmaount();
};

let removeItem =(id)=>{
    let selectedItem = id;
    basket = basket.filter((x) => x.id !== selectedItem.id);
    generateCartItems();
    totalAmaount();
    calculation();
    localStorage.setItem("data", JSON.stringify(basket));
}

let clearCart =()=>{
    basket = [];
    generateCartItems();
    localStorage.setItem("data", JSON.stringify(basket));
}

let totalAmaount =()=>{
    if(basket.length !== 0){
        let amount = basket.map((x) => {
            let {item, id} = x;
            let search = menu.find((j) => j.id === id) || [];

            return item * search.price;
        })
        .reduce((x,y) => x + y, 0);
        label.innerHTML = `
        <h2>Total Bill: Rp ${amount}</h2>
        <a href="MenuPage_SAKU.html"><button class="back">Back</button></a>
        <button class="checkout">Checkout</button>
        <button class="removeAll" onclick="clearCart()">Clear</button>
        `;
    }else return;
};

totalAmaount();