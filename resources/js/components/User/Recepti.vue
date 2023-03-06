<template>
    <div class="content">
        <div
            class="banner bg-overlay d-flex align-items-center justify-content-center mt-8 mb-16"
        >
            <div class="okvir text-center white px-7 py-4">
                <h1 class="black--text">RECEPTI BLOG</h1>
            </div>
        </div>
        <v-row>
            <v-col cols="8" v-for="recept in recepti" :key="recept.id">
                <div class="container">
                    <v-card :loading="loading" class="mx-auto" max-width="800">
                        <template slot="progress">
                            <v-progress-linear
                                color="deep-purple"
                                height="10"
                                indeterminate
                            ></v-progress-linear>
                        </template>

                        <v-img :src="`${url}${recept.slika}`" height="260px" />

                        <v-card-title>{{ recept.naziv }}</v-card-title>

                        <v-card-text>
                            <v-row align="center" class="mx-0 mb-2">
                                <v-rating
                                    :value="4.5"
                                    color="amber"
                                    dense
                                    half-increments
                                    readonly
                                    size="14"
                                ></v-rating>
                            </v-row>

                            <div class="text-subtitle-1 pb-3">
                                • Priprema: {{ recept.vrijeme_pripreme }}
                            </div>

                            <div>
                                {{ recept.opis }}
                            </div>
                        </v-card-text>

                        <v-card-text>
                            <div class="text-subtitle-1 pb-3">
                                • Kategorija: {{ recept.kategorija.naziv }}
                            </div>

                            Autor: {{ recept.autor.name }}
                        </v-card-text>

                        <v-card-actions>
                            <v-btn
                                class="pl-4"
                                text
                                color="primary"
                                @click="reserve"
                            >
                                OTVORI
                            </v-btn>
                        </v-card-actions>
                    </v-card>
                </div>
            </v-col>
            <v-col cols="4">
                <img src="/images/img/bg-img/add.png" alt="" />
                <div class="subscribe">
                    <div>
                        <input
                            type="text"
                            class="form-select"
                            placeholder="email@gmail.com"
                        />
                        <v-btn class="mx-10" block>Pretplati se </v-btn>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Ex minus, officia veniam molestias impedit non
                            cum? Vitae est accusantium alias fugiat veritatis
                            esse velit consequuntur pariatur voluptate,
                            repudiandae vero expedita!
                        </p>
                    </div>
                </div>
            </v-col>
        </v-row>
    </div>
</template>
<script>
export default {
    created() {
        this.dohvatiRecepte();
    },
    data: () => ({
        recepti: [],
        url: "/images/",
        loading: false,
        selection: 1,
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
        reserve() {
            this.loading = true;
            setTimeout(() => (this.loading = false), 2000);
        },
    },
};
</script>
<style scoped>
.banner {
    width: 90%;
    height: 340px;
    margin: auto;
    background-image: url(/images/img/bg-img/about.png);
    background-position: 50%;
    background-size: cover;
    border-radius: 10px;
}
.okvir {
    opacity: 70%;
    border-radius: 20px;
}
.content {
    background-color: var(--bs-gray-100);
}
.v-card__subtitle,
.v-card__text {
    padding-left: 25px;
    padding-top: 8px;
    padding-bottom: 0px;
}
.v-card__title {
    padding-bottom: 5px;
    padding-top: 5px;
    padding-left: 25px;
}
.theme--light.v-card > .v-card__subtitle,
.theme--light.v-card > .v-card__text {
    color: rgb(0 0 0 / 81%);
}
.subscribe {
    height: 500px;
    background-image: url(/images/img/bg-img/bg1.jpg);
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
}
</style>
