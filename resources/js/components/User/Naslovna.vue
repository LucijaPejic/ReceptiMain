<template>
    <div class="content pt-14">
        <div
            class="banner container d-flex align-items-center justify-content-center"
        >
            <div class="pt-16 text-center">
                <h1 class="pt-8 pb-3 display-2 text-white">
                    Omiljeni recepti na jednom mjestu!
                </h1>
                <p class="text-white mx-16">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Doloribus at fuga facere ipsam est expedita laborum, hic
                    voluptatum, facilis magni neque corrupti non culpa nostrum
                    nisi ab dolores porro libero!
                </p>
            </div>
        </div>
        <div class="container">
            <v-row>
                <v-col>
                    <div class="recept1 mt-16">
                        <div>
                            <h1 class="text-white">Američke palačinke</h1>
                            <h3 class="text-white">Jednostavno i ukusno</h3>
                            <v-btn class="green text-white"
                                >Pogledaj recept
                            </v-btn>
                        </div>
                    </div>
                </v-col>
                <v-col>
                    <div class="recept2 mt-16">
                        <div>
                            <h1 class="text-white">Kineski rezanci</h1>
                            <h3 class="text-white">Jednostavno i ukusno</h3>
                            <v-btn class="green text-white"
                                >Pogledaj recept
                            </v-btn>
                        </div>
                    </div></v-col
                >
            </v-row>
        </div>
        <v-parallax dark src="/images/img/bg-img/bg4.jpg" height="800">
            <v-row align="center" justify="center">
                <v-col class="text-center" cols="12">
                    <h1 class="text-h4 font-weight-thin mb-4">Recepti</h1>
                    <h4 class="subheading">Pronađite najbolje recepte!</h4>
                </v-col>
            </v-row>
        </v-parallax>
        <div class="grey lighten-2">
            <div class="container">
                <v-row class="text-center my-16">
                    <v-col>
                        <img src="images/slike/img9.png" class="mb-3" />
                        <h2>SVJEŽA JELA</h2>
                        <p>
                            Inovativna kuhinja, orginalnost serviranja pokoriće
                            vašu maštu i upotpuniti harmoniju ljepote i ukusa.
                            Uvijek svježe namirnice uz jedinstvene ukuse
                            kuhinje, garant su vrhunskog gastronomskog užitka.
                        </p>
                    </v-col>
                    <v-col>
                        <img src="images/slike/img10.png" class="mb-3" />
                        <h2>RAZNOLIKI MENI</h2>
                        <p>
                            Ovdje će svako pronaći svoj omiljeni zalogaj uz
                            bogat izbor jela od mesa i ribe, topla i hladna
                            predjela, rižota, paste, salate, pizza i deserte uz
                            veliki izbor pića, a za naše najmlađe poseban
                            dječiji meni.
                        </p>
                    </v-col>

                    <v-col>
                        <img src="images/slike/img11.png" class="mb-3" />
                        <h2>KVALITETNA USLUGA</h2>
                        <p>
                            Privlačan dizajn objekta, uz raznolik izbor hrane i
                            pića čine nas prepoznatljivim, dok dobra usluga
                            nikoga ne ostavlja ravnodušnim. Higijena na visokom
                            nivou, profesionalnost i ljubaznost je ono što naše
                            osoblje nudi.
                        </p>
                    </v-col>
                </v-row>
            </div>
        </div>
        <div class="container">
            <v-row class="py-6">
                <v-col
                    v-for="image in images"
                    :key="image.id"
                    class="d-flex child-flex"
                    cols="4"
                >
                    <v-img
                        :src="`${image.path}`"
                        :lazy-src="`${image.path}`"
                        aspect-ratio="1"
                        class="grey lighten-2"
                    >
                        <template v-slot:placeholder>
                            <v-row
                                class="fill-height ma-0"
                                align="center"
                                justify="center"
                            >
                                <v-progress-circular
                                    indeterminate
                                    color="grey lighten-5"
                                ></v-progress-circular>
                            </v-row>
                        </template>
                    </v-img>
                </v-col>
            </v-row>
        </div>

        <my-footer></my-footer>
    </div>
</template>
<script>
export default {
    created() {},
    data: () => ({}),
    methods: {},
};
</script>
<style scoped>
h2 {
    font-weight: 500;
}
.content {
    background-color: var(--bs-gray-100);
}
.banner {
    width: 100%;
    height: 800px;
    background-image: url(/images/img/bg-img/bg1.jpg);
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
}
.container {
    width: 85%;
    color: var(--bs-body-color);
}
img {
    border-radius: 10px;
}

.recept1 {
    display: flex;
    height: 300px;
    background-image: url(/images/img/bg-img/bg2.jpg);
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    align-items: center;
    padding: 20px;
    box-shadow: inset 0 10px 200px black;
}
.recept2 {
    display: flex;
    height: 300px;
    background-image: url(/images/img/bg-img/bg3.jpg);
    background-position: center center;
    background-size: cover;
    background-repeat: no-repeat;
    align-items: center;
    padding: 20px;
    box-shadow: inset 0 10px 200px black;
}
</style>
