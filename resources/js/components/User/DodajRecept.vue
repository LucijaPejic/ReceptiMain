<template>
    <div>
        <div
            class="banner bg-overlay d-flex align-items-center justify-content-center mt-8"
        >
            <div class="okvir text-center white px-7 py-4">
                <h1 class="black--text">DODAJTE NOVI RECEPT!</h1>
            </div>
        </div>

        <div class="container">
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
                <v-alert v-if="receptDodan" type="success">
                    Recept uspješno dodan!
                </v-alert>
                <v-btn @click="dodajRecept" block color="primary">Dodaj</v-btn>
            </form>
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
            naziv: "",
            sastojci: "",
            opis: "",
            priprema: "",
            vrijeme_pripreme: "",
            kategorija_id: "",
            slika: "",
        },
        receptDodan: false,
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
        dodajRecept() {
            axios
                .post("http://pzio022023.studenti.sum.ba/user/recept/dodaj", this.form)
                .then(() => {
                    this.receptDodan = true;
                    setTimeout(() => {
                        this.receptDodan = false;
                        this.clearForm();
                        window.location = window.location =
                            "http://127.0.0.1:8000//user/recepti";
                    }, 2000);
                })
                .catch((e) => {
                    console.log("Nešto pošlo krivo! Greška=" + e);
                });
        },
        izabranaSlika(event) {
            let file = event.target.files[0];
            let reader = new FileReader();
            reader.onloadend = () => {
                this.form.slika = reader.result;
            };
            reader.readAsDataURL(file);
        },

        clearForm() {
            this.form.naziv = "";
            this.form.sastojci = "";
            this.form.opis = "";
            this.form.priprema = "";
            this.form.vrijeme_pripreme = "";
            this.form.kategorija = "";
            this.form.slika = "";
        },
    },
};
</script>
<style scoped>
.banner {
    width: 90%;
    height: 340px;
    margin: auto;
    background-image: url(/images/1674771270.jpeg);
    background-position: 50% 29%;
    background-size: cover;
    border-radius: 10px;
}
.container {
    width: 70%;
}

.okvir {
    opacity: 70%;
    border-radius: 20px;
}
</style>
