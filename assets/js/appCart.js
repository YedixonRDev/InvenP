class ShoppingCart {
   constructor() {
      this.cart = JSON.parse(localStorage.getItem('cart')) || { totalItems: 0, totalValue: 0, items: [], client: null };
   }
  
   addClientInfo(clientInfo) {
      this.cart.client = clientInfo;
      this.updateCart();
   }
  
   clearCart() {
      this.cart = { totalItems: 0, totalValue: 0, items: [], client: this.cart.client };
      this.updateCart();
   }

   clearCartAll() {
      this.cart = { totalItems: 0, totalValue: 0, items: [], client: null };
      this.updateCart();
   }
  
   addProduct(product) {
      const index = this.cart.items.findIndex(item => item.code === product.code);
      if (index !== -1) {
         this.cart.items[index].units += product.units;
         this.cart.items[index].totalValue = this.cart.items[index].units * this.cart.items[index].price;
      } else {
         product.totalValue = product.units * product.price;
         this.cart.items.push(product);
      }
      this.updateCart();
   }
  
   removeProduct(code) {
      const index = this.cart.items.findIndex(item => item.code === code);
      if (index !== -1) {
         this.cart.totalItems -= this.cart.items[index].units;
         this.cart.totalValue -= this.cart.items[index].totalValue;
         this.cart.items.splice(index, 1);
         this.updateCart();
      }
   }

   updateProductQuantity(code, newQuantity) {
      const index = this.cart.items.findIndex(item => item.code === code);
      if (index !== -1) {
         if (newQuantity <= 0) {
            this.removeProduct(code);
         } else {
            this.cart.totalItems += newQuantity - this.cart.items[index].units;
            this.cart.totalValue += this.cart.items[index].price * (newQuantity - this.cart.items[index].units);
            this.cart.items[index].totalValue = this.cart.items[index].price * newQuantity;
            this.cart.items[index].units = newQuantity;
            this.updateCart();
         }
      }
   }
  
   updateCart() {
      this.cart.totalItems = this.cart.items.reduce((acc, item) => acc + item.units, 0);
      this.cart.totalValue = this.cart.items.reduce((acc, item) => acc + item.totalValue, 0);
      localStorage.setItem('cart', JSON.stringify(this.cart));
   }
  
   getCart() {
      return this.cart;
   }
}
const appCart = new ShoppingCart();