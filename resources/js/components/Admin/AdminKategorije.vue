<template>
    <div class="container">
        <div>
            <v-row>
                <v-col
                    ><v-alert
                        class="my-5"
                        v-if="kategorijaIzbrisana"
                        type="success"
                    >
                        Kategorija izbrisana!
                    </v-alert></v-col
                >
                <v-col class="text-right">
                    <v-btn
                        class="my-5"
                        @click="dodajKategoriju()"
                        fab
                        dark
                        color="blue-grey darken-3"
                    >
                        <v-icon dark> mdi-plus </v-icon>
                    </v-btn>
                </v-col>
            </v-row>

            <div class="card-body table-responsive mb-16 text-center">
                <table class="table">
                    <thead class="white--text">
                        <tr class="blue-grey darken-3">
                            <th>ID</th>
                            <th>Naziv</th>
                            <th>Uredi/Briši</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="kategorija in kategorije"
                            :key="kategorija.id"
                        >
                            <td>{{ kategorija.id }}</td>
                            <td>{{ kategorija.naziv }}</td>
                            <td>
                                <v-btn
                                    color="primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kategorijaModal"
                                    @click="urediKategoriju(kategorija)"
                                >
                                    <v-icon left> mdi-pencil </v-icon>
                                    Uredi
                                </v-btn>

                                <v-btn
                                    depressed
                                    color="error"
                                    @click="izbrisiKategoriju(kategorija.id)"
                                >
                                    <v-icon left> mdi-delete </v-icon>
                                    Izbriši
                                </v-btn>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div
            class="modal fade"
            id="kategorijaModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="kategorijaModalLabel"
            aria-hidden="true"
        >
            <div
                class="modal-dialog modal-dialog-centered modal-lg"
                role="document"
            >
                <div class="modal-content">
                    <div class="modal-header blue white--text">
                        <h5 class="modal-title" id="kategorijaModalLabel">
                            Uredi
                        </h5>
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
                            <v-text-field
                                id="naziv"
                                name="naziv"
                                label="Naziv"
                                type="text"
                                v-model="form.naziv"
                            />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <v-alert
                            v-if="kategorijaSpremljena"
                            type="success"
                            height="36px"
                            >Kategorija uređena!</v-alert
                        >
                        <v-btn depressed color="error" data-bs-dismiss="modal">
                            ZATVORI
                        </v-btn>

                        <v-btn @click="spremiKategoriju()" color="primary"
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
        this.dohvatiKategorije();
    },
    data: () => ({
        kategorije: [],
        form: {
            id: "",
            naziv: "",
        },
        loading: false,
        kategorijaSpremljena: false,
        kategorijaIzbrisana: false,
    }),
    methods: {
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
        urediKategoriju(kategorija) {
            this.form = {
                id: kategorija.id,
                naziv: kategorija.naziv,
            };
        },
        spremiKategoriju() {
            axios
                .post(
                    "http://pzio022023.studenti.sum.ba/admin/kategorija/uredi/" +
                        this.form.id,
                    this.form
                )
                .then(() => {
                    this.kategorijaSpremljena = true;
                    setTimeout(() => {
                        this.kategorijaSpremljena = false;
                    }, 4000);
                    this.dohvatiKategorije();
                })
                .catch((e) => {
                    console.log("Nešto pošlo krivo! Greška=" + e);
                });
        },
        dodajKategoriju() {
            window.location = "http://pzio022023.studenti.sum.ba/admin/kategorija/dodaj";
        },
        izbrisiKategoriju(id) {
            axios
                .get("http://pzio022023.studenti.sum.ba/admin/kategorija/izbrisi/" + id)
                .then(() => {
                    this.dohvatiKategorije();
                    this.kategorijaIzbrisana = true;
                    setTimeout(() => {
                        this.kategorijaIzbrisana = false;
                    }, 4000);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
};
</script>
<style scoped>
.v-btn {
    font-size: 12px;
}
.container {
    width: 80%;
}
.v-alert {
    font-size: 14px;
    margin: 0;
    display: flex;
    align-items: center;
    width: 400px;
}
</style>
