<template>
    <div class="container mt-8 ml-16">
        <v-alert v-if="receptDodan" type="success">
            Kategorija dodana!
        </v-alert>
        <h2 class="pl-5 blue--text">Dodaj Recept</h2>
        <form>
            <div class="mb-5">
                <input
                    id="naziv"
                    name="naziv"
                    placeholder="Naziv"
                    type="text"
                    v-model="form.naziv"
                    class="form-control"
                />
            </div>
            <div class="mb-5">
                <input
                    id="sastojci"
                    name="sastojci"
                    placeholder="Sastojci"
                    type="text"
                    v-model="form.sastojci"
                    class="form-control"
                />
            </div>
            <div class="mb-5">
                <input
                    id="opis"
                    name="opis"
                    placeholder="Kratki opis jela"
                    type="text"
                    v-model="form.opis"
                    class="form-control"
                />
            </div>
            <div class="mb-5">
                <input
                    id="priprema"
                    name="priprema"
                    placeholder="Priprema"
                    type="text"
                    v-model="form.priprema"
                    class="form-control"
                />
            </div>
            <div class="mb-5">
                <input
                    id="vrijeme_pripreme"
                    name="vrijeme_pripreme"
                    placeholder="Vrijeme pripreme"
                    type="text"
                    v-model="form.vrijeme_pripreme"
                    class="form-control"
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
                    placeholder="Kategorija"
                    required
                    class="form-control"
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
                            "http://pzio022023.studenti.sum.ba/admin";
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
.container {
    width: 80%;
    background-color: aliceblue;
}
form {
    padding: 20px;
    width: 500px;
}
</style>
