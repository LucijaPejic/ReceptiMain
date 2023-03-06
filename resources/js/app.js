require("./bootstrap");

import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import Vue from "vue";

window.Vue = require("vue").default;

Vue.use(Vuetify);

//ADMIN KOMPONENTE
Vue.component(
    "admin-recepti",
    require("./components/Admin/AdminRecepti.vue").default
);
Vue.component(
    "admin-novi-recept",
    require("./components/Admin/AdminNoviRecept.vue").default
);

Vue.component(
    "admin-kategorije",
    require("./components/Admin/AdminKategorije.vue").default
);
Vue.component(
    "admin-dodaj-kategoriju",
    require("./components/Admin/DodajKategoriju.vue").default
);

//USER KOMPONENTE
Vue.component("naslovnica", require("./components/User/Naslovna.vue").default);
Vue.component("recepti", require("./components/User/Recepti.vue").default);
Vue.component(
    "dodaj-recept",
    require("./components/User/DodajRecept.vue").default
);
Vue.component("kontakt", require("./components/User/Kontakt.vue").default);
Vue.component("about", require("./components/User/About.vue").default);

//GLOBALNE KOMPONENTE
Vue.component("welcome-page", require("./components/WelcomePage.vue").default);
Vue.component("my-footer", require("./components/Footer.vue").default);
Vue.component("loading", require("./components/Loading.vue").default);
Vue.component("my-footer", require("./components/Footer.vue").default);

const app = new Vue({
    vuetify: new Vuetify(),
    el: "#app",
});
