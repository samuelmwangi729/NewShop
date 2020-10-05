/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import swal from "sweetalert";
window.swal = swal;
window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);
Vue.component("welcome-component", require("./components/Welcome.vue").default);
Vue.component("home-component", require("./components/Home.vue").default);
Vue.component(
    "createcategories-component",
    require("./components/Categories.vue").default
);
Vue.component(
    "subcategories-component",
    require("./components/SubCategories.vue").default
);
Vue.component("brands-component", require("./components/Brands.vue").default);
Vue.component("head-component", require("./components/Head.vue").default);
Vue.component("header-component", require("./components/Header.vue").default);
Vue.component("label-component", require("./components/Labels.vue").default);
Vue.component("prods-component", require("./components/ProductsComponent.vue").default);
Vue.component("edit-component", require("./components/Edit.vue").default);
Vue.component("create-component", require("./components/Shop.vue").default);
Vue.component("location-component", require("./components/Location.vue").default);
Vue.component("town-component", require("./components/Towns.vue").default);
Vue.component("shops-component", require("./components/AllShops.vue").default);
Vue.component("sedit-component", require("./components/EditShop.vue").default);
Vue.component("singlepro-component", require("./components/SingleProd.vue").default);
Vue.component("shopproducts-component", require("./components/ShopComponent.vue").default);
Vue.component("cart-component", require("./components/Cart.vue").default);
Vue.component("checkout-component", require("./components/Checkout.vue").default);
Vue.component("wishlist-component", require("./components/Wishlist.vue").default);
Vue.component("blog-component", require("./components/Blog.vue").default);
Vue.component("pickup-component", require("./components/Pickup.vue").default);
Vue.component("invoice-component", require("./components/Invoice.vue").default);
Vue.component(
    "collection-component",
    require("./components/Collection.vue").default
);
Vue.component(
    "product-component",
    require("./components/Products.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
