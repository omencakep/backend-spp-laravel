require("./bootstrap");

window.Vue = require("vue").default;

import Form from "vform";
import HasError from "vform";
import AlertError from "vform";
window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

let routes = [
    {
        path: "/login",
        component: require("./components/Login.vue").default,
    },
    {
        path: "/data-kelas",
        component: require("./components/Kelas.vue").default,
    },
    {
        path: "/data-siswa",
        component: require("./components/Siswa.vue").default,
    },
    {
        path: "/data-petugas",
        component: require("./components/Petugas.vue").default,
    },
];

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

const router = new VueRouter({
    mode: "history",
    routes,
});

const app = new Vue({
    el: "#app",
    router,
});
