<template>
    <div class="container mt-8 ml-16">
        <v-alert v-if="kategorijaDodana" type="success">
            Kategorija dodana!
        </v-alert>
        <h2 class="pl-5 blue--text">Dodaj Kategoriju</h2>
        <form @keydown="clearError">
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

            <v-btn color="primary" @click="dodajKategoriju()">Dodaj</v-btn>
        </form>
    </div>
</template>

<script>
export default {
    data: () => ({
        form: {
            naziv: "",
        },

        kategorijaDodana: false,
    }),
    methods: {
        dodajKategoriju() {
            axios
                .post("http://pzio022023.studenti.sum.ba/admin/kategorija/dodaj", this.form)
                .then(() => {
                    this.kategorijaDodana = true;
                    setTimeout(() => {
                        this.kategorijaDodana = false;
                        this.clearForm();
                        window.location =
                            "http://pzio022023.studenti.sum.ba/admin/kategorije";
                    }, 2000);
                })
                .catch((e) => {
                    console.log("Nešto pošlo krivo! Greška=" + e);
                });
        },

        clearForm() {
            this.form.naziv = "";
            this.form.broj_gostiju = "";
            this.form.status = "";
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
