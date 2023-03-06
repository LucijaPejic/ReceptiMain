<template>
    <div>
        <div class="container">
            <v-alert v-if="ReceptIzbrisan" type="success">
                Recept je izbrisan!
            </v-alert>
            <v-row>
                <v-col class="text-right">
                    <v-btn
                        class="my-5"
                        @click="dodajRecept()"
                        fab
                        dark
                        color="blue-grey darken-3"
                    >
                        <v-icon dark> mdi-plus </v-icon>
                    </v-btn>
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="4" v-for="recept in recepti" :key="recept.id">
                    <v-card class="mx-auto" max-width="400">
                        <v-img :src="`${url}${recept.slika}`" height="260px" />
                        <div class="my-2 d-flex justify-space-between">
                            <v-card-title>{{ recept.naziv }}</v-card-title>

                            <div class="mt-3">
                                <v-btn
                                    @click="urediRecept(recept)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#receptModal"
                                    color="primary"
                                    fab
                                    small
                                    dark
                                >
                                    <v-icon>mdi-pencil</v-icon>
                                </v-btn>
                                <v-btn
                                    @click="izbrisiRecept(recept.id)"
                                    class="mx-3"
                                    color="primary"
                                    fab
                                    small
                                    dark
                                >
                                    <v-icon>mdi-delete</v-icon>
                                </v-btn>
                            </div>
                        </div>
                        <v-card-subtitle class="pt-4">
                            AUTOR: {{ recept.autor.name }}
                        </v-card-subtitle>

                        <v-card-subtitle class="pt-4">
                            Vrijeme pripreme: {{ recept.vrijeme_pripreme }}
                        </v-card-subtitle>

                        <v-card-text>
                            <div>{{ recept.kategorija.naziv }}</div>

                            <div>{{ recept.opis }}</div>
                        </v-card-text>

                        <v-card-actions>
                            <v-card-subtitle class="pt-4">
                                Sastojci i priprema
                            </v-card-subtitle>
                            <v-btn icon @click="show = !show">
                                <v-icon>{{
                                    show ? "mdi-chevron-up" : "mdi-chevron-down"
                                }}</v-icon>
                            </v-btn>
                        </v-card-actions>

                        <v-expand-transition>
                            <div v-show="show">
                                <v-divider></v-divider>
                                <v-card-subtitle class="pt-4">
                                    Sastojci:
                                </v-card-subtitle>
                                <v-card-text>
                                    {{ recept.sastojci }}
                                </v-card-text>
                                <v-divider></v-divider>
                                <v-card-subtitle class="pt-4">
                                    Priprema:
                                </v-card-subtitle>
                                <v-card-text>
                                    {{ recept.priprema }}
                                </v-card-text>
                            </div>
                        </v-expand-transition>
                    </v-card>
                </v-col>
            </v-row>
        </div>
        <div
            class="modal fade"
            id="receptModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="receptModalLabel"
            aria-hidden="true"
        >
            <div
                class="modal-dialog modal-dialog-centered modal-md"
                role="document"
            >
                <div class="modal-content">
                    <div class="modal-header blue white--text">
                        <h5 class="modal-title" id="receptModalLabel">Uredi</h5>
                        <button
                            type="button"
                            class="close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pa-5">
                        <form>
                            <div class="mb-5">
                                <v-text-field
                                    id="naziv"
                                    name="naziv"
                                    label="Naziv"
                                    type="text"
                                    v-model="form.naziv"
                                />
                            </div>
                            <div class="mb-5">
                                <v-text-field
                                    id="sastojci"
                                    name="sastojci"
                                    label="Sastojci"
                                    type="text"
                                    v-model="form.sastojci"
                                />
                            </div>
                            <div class="mb-5">
                                <v-text-field
                                    id="opis"
                                    name="opis"
                                    label="Kratki opis jela"
                                    type="text"
                                    v-model="form.opis"
                                />
                            </div>
                            <div class="mb-5">
                                <v-text-field
                                    id="priprema"
                                    name="priprema"
                                    label="Priprema"
                                    type="text"
                                    v-model="form.priprema"
                                />
                            </div>
                            <div class="mb-5">
                                <v-text-field
                                    id="vrijeme_pripreme"
                                    name="vrijeme_pripreme"
                                    label="Vrijeme pripreme"
                                    type="text"
                                    v-model="form.vrijeme_pripreme"
                                />
                            </div>
                            <div class="mb-5">
                                <v-select
                                    id="kategorija_id"
                                    name="kategorija_id"
                                    v-model="form.kategorija_id"
                                    :items="kategorije"
                                    item-text="naziv"
                                    item-value="id"
                                    label="Kategorija"
                                    required
                                ></v-select>
                            </div>

                            <div class="mb-5">
                                <input
                                    type="file"
                                    id="slika"
                                    name="slika"
                                    class="form-control"
                                    @change="izabranaSlika"
                                />
                            </div>
                            <img
                                :src="`${form.slika}`"
                                class="figure-img img-fluid"
                                style="max-height: 300px"
                            />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <v-alert v-if="receptDodan" type="success" height="36px"
                            >Meni uspješno uređen!</v-alert
                        >
                        <v-btn depressed color="error" data-bs-dismiss="modal">
                            ZATVORI
                        </v-btn>
                        <v-btn @click="spremiRecept()" color="primary"
                            >SPREMI</v-btn
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created() {
        this.dohvatiRecepte();
        this.dohvatiKategorije();
    },
    data: () => ({
        recepti: [],
        kategorije: [],
        form: {
            id: "",
            naziv: "",
            sastojci: "",
            opis: "",
            priprema: "",
            vrijeme_pripreme: "",
            kategorija_id: "",
            korisnik_id: "",
            slika: "",
        },
        brisiRecept: {
            id: "",
        },
        url: "/images/",
        loading: false,
        show: false,
        receptDodan: false,
        ReceptIzbrisan: false,
    }),
    methods: {
        dohvatiRecepte() {
            axios
                .get("http://pzio022023.studenti.sum.ba/recepti")
                .then((response) => {
                    this.recepti = response.data.recepti;
                })
                .catch((e) => {
                    console.log("Nešto pošlo krivo! Greška=" + e);
                });
        },
        dohvatiKategorije() {
            axios
                .get("http://pzio022023.studenti.sum.ba/kategorije")
                .then((response) => {
                    this.kategorije = response.data.kategorije;
                })
                .catch((e) => {
                    console.log("Nešto pošlo krivo! Greška=" + e);
                });
        },
        urediRecept(recept) {
            console.log(this.form.korisnik_id);
            this.form = {
                id: recept.id,
                naziv: recept.naziv,
                sastojci: recept.sastojci,
                opis: recept.opis,
                priprema: recept.priprema,
                vrijeme_pripreme: recept.vrijeme_pripreme,
                kategorija_id: recept.kategorija_id,
                korisnik_id: recept.autor.id,
                slika: "",
            };
        },
        izabranaSlika(event) {
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                this.form.slika = reader.result;
            };
            reader.readAsDataURL(file);
        },
        spremiRecept() {
            axios
                .post(
                    "http://pzio022023.studenti.sum.ba/admin/recept/uredi/" + this.form.id,
                    this.form
                )
                .then(() => {
                    this.receptDodan = true;
                    setTimeout(() => {
                        this.receptDodan = false;
                    }, 4000);
                    this.dohvatiRecepte();
                })
                .catch((e) => {
                    console.log("Nešto pošlo krivo! Greška=" + e);
                });
        },
        izbrisiRecept(id) {
            axios
                .get("http://pzio022023.studenti.sum.ba/admin/recept/izbrisi/" + id)
                .then(() => {
                    this.dohvatiRecepte();
                    this.receptIzbrisan = true;
                    setTimeout(() => {
                        this.receptIzbrisan = false;
                    }, 4000);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        dodajRecept() {
            window.location = window.location =
                "http://pzio022023.studenti.sum.ba/admin/recept/dodaj";
        },
        reserve() {
            this.loading = true;
            setTimeout(() => (this.loading = false), 2000);
        },
    },
};
</script>
<style scoped>
.v-btn {
    font-size: 12px;
}
.container {
    width: 100%;
}
.v-alert {
    font-size: 14px;
    margin: 0;
    display: flex;
    align-items: center;
}
.theme--light.v-card > .v-card__subtitle,
.theme--light.v-card > .v-card__text {
    color: rgb(0 0 0 / 81%);
}
</style>
